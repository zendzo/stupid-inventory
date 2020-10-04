<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SaleEntry extends Component
{
    public $product_id;
    public $quantity;
    public $unit;
    public $price;
    public $grand_total;

    public function render()
    {
        return view('livewire.sale-entry',[
            'products' => Product::select(['id','name'])->get()
        ]);
    }

    public function getProduct($id)
    {
        $product = Product::findOrfail($id);

        return dd($product);
    }
}
