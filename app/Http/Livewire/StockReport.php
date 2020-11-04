<?php

namespace App\Http\Livewire;

use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StockReport extends Component
{
    public $type;
    public $model;
    public $type_date = 'sale_date';
    public $start_date;
    public $end_date;
    public $results;

    protected $listeners = [
        'queryEntered' => 'handleQueryEntered',
    ];

    public function render()
    {
        $this->type ?? $this->type = '2';

        if ($this->type === '1') {
            $this->model = new Sale();
            $this->type_date = 'sale_date';
        }

        if ($this->type === '2') {
            $this->model = new Purchase();
            $this->type_date = 'purchase_date';
        }

        $this->results = $this->model->has('products')
        ->whereBetween(
            DB::raw("DATE($this->type_date)"),
            [
                Carbon::createFromFormat('Y-m-d', $this->start_date ?: Date('Y-m-d'))->toDateString(),
                Carbon::createFromFormat('Y-m-d', $this->end_date ?: Date('Y-m-d'))->toDateString()
            ]
        )
        ->with('products')
        ->get();
        return view('livewire.stock-report', [
            'results' => $this->results,
        ]);
    }


    public function handleQueryEntered($start_date, $end_date, $type)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->type = $type;
        // dd($this->results);
        session()->flash('message', "Menampilkan Pencarian Tanggal $start_date s/d $end_date");
    }
}
