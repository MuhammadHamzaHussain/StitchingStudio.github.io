<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Measurements extends Model
{
    use HasFactory;

    protected $table = 'measurements'; // Specify the table associated with this model

    protected $fillable = [
        
        'lambai',
        'tera',
        'bazu',
        'kundah',
        'galeh',
        'chest',
        'kamar',
        'chest_tayyar',
        'kamartiyaar',
        'gohire_tayyar',
        'shalwar_lambai',
        'panche',
        'chokor_ghera',
        'gol_ghera',
        'baba_bazu',
        'kaff',
        'lambai_kot',
        'hip',
    ];
    

    
    

    // You can define relationships, accessors, mutators, and other methods here as needed
}
