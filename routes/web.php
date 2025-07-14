<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\StudioController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontendController;

// ------------------------------
// ROUTE UTAMA (Homepage)
// ------------------------------
Route::get('/', [FrontendController::class, 'home'])->name('home');

// ------------------------------
// AUTHENTIKASI
// ------------------------------
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------------
// FRONTEND (Pengunjung/User)
// ------------------------------
Route::get('/studio/{id}', [FrontendController::class, 'detail'])->name('studio.detail');
Route::post('/booking', [FrontendController::class, 'booking'])->name('studio.booking');

Route::get('/my-bookings', [FrontendController::class, 'myBookings'])->name('user.bookings');

    Route::get('/bookings/{id}/edit', function ($id) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(BookingController::class)->edit($id);
    })->name('admin.bookings.edit');

// ------------------------------
// ADMIN ROUTES (Tanpa middleware class)
// ------------------------------
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(AdminController::class)->index();
    })->name('admin.dashboard');

    // Studios
    Route::get('/studios', function () {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->index();
    })->name('admin.studios.index');

    Route::get('/studios/create', function () {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->create();
    })->name('admin.studios.create');

    Route::post('/studios', function (Request $request) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->store($request);
    })->name('admin.studios.store');

    Route::get('/studios/{id}/edit', function ($id) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->edit($id);
    })->name('admin.studios.edit');

    Route::put('/studios/{id}', function (Request $request, $id) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->update($request, $id);
    })->name('admin.studios.update');

  

    Route::delete('/studios/{id}', function ($id) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(StudioController::class)->destroy($id);
    })->name('admin.studios.destroy');

    // Bookings
    Route::get('/bookings', function () {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(BookingController::class)->index();
    })->name('admin.bookings.index');

    

    Route::put('/bookings/{id}', function (Request $request, $id) {
    if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
    return app(BookingController::class)->update($request, $id);
});


    Route::delete('/bookings/{id}', function ($id) {
        if (!session('loginId') || trim(session('role')) !== 'admin') abort(403);
        return app(BookingController::class)->destroy($id);
    })->name('admin.bookings.destroy');
});
