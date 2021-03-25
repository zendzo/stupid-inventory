<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Livewire\Component;

class ProductEdit extends Component
{
    public $name;
    public $description;
    public $category_id;
    public $code;
    public $price;
    public $quantity;
    public $unit_id;
    public $productId;

    protected $listeners = [
        'getProduct' => 'showProduct'
    ];
    public function render()
    {
        return view('livewire.product-edit',[
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    public function showProduct($product)
    {
        $this->name = $product['name'];
        $this->price = $product['price'];
        $this->quantity = $product['quantity'];
        $this->description = $product['description'];
        $this->productId = $product['id'];
        $this->unit_id = $product['unit_id'];
        $this->category_id = $product['category_id'];
        $this->code = $product['code'];
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'unit_id' => 'required',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $product = Product::findOrfail($this->productId);
            $product->update([
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'code' => $this->code,
                'unit_id' => $this->unit_id
            ]);
        }

        $this->emit('productUpdated', $product);
    }
}
