<?php

namespace App\Http\Livewire;

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
        'saleEntryAdded' => 'handleSaleAdded',
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

    public function handleSaleAdded($products)
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
        $product = DB::table('product_purchase')->where('id', '=', $id)->delete();

        if ($product) {
            session()->flash('message', 'Product Deleted');
        }

    }
}
