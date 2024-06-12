<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationDetail extends Model
{
    use HasFactory;

    protected $table = 'designation_details';

    protected $fillable = ['designationName'];
}
