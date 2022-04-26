<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

  protected $table = "mensajes";


    //para que te inserte en la base de datos usando el modelo
    protected $fillable = [ 

        'name','email','message',
       
    ];

}
