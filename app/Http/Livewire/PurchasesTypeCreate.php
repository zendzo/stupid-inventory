<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PurchasesType;

class PurchasesTypeCreate extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.purchases-type-create');
    }

    public function addPurchasesType()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);
        
        $purchasesType = PurchasesType::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->resetInput();

        $this->emit('purchasesTypeStored',$purchasesType);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
    }
}
