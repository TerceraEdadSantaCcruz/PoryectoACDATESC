<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    //use HasFactory;
    public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

   
}
