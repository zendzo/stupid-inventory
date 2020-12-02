<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasesType;
use App\Models\Sale;
use App\Models\SalesType;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->isAdmin()->create();
        Unit::factory()->create();
        Category::factory(10)->create();
        Supplier::factory(10)->create();
        PurchasesType::factory(5)->create();
        SalesType::factory(5)->create();
        Product::factory(10)->create();
        Sale::factory()->saleDate(date('Y-m-d'))->count(10)->create();
        Purchase::factory()->purchaseDate(date('Y-m-d'))->count(10)->create();
    }
}
