<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
 
    protected $table = "slide";


    //para que te inserte en la base de datos usando el modelo
    protected $fillable = [ 

        'title',
        'description',
        'image',
       
    ];

    public $timestamps = false;
}
