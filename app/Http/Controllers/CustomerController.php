<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class CustomerController extends Controller
{
    public function index()
    {
        $sales = Sale::whereHas('products')
            ->with('products')
            ->orderBy('sale_date', 'DESC')
            ->paginate(20);

        return view('administrator.customer.index', compact(['sales']));
    }
}
