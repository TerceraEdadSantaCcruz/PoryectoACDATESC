<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    //use HasFactory;
     public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}
