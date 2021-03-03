<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role_id === 1) {
                return redirect('admin/dashboard');
            }elseif (Auth::user()->role_id === 2) {
                return redirect('cashier/dashboard');
            }elseif (Auth::user()->role_id === 3) {
                return redirect('secertary/dashboard');
            }
        }
        return abort(404);
    }
}
