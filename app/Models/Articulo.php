<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventario;

class Articulo extends Model
{
    //use HasFactory;
    
    public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class,'inv_id');
    }
}
