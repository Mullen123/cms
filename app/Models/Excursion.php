<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    use HasFactory;

      protected $table = "excursiones";



    /*aqui vas a poner todos los campos de tu tabla*/
  
    protected $fillable = [ 

        'titulo',
        'portada',
        'id_categoria',
        'description'
    ];


    /*llave foarena con la tabala categorias*/

        public $timestamps = false;

    //foreign key de el id_categoria a la tabla 
    public function categoria()
    {

return $this->belongsTo(Categorias::class,'id_categoria');

    }


}
