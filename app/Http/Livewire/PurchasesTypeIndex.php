<?php

namespace App\Http\Livewire;

use App\Models\PurchasesType;
use Livewire\Component;

class PurchasesTypeIndex extends Component
{
    protected $listeners = [
        'purchasesTypeStored' => 'handlePurchasesTypeStored',
        'purchasesTypeUpdated' => 'handlePurchasesTypeUpdated'
    ];

    public $editPurchasesType = false;

    public function render()
    {
        return view('livewire.purchases-type-index',[
            'categories' => PurchasesType::latest()->paginate(5)
        ]);
    }


    public function handlePurchasesTypeStored($purchasesType)
    {
        session()->flash('message', 'PurchasesType '.$purchasesType['name'].'  Successfully Created');
    }

    public function handlePurchasesTypeUpdated($purchasesType)
    {
        session()->flash('message', 'PurchasesType '.$purchasesType['name'].'  Successfully Updated');

        $this->editPurchasesType = false;
    }

    public function getPurchasesType($id)
    {
        $this->editPurchasesType = true;
        
        $purchasesType = PurchasesType::findOrfail($id);

        $this->emit('getPurchasesType', $purchasesType);
    }

    public function destroy($id)
    {
        $purchasesType = PurchasesType::findOrfail($id);

        if ($purchasesType) {
            $purchasesType->delete();
        }

        session()->flash('message', 'PurchasesType '.$purchasesType['name'].'  Deleted');
    }
}
