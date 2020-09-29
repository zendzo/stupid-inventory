<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;

class UnitEdit extends Component
{
    public $name;
    public $symbol;
    public $unitId;

    protected $listeners = [
        'getUnit' => 'showUnit'
    ];
    public function render()
    {
        return view('livewire.unit-edit');
    }

    public function showUnit($unit)
    {
        $this->name = $unit['name'];
        $this->symbol = $unit['symbol'];
        $this->unitId = $unit['id'];
    }

    public function updateUnit()
    {
        $this->validate([
            'name' => 'required|min:3',
            'symbol' => 'required|min:1'
        ]);

        if ($this->id) {
            $unit = Unit::findOrfail($this->unitId);
            $unit->update([
                'name' => $this->name,
                'symbol' => $this->symbol
            ]);
        }

        $this->emit('unitUpdated', $unit);
    }
}
