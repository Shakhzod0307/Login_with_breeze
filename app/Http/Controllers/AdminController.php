<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function admin_dashboard()
    {
        return view('admin.index');
    }
    public function admin_profile(Request $request)
    {
        return view('admin.admin_profile', [
            'user' => $request->user(),
        ]);
    }

    public function admin_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
