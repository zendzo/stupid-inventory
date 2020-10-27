<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class SalesIndex extends Component
{
    protected $listeners = [
        'salesStored' => 'handleSalesStored',
        'salesUpdated' => 'handleSalesUpdated',
    ];
    public $editSales = false;

    public function render()
    {
        return view('livewire.sales-index',[
            'sales' => Sale::latest()->paginate(5)
        ]);
    }

    public function handleSalesStored($sales)
    {
        session()->flash('message', 'Sales '.$sales['name'].'  Successfully Created');
    }

    public function handleSalesUpdated($sales)
    {
        session()->flash('message', 'Sales '.$sales['name'].'  Successfully Updated');

        $this->editSales = false;
    }

    public function getSales($id)
    {
        $this->editSales = true;
        
        $sales = Sale::findOrfail($id);

        $this->emit('getSales', $sales);
    }

    public function destroy($id)
    {
        $sales = Sale::findOrfail($id);

        if ($sales) {
            $sales->delete();
        }

        session()->flash('message', 'Sales '.$sales['name'].'  Deleted');

        if ($this->editSales) {
            $this->editSales = false;
        }
    }
}
