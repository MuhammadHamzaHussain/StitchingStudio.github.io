<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_name',
        'amount',
        'paid',
        'date'
    ];

    public function order()
    {
        return $this->belongsTo(AddOrder::class, 'order_id');
    }
}

