<?php

namespace App\Http\Livewire;

use App\Models\Purchase;
use App\Models\PurchasesType;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PurchaseReport extends Component
{
    public $purchase_type = 'all';
    public $start_date;
    public $end_date;
    public $purchases;
    public $page;

    protected $listeners = [
        'queryEntered' => 'handleQueryEntered',
    ];

    public function render()
    {
        $this->page = 'purchase';
        $this->purchases = Purchase::whereBetween(
            DB::raw('DATE(purchase_date)'),
            [
                Carbon::createFromFormat('Y-m-d', $this->start_date ?: Date('Y-m-d'))->toDateString(),
                Carbon::createFromFormat('Y-m-d', $this->end_date ?: Date('Y-m-d'))->toDateString()
            ]
        )
            ->where(function ($query) {
                if ($this->purchase_type !== 'all') {
                    $query->where('purchase_type_id', $this->purchase_type);
                }
                $query->whereNotNull('purchase_type_id');
            })
            ->with('products')
            ->get();

        return view('livewire.purchase-report', [
            'purchases' => $this->purchases,
            'units' => Unit::select('id', 'name')->get(),
            'purchaseTypes' => PurchasesType::select('id', 'name')->get()
        ]);
    }


    public function handleQueryEntered($start_date, $end_date, $type)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->purchase_type = $type;
        session()->flash('message', "Menampilkan Pencarian Tanggal $start_date s/d $end_date");
    }
}
