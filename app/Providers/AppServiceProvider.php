<?php

namespace App\Providers;

use App\Models\PurchasesType;
use App\Models\SalesType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer([
            'administrator.report.sales.index'
        ], function($view){
            $salesType = SalesType::all();
            return $view->with(['salesType' => $salesType]);
        });

        View::composer([
            'administrator.report.purchase.index'
        ], function ($view) {
            $purchaseType = PurchasesType::all();
            return $view->with(['purchaseType' => $purchaseType]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
