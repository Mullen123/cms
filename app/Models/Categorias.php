<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = "categorias";
    

    /*aqui vas a poner todos los campos de tu tabla*/
     protected $fillable = [
        'name'
    ];
}
