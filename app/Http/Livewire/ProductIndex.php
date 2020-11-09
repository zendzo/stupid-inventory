<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{
    protected $listeners = [
        'productStored' => 'handleProductStored',
        'productUpdated' => 'handleProductUpdated'
    ];
    public $editProduct = false;

    public function render()
    {
        return view('livewire.product-index',[
            'products' => Product::latest()->paginate(20)
        ]);
    }


    public function handleProductStored($product)
    {
        session()->flash('message', 'Product '.$product['name'].'  Successfully Created');
    }

    public function handleProductUpdated($product)
    {
        session()->flash('message', 'Product '.$product['name'].'  Successfully Updated');

        $this->editProduct = false;
    }

    public function getProduct($id)
    {
        $this->editProduct = true;
        
        $product = Product::findOrfail($id);

        $this->emit('getProduct', $product);
    }

    public function destroy($id)
    {
        $product = Product::findOrfail($id);

        if ($product) {
            $product->delete();
        }

        session()->flash('message', 'Product '.$product['name'].'  Deleted');

        if ($this->editProduct) {
            $this->editProduct = false;
        }
    }
}
