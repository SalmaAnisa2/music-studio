<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (session('role') !== 'admin') {
        abort(403, 'Unauthorized');
    }

        return view('admin.dashboard');
    }
}
