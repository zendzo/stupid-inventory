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
    public $sales_type = 'all';
    public $start_date;
    public $end_date;
    public $sales;
    public $page;

    protected $listeners = [
        'queryEntered' => 'handleQueryEntered',
    ];

    public function render()
    {
        $this->page = 'sales';
        $this->sales = Sale::whereBetween(
            DB::raw('DATE(sale_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $this->start_date ?: Date('Y-m-d'))->toDateString(),
                Carbon::createFromFormat('Y-m-d', $this->end_date ?: Date('Y-m-d'))->toDateString()
            ]
        )
            ->where(function ($query) {
                if ($this->sales_type !== 'all') {
                    $query->where('sale_type_id', $this->sales_type);
                }
                $query->whereNotNull('sale_type_id');
            })
            ->with('products')
            ->get();

        return view('livewire.sales-report', [
            'sales' => $this->sales,
            'units' => Unit::select('id', 'name')->get(),
            'salesTypes' => SalesType::select('id', 'name')->get()
        ]);
    }


    public function handleQueryEntered($start_date, $end_date, $type)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->sales_type = $type;
        session()->flash('message', "Menampilkan Pencarian Tanggal $start_date s/d $end_date");
    }
}
