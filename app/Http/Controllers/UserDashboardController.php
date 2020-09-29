<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                return redirect('/admin/dashboard');
            }
        }

        return view('welcome');
    }
}
