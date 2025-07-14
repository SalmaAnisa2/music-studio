<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AaBooking;

class BookingController extends Controller
{
    public function index()
    {
        // Ambil semua booking dengan relasi studio dan user
        $bookings = AaBooking::with(['studio', 'user'])->get();

        return view('admin.booking.index', compact('bookings'));
    }

    public function edit($id)
    {
        if (session('role') !== 'admin') abort(403);

        // Pastikan data booking ditemukan
        $booking = AaBooking::with(['studio', 'user'])->findOrFail($id);

        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
{
    $booking = AaBooking::findOrFail($id);
    $booking->status = $request->status;
    $booking->save();

    return redirect('/admin/bookings')->with('success', 'Status berhasil diperbarui.');
}


    public function destroy($id)
    {
        if (session('role') !== 'admin') abort(403);

        AaBooking::destroy($id);

        return redirect('/admin/bookings')->with('success', 'Data booking berhasil dihapus.');
    }
}
