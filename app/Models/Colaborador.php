<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    //use HasFactory;

    public function scopeBuscarpor($query, $tipo, $buscar){
        if ($buscar){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}
