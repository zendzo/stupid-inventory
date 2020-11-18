<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\SalesType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function sales()
    {
        $start_date = Carbon::today()->format('Y-m-d');
        $end_date = Carbon::today()->format('Y-m-d');
        $sales = Sale::whereBetween(
            DB::raw('DATE(sale_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $start_date)->toDateString(),
                Carbon::createFromFormat('Y-m-d', $end_date)->toDateString()
            ]
        )
            ->whereNotNull('sale_type_id')
            ->with('products')
            ->get();


        return view('administrator.report.sales.index', compact(['sales','start_date','end_date']));
    }

    public function getSalesByDate(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $sales = Sale::whereBetween(
            DB::raw('DATE(sale_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $request->start_date)->toDateString(),
                Carbon::createFromFormat('Y-m-d', $request->end_date)->toDateString()
                ]
                )
                ->where(function ($query) use ($request){
                    if ($request->sales_type !== 'all') {
                        $query->where('sale_type_id', $request->sales_type);
                    }
                    $query->whereNotNull('sale_type_id');
                })
                ->whereHas('products')
                ->with('products')
                ->get();
                
                
        return view('administrator.report.sales.index', compact(['sales','start_date','end_date']));
        
    }

    public function purchase()
    {
        $start_date = Carbon::today()->format('Y-m-d');
        $end_date = Carbon::today()->format('Y-m-d');
        $purchase = Purchase::whereBetween(
            DB::raw('DATE(purchase_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $start_date)->toDateString(),
                Carbon::createFromFormat('Y-m-d', $end_date)->toDateString()
            ]
        )
            ->whereNotNull('purchase_type_id')
            ->with('products')
            ->get();

        return view('administrator.report.purchase.index', compact(['purchase', 'start_date', 'end_date']));
    }

    public function getPurchaseByDate(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        $purchase = Purchase::whereBetween(
            DB::raw('DATE(purchase_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $start_date)->toDateString(),
                Carbon::createFromFormat('Y-m-d', $end_date)->toDateString()
            ]
        )
            ->whereNotNull('purchase_type_id')
            ->with('products')
            ->get();

        return view('administrator.report.purchase.index', compact(['purchase', 'start_date', 'end_date']));
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
