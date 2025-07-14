<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AaStudio;
use App\Models\AaBooking;

class FrontendController extends Controller
{
    public function home()
    {
        $studios = AaStudio::all();
        return view('frontend.home', compact('studios'));
    }

    public function detail($id)
    {
        $studio = AaStudio::findOrFail($id);
        return view('frontend.detail', compact('studio'));
    }

    public function booking(Request $request)
    {
        if (!session('loginId')) {
            return redirect('/login')->with('error', 'Harus login terlebih dahulu!');
        }

        AaBooking::create([
            'user_id' => session('loginId'),
            'studio_id' => $request->studio_id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking berhasil dikirim!');
    }

    public function myBookings()
    {
        $userId = session('loginId'); // konsisten gunakan session('loginId')
        $bookings = AaBooking::where('user_id', $userId)->with('studio')->get();

        return view('frontend.my_bookings', compact('bookings'));
    }
}
