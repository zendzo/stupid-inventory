<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'code',
        'purchase_type_id',
        'purchase_date',
        'sent_date',
        'description',
        'paid_amount',
        'completed',
        'confirmed_by_admin',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseType()
    {
        return $this->belongsTo(PurchasesType::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_purchase')->withPivot(['id','quantity','grand_total']);
    }
}
