<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;

class UnitCreate extends Component
{
    public $name;
    public $symbol;

    public function render()
    {
        return view('livewire.unit-create');
    }

    public function addUnit()
    {
        $this->validate([
            'name' => 'required|min:3',
            'symbol' => 'required|min:1'
        ]);
        
        $unit = Unit::create([
            'name' => $this->name,
            'symbol' => $this->symbol
        ]);

        $this->resetInput();

        $this->emit('unitStored',$unit);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->symbol = null;
    }
}
