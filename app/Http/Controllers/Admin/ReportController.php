<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales()
    {
        return view('administrator.report.sales.index');
    }

    public function purchase()
    {
        return view('administrator.report.sales.index');
    }
}
