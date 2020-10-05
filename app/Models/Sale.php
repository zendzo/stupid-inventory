<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'sale_type',
        'sale_date',
        'sent_date',
        'description',
        'paid_amount',
        'completed',
        'confirmed_by_admin',
    ];

    protected $date = ['sale_date', 'sent_date'];

    public function setSaleDateAttribute($value)
    {
        $this->attributes['sale_date'] = Carbon::createFromFormat('d-m-Y', $value, 'Asia/Jakarta');
    }

    public function setSentDateAttribute($value)
    {
        $this->attributes['sent_date'] = Carbon::createFromFormat('d-m-Y', $value, 'Asia/Jakarta');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['id','quantity','grand_total']);
    }
}
