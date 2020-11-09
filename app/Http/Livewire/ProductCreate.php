<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Unit;

class ProductCreate extends Component
{
    public $name;
    public $description;
    public $category_id;
    public $code;
    public $price;
    public $unit_id;

    public function render()
    {
        return view('livewire.product-create',[
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'category_id' => 'required|min:1',
            'unit_id' => 'required|min:1',
            'code' => 'required',
            'price' => 'required|numeric|min:2',
        ]);
        
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'code' => $this->code,
            'price' => $this->price,
            'unit_id' => $this->unit_id,
        ]);
        
        $this->emit('productStored',$product);
        
        $this->resetInput();

    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->category_id = null;
        $this->code = null;
        $this->price = null;
        $this->unit_id = null;
    }
}
