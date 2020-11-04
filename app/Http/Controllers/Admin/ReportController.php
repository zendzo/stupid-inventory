<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales()
    {
        return view('administrator.report.sales.index');
    }

    public function purchase()
    {
        return view('administrator.report.purchase.index');
    }

    public function stock()
    {
        $purchases = Purchase::has('products')->with('products')->get();
        
        $sales = Sale::has('products')->with('products')->get();

        $saleProducts = [];
        foreach ($sales as $key => $sale) {
            foreach ($sale->products as $key => $product) {
                array_push($saleProducts,$product->pivot->quantity);
            }
        }

        $purchaseProducts = [];
        foreach ($purchases as $key => $purchase) {
            foreach ($purchase->products as $key => $product) {
                array_push($purchaseProducts, $product->pivot->quantity);
            }
        }

        return view('administrator.report.stock.index', compact([
            'saleProducts',
            'purchaseProducts',
        ]));
    }
}
