<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    UserDashboardController::class, 'index'
    ])
    ->middleware(['auth'])
    ->name('dashboard');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){
    Route::get('/dashboard',[AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');

    Route::get('/product', [ProductController::class, 'index'])->name('product');

    Route::get('/unit', [UnitController::class, 'index'])->name('unit');

    Route::view('/sales-type', 'administrator.sales-type.index')->name('sales-type');

    Route::view('/purchase-type', 'administrator.purchase-type.index')->name('purchase-type');

    Route::get('/distributor', [SupplierController::class, 'index'])->name('supplier');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    
    Route::get('/sales/{id}', [SalesController::class, 'show'])->name('sales.show');

    Route::get('/sales/invoice/{id}', [SalesController::class,  'invoice'])->name('sales.invoice');
    
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');

    Route::get('/purchase/{id}', [PurchaseController::class, 'show'])->name('purchases.show');

    Route::get('/purchase/invoice/{id}', [PurchaseController::class, 'invoice'])->name('purchase.invoice');

    Route::get('/user', [UserController::class,'index'])->name('user');

    Route::get('/report/sales', [ReportController::class, 'sales'])->name('report.sales');

    Route::get('/report/purchase', [ReportController::class, 'purchase'])->name('report.purchase');

    Route::get('/report/stock', [ReportController::class, 'stock'])->name('report.stock');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
