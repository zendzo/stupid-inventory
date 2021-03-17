<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
            'category_id',
            'name',
            'price',
            'code',
            'description',
            'unit_id',
            'status',
            'quantity'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class)->withPivot(['id','quantity','grand_total']);
    }

    public function purchase()
    {
        return $this->belongsToMany(Purchase::class)->withPivot(['id', 'quantity', 'grand_total']);
    }
}
