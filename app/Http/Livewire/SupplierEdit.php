<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;

class SupplierEdit extends Component
{
    public $name;
    public $address;
    public $phone;
    public $status;
    public $description;
    public $supplierId;

    protected $listeners = [
        'getSupplier' => 'showSupplier'
    ];
    public function render()
    {
        return view('livewire.supplier-edit');
    }

    public function showSupplier($supplier)
    {
        $this->name = $supplier['name'];
        $this->address = $supplier['address'];
        $this->phone = $supplier['phone'];
        $this->status = $supplier['status'];
        $this->description = $supplier['description'];
        $this->supplierId = $supplier['id'];
    }

    public function updateSupplier()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $supplier = Supplier::findOrfail($this->supplierId);
            $supplier->update([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'status' => $this->status,
                'description' => $this->description
            ]);
        }

        $this->emit('supplierUpdated', $supplier);
    }
}
