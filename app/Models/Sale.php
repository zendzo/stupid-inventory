<?php

namespace App\Models;

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

    // protected $date = ['sale_date', 'sent_date'];
}
