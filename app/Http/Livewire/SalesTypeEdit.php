<?php

namespace App\Http\Livewire;

use App\Models\SalesType;
use Livewire\Component;

class SalesTypeEdit extends Component
{
    public $name;
    public $description;
    public $salesTypeId;

    protected $listeners = [
        'getSalesType' => 'showSalesType'
    ];
    public function render()
    {
        return view('livewire.sales-type-edit');
    }

    public function showSalesType($salesType)
    {
        $this->name = $salesType['name'];
        $this->description = $salesType['description'];
        $this->salesTypeId = $salesType['id'];
    }

    public function updateSalesType()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $salesType = SalesType::findOrfail($this->salesTypeId);
            $salesType->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
        }

        $this->emit('salesTypeUpdated', $salesType);
    }
}
