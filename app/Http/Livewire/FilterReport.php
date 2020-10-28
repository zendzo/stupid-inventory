<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\SalesType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FilterReport extends Component
{
    public $start_date;
    public $end_date;
    public $sale_type = 'all';

    public function render()
    {
        return view('livewire.filter-report', [
            'salesType' => SalesType::all(),
        ]);
    }

    public function searchQuery()
    {
        $this->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $sales = Sale::whereBetween(
            DB::raw('DATE(sale_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $this->start_date)->toDateString(),
                Carbon::createFromFormat('Y-m-d', $this->end_date)->toDateString()
            ]
        )
            ->where(function ($query) {
                if ($this->sale_type !== 'all') {
                    $query->where('sale_type_id', $this->sale_type);
                }
                $query->whereNotNull('sale_type_id');
            })
            ->with('products')
            ->get();

        // dd($this->sale_type);

        $this->emit('queryEntered', $sales, $this->start_date, $this->end_date);
    }
}
