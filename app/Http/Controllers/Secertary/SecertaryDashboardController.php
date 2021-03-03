<?php

namespace App\Http\Controllers\Secertary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecertaryDashboardController extends Controller
{
    public function index()
    {
        return view('secertary.dashboard');
    }
}
