<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo;
use App\Models\Categoria;

class Inventario extends Model
{
    //use HasFactory;
    protected $primaryKey = 'inv_id';
    
    public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'cat_id','categoria_id');
    }

    public function articulo()
    {
        return $this->hasMany(Articulo::class,'inventario_id','inv_id');
    }
}
