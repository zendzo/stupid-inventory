<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesType;

class SalesTypeCreate extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.sales-type-create');
    }

    public function addSalesType()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);
        
        $salesType = SalesType::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->resetInput();

        $this->emit('salesTypeStored',$salesType);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
    }
}
