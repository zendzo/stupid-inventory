<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('administrator.sales.index');
    }

    public function show($id)
    {
        $sales = Sale::find($id);
       return view('administrator.sales.show',[
           'sales' => $sales
       ]);
    }

    public function invoice($id)
    {
        $sales = Sale::find($id);
        return view('administrator.sales.invoice',[
            'sales' => $sales
        ]);
    }
}
