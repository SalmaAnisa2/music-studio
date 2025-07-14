<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    // Cek password plain (bukan Hash::check)
    if ($user && $request->password === $user->password) {
        Session::put('loginId', $user->id);
            Session::put('role', $user->role);

        return $user->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/');
    }

    return back()->with('error', 'Email atau password salah');
}

}