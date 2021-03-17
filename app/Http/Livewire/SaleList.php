<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SaleList extends Component
{
    public $code;
    public $products;
    public $salesId;
    public $grandTotal;
    public $stockAvailable;

    protected $listeners = [
        'saleEntryAdded' => 'handleSaleAdded',
        'saleQuantity' => 'handleSaleQuantity',
        'getSales' => 'getSalesProducts'
    ];

    public function render()
    {
        $this->products = Sale::find($this->salesId)->products;

        return view('livewire.sale-list',[
            'products' => $this->products,
            'grandtotal' => $this->grandTotal
        ]);
    }

    public function handleSaleAdded($products)
    {
        $this->products = $products;

        session()->flash('message', 'Product Successfully Added');
    }

    public function handleSaleQuantity($currentStock)
    {
        $this->stockAvailable = $currentStock;

        session()->flash('message', 'Pemesanan Melebihi Stock Ketersediaan Product');
    }
    
    public function getSalesProducts($sales)
    {
        $this->code = $sales['code'];
    }

    public function destroy($id)
    {
        
        $product = DB::table('product_sale')->where('id', '=', $id)->first();
        
        if ($product) {
            
            $delete = DB::table('product_sale')->where('id', '=', $id)->delete();
            
            if ($delete) {
                Product::findOrfail($product->product_id)->increment('quantity', $product->quantity);
                session()->flash('message', 'Product Deleted');
            }
        }

    }
}
