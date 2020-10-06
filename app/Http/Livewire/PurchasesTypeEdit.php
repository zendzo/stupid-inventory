<?php

namespace App\Http\Livewire;

use App\Models\PurchasesType;
use Livewire\Component;

class PurchasesTypeEdit extends Component
{
    public $name;
    public $description;
    public $purchasesTypeId;

    protected $listeners = [
        'getPurchasesType' => 'showPurchasesType'
    ];
    public function render()
    {
        return view('livewire.purchases-type-edit');
    }

    public function showPurchasesType($purchasesType)
    {
        $this->name = $purchasesType['name'];
        $this->description = $purchasesType['description'];
        $this->purchasesTypeId = $purchasesType['id'];
    }

    public function updatePurchasesType()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $purchasesType = PurchasesType::findOrfail($this->purchasesTypeId);
            $purchasesType->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
        }

        $this->emit('purchasesTypeUpdated', $purchasesType);
    }
}
