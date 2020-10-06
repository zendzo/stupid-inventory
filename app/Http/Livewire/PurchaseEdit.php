<?php

namespace App\Http\Livewire;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchasesType;
use Livewire\Component;

class PurchaseEdit extends Component
{
    public $supplier_id;
    public $code;
    public $purchase_type_id;
    public $purchase_date;
    public $sent_date;
    public $description;
    public $purchaseId;

    protected $listeners = [
        'getPurchases' => 'showPurchases'
    ];
    public function render()
    {
        return view('livewire.purchase-edit',[
            'purchasesType' => PurchasesType::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    public function showPurchases($purchase)
    {
        $this->supplier_id = $purchase['supplier_id'];
        $this->code = $purchase['code'];
        $this->purchase_type_id = $purchase['purchase_type_id'];
        $this->purchase_date = $purchase['purchase_date'];
        $this->sent_date = $purchase['sent_date'];
        $this->description = $purchase['description'];
        $this->purchaseId = $purchase['id'];
    }

    public function updatePurchase()
    {
        $this->validate([
            'supplier_id' => 'required|min:1',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $purchase = Purchase::findOrfail($this->purchaseId);
            $purchase->update([
                'supplier_id' => $this->supplier_id,
                'purchase_type_id' => $this->purchase_type_id,
                'purchase_date' => $this->purchase_date,
                'sent_date' => $this->sent_date,
                'description' => $this->description
            ]);
        }

        $this->emit('purchasesUpdated', $purchase);
    }
}
