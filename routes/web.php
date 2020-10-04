<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    UserDashboardController::class, 'index'
])->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){
    Route::get('/dashboard',[AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');

    Route::get('/product', [ProductController::class, 'index'])->name('product');

    Route::get('/unit', [UnitController::class, 'index'])->name('unit');

    Route::get('/distributor', [SupplierController::class, 'index'])->name('supplier');

    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
