<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\SalesType;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesReport extends Component
{
    public $filteredSales;

    protected $listeners = [
        'queryEntered' => 'handleQueryEntered',
    ];

    public function render()
    {
        $sales = Sale::whereBetween(
            DB::raw('DATE(sale_date)'),
            [
                Carbon::createFromFormat('Y-m-d', Date('Y-m-d'))->toDateString(),
                Carbon::createFromFormat('Y-m-d', Date('Y-m-d'))->toDateString()
            ]
        )->get();

        return view('livewire.sales-report', [
            'sales' => $this->filteredSales ?: $sales,
            'units' => Unit::select('id', 'name')->get(),
            'saleTypes' => SalesType::select('id','name')->get()
        ]);
    }


    public function handleQueryEntered($sales, $start_date, $end_date)
    {
        $this->filteredSales = $sales;
        
        session()->flash('message', "Menampilkan Pencarian Tanggal $start_date s/d $end_date");
    }
}
