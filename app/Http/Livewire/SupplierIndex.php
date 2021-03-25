<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class SupplierIndex extends Component
{
    protected $listeners = [
        'supplierStored' => 'handleSupplierStored',
        'supplierUpdated' => 'handleSupplierUpdated'
    ];
    public $editSupplier = false;

    public function render()
    {
        return view('livewire.supplier-index', [
            'categories' => Supplier::orderBy('id', 'DESC')->paginate(5)
        ]);
    }


    public function handleSupplierStored($supplier)
    {
        session()->flash('message', 'Supplier ' . $supplier['name'] . '  Successfully Created');
    }

    public function handleSupplierUpdated($supplier)
    {
        session()->flash('message', 'Supplier ' . $supplier['name'] . '  Successfully Updated');
        $this->editSupplier = false;
    }

    public function getSupplier($id)
    {
        $this->editSupplier = true;

        $supplier = Supplier::findOrfail($id);

        $this->emit('getSupplier', $supplier);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrfail($id);

        if ($supplier) {
            $supplier->delete();
        }

        session()->flash('message', 'Supplier ' . $supplier['name'] . '  Deleted');

        if ($this->editSupplier) {
            $this->editSupplier = false;
        }
    }
}
