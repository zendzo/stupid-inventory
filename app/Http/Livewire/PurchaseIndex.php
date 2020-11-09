<?php

namespace App\Http\Livewire;

use App\Models\Purchase;
use Livewire\Component;

class PurchaseIndex extends Component
{
    protected $listeners = [
        'purchasesStored' => 'handlePurchasesStored',
        'purchasesUpdated' => 'handlePurchasesUpdated',
    ];
    public $editPurchases = false;

    public function render()
    {
        return view('livewire.purchase-index',[
            'purchases' => Purchase::latest()->paginate(20)
        ]);
    }

    public function handlePurchasesStored($purchases)
    {
        session()->flash('message', 'Purchases Successfully Created');
    }

    public function handlePurchasesUpdated($purchases)
    {
        session()->flash('message', 'Purchases Successfully Updated');

        $this->editPurchases = false;
    }

    public function getPurchases($id)
    {
        $this->editPurchases = true;
        
        $purchases = Purchase::findOrfail($id);

        $this->emit('getPurchases', $purchases);
    }

    public function destroy($id)
    {
        $purchases = Purchase::findOrfail($id);

        if ($purchases) {
            $purchases->delete();
        }

        session()->flash('message', 'Purchases Deleted');

        if ($this->editPurchases) {
            $this->editPurchases = false;
        }
    }
}
