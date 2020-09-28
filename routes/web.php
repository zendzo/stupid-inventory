<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    UserDashboardController::class, 'index'
])->middleware(['auth'])->name('user.dashboard');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){
    Route::get('/',[AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
