<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOrder extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'received_by',
        'doc',
        'noOfSuits',
        'amount',
        'description',
        'profit',
        
        'completed'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id');
    }
    
}
