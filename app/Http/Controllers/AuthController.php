<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
                    ->where('password', $request->password) // tanpa bcrypt
                    ->first();

        if ($user) {
            session()->regenerate(); // pastikan session tersimpan
            session([
                'loginId' => $user->id,
                'role' => trim($user->role), // buang spasi
                'name' => $user->name
            ]);

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
