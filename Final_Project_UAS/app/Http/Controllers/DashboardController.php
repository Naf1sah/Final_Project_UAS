<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function staff()
    {
        return view('dashboard.staff');
    }

    public function user()
    {
        $user = Auth::user();
        return view('dashboard.user', compact('user'));
    }
}
