<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\SalesType;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class SalesCreate extends Component
{
    public $name;
    public $code;
    public $sale_type;
    public $sale_date;
    public $sent_date;
    public $description;

    public function render()
    {
        return view('livewire.sales-create',[
            'salesType' => SalesType::all()
        ]);
    }

    public function mount()
    {
        $this->code = strtoupper(Str::random(10));
    }

    public function addSales()
    {
        $this->validate([
            'name' => 'required|min:3',
            'code' => 'required|min:3',
            'sale_type' => 'required|min:1',
            'sale_date' => 'required',
            'sent_date' => 'required',
            'description' => 'required|min:5'
        ]);
        
        $sales = Sale::create([
            'name' => $this->name,
            'code' => $this->code,
            'sale_type_id' => $this->sale_type,
            'sale_date' => $this->sale_date,
            'sent_date' => $this->sent_date,
            'description' => $this->description
        ]);

        $this->resetInput();

        $this->emit('salesStored',$sales);

        if (Auth::user()->role_id === 2) {
            return redirect()->route('cashier.sales.show', $sales->id);
        }

        return redirect()->route('admin.sales.show', $sales->id);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->code = null;
        $this->sale_type = null;
        $this->sale_date = null;
        $this->sent_date = null;
        $this->description = null;
    }
}
