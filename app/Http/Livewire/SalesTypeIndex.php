<?php

namespace App\Http\Livewire;

use App\Models\SalesType;
use Livewire\Component;

class SalesTypeIndex extends Component
{
    protected $listeners = [
        'salesTypeStored' => 'handleSalesTypeStored',
        'salesTypeUpdated' => 'handleSalesTypeUpdated'
    ];

    public $editSalesType = false;

    public function render()
    {
        return view('livewire.sales-type-index',[
            'categories' => SalesType::orderBy('id', 'DESC')->paginate(5)
        ]);
    }


    public function handleSalesTypeStored($salesType)
    {
        session()->flash('message', 'SalesType '.$salesType['name'].'  Successfully Created');
    }

    public function handleSalesTypeUpdated($salesType)
    {
        session()->flash('message', 'SalesType '.$salesType['name'].'  Successfully Updated');

        $this->editSalesType = false;
    }

    public function getSalesType($id)
    {
        $this->editSalesType = true;
        
        $salesType = SalesType::findOrfail($id);

        $this->emit('getSalesType', $salesType);
    }

    public function destroy($id)
    {
        $salesType = SalesType::findOrfail($id);

        if ($salesType) {
            $salesType->delete();
        }

        session()->flash('message', 'SalesType '.$salesType['name'].'  Deleted');

        if ($this->editSalesType) {
            $this->editSalesType = false;
        }
    }
}
