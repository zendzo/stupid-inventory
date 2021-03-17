<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PurchaseList extends Component
{
    public $code;
    public $products;
    public $purchaseId;
    public $grandTotal;

    protected $listeners = [
        'purchaseEntryAdded' => 'handlePurchaseAdded',
        'getPurchase' => 'getPurchaseProducts'
    ];

    public function render()
    {
        $this->products = Purchase::find($this->purchaseId)->products;

        return view('livewire.purchase-list',[
            'products' => $this->products,
            'grandtotal' => $this->grandTotal
        ]);
    }

    public function handlePurchaseAdded($products)
    {
        $this->products = $products;

        session()->flash('message', 'Product Successfully Added');
    }
    
    public function getPurchaseProducts($purchase)
    {
        $this->code = $purchase['code'];
    }

    public function destroy($id)
    {
        $product = DB::table('product_purchase')->where('id', '=', $id)->first();

        if ($product) {

            $delete = DB::table('product_purchase')->where('id', '=', $id)->delete();

            if ($delete) {
                Product::findOrfail($product->product_id)->decrement('quantity', $product->quantity);
                session()->flash('message', 'Product Deleted');
            }
        }

    }
}
