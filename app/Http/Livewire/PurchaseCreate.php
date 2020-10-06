<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\PurchasesType;
use App\Models\Supplier;
use illuminate\Support\Str;

class PurchaseCreate extends Component
{
    public $supplier_id;
    public $code;
    public $purchase_type_id;
    public $purchase_date;
    public $sent_date;
    public $description;

    public function render()
    {
        return view('livewire.purchase-create',[
            'purchasesType' => PurchasesType::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    public function mount()
    {
        $this->code = strtoupper(Str::random(10));
    }

    public function addPurchases()
    {
        $this->validate([
            'supplier_id' => 'required|min:1',
            'code' => 'required|min:3',
            'purchase_type_id' => 'required|min:1',
            'purchase_date' => 'required',
            'sent_date' => 'required',
            'description' => 'required|min:5'
        ]);
        
        $purchases = Purchase::create([
            'supplier_id' => $this->supplier_id,
            'code' => $this->code,
            'purchase_type_id' => $this->purchase_type_id,
            'purchase_date' => $this->purchase_date,
            'sent_date' => $this->sent_date,
            'description' => $this->description
        ]);

        $this->resetInput();

        $this->emit('purchasesStored',$purchases);

        return redirect()->route('admin.purchases.show', $purchases->id);
    }

    public function resetInput()
    {
        $this->supplier_id = null;
        $this->code = null;
        $this->purchase_type_id = null;
        $this->purchase_date = null;
        $this->sent_date = null;
        $this->description = null;
    }
}
