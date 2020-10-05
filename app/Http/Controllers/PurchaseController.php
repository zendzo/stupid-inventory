<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('administrator.purchase.index');
    }

    public function show($id)
    {
        return view('administrator.purchase.show');
    }
}
