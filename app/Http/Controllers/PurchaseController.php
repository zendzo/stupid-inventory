<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('administrator.purchase.index');
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);
       return view('administrator.purchase.show',[
           'purchase' => $purchase
       ]);
    }

    public function invoice($id)
    {
        $purchase = Purchase::find($id);
        return view('administrator.purchase.invoice', [
            'purchase' => $purchase
        ]);
    }
}
