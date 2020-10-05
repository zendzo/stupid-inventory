<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class SaleEntry extends Component
{
    public $product_id;
    public $quantity;
    public $unit;
    public $price;
    public $grand_total;
    public $salesId;


    public function render()
    {
        return view('livewire.sale-entry',[
            'products' => Product::select(['id','name'])->get()
        ]);
    }

    public function updatedProductId()
    {
        $product = Product::find($this->product_id);

        $this->unit = $product->unit->symbol;
        $this->price = $product->price;
        $this->quantity = null;
    }

    public function updatedQuantity()
    {
        $this->grand_total = (int) $this->quantity * $this->price;
    }

    public function addEntry()
    {
        $this->validate([
            'product_id' => 'required|min:1',
            'quantity' => 'required'
        ]);

        $sales = Sale::findOrfail($this->salesId);

        $sales->products()->attach(
            $this->product_id,[
            'quantity' => $this->quantity,
            'grand_total' => $this->grand_total
            ]);
        
        $products = $sales->products;

        $this->resetInput();

        $this->emit('saleEntryAdded', $products);
    }

    public function resetInput()
    {
        $this->product_id = null;
        $this->quantity = null;
    }
}
