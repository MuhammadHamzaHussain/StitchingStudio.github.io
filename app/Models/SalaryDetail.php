<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryDetail extends Model
{
    use HasFactory;

    protected $table = 'salary_details';

    protected $fillable = [
        'staff_designation', 
        'staff_name', 
        'date', 
        'amount', 
        'description'
    ];
}