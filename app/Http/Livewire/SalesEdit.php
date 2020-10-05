<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;

class SalesEdit extends Component
{
    public $name;
    public $code;
    public $sale_type;
    public $sale_date;
    public $sent_date;
    public $description;
    public $salesId;

    protected $listeners = [
        'getSales' => 'showSales'
    ];
    public function render()
    {
        return view('livewire.sales-edit');
    }

    public function showSales($sales)
    {
        $this->name = $sales['name'];
        $this->code = $sales['code'];
        $this->sale_type = $sales['sale_type_id'];
        $this->sale_date = $sales['sale_date'];
        $this->sent_date = $sales['sent_date'];
        $this->description = $sales['description'];
        $this->salesId = $sales['id'];
    }

    public function updateSales()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $sales = Sale::findOrfail($this->salesId);
            $sales->update([
                'name' => $this->name,
                'sale_type_id' => $this->sale_type,
                'sale_date' => $this->sale_date,
                'sent_date' => $this->sent_date,
                'description' => $this->description
            ]);
        }

        $this->emit('salesUpdated', $sales);
    }
}
