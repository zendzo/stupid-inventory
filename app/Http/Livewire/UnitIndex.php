<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use Livewire\Component;

class UnitIndex extends Component
{
    protected $listeners = [
        'unitStored' => 'handleUnitStored',
        'unitUpdated' => 'handleUnitUpdated'
    ];
    public $editUnit = false;

    public function render()
    {
        return view('livewire.unit-index',[
            'units' => Unit::orderBy('id', 'DESC')->paginate(5)
        ]);
    }


    public function handleUnitStored($unit)
    {
        session()->flash('message', 'Unit '.$unit['name'].'  Successfully Created');
    }

    public function handleUnitUpdated($unit)
    {
        session()->flash('message', 'Unit '.$unit['name'].'  Successfully Updated');

        $this->editUnit = false;
    }

    public function getUnit($id)
    {
        $this->editUnit = true;
        
        $unit = Unit::findOrfail($id);

        $this->emit('getUnit', $unit);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrfail($id);

        if ($unit) {
            $unit->delete();
        }

        session()->flash('message', 'Unit '.$unit['name'].'  Deleted');

        if ($this->editUnit) {
            $this->editUnit = false;
        }
    }
}
