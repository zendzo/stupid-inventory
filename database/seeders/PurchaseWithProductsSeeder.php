<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Product;

class PurchaseWithProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::factory()->hasAttached(Product::factory()->count(5),
            [
                'quantity' => random_int(2,5),
                'grand_total' => random_int(1000,2000)
            ]
        )
        ->create();
    }
}
