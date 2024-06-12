<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffDetail extends Model
{
    use HasFactory;

    protected $table = 'staff_details'; // Specify the table name

    protected $fillable = [
        'designation',
        'name',
        'gender',
        'dob',
        'mobile',
        'joining_date',
        'address',
        'city',
        'state',
        'salary',
    ];

    public function designationDetail()
    {
        return $this->belongsTo(DesignationDetail::class, 'designation', 'designationName');
    }
}
