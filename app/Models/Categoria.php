<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //use HasFactory;

    protected $primaryKey = 'cat_id';


    public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    public function inventario()
    {
        return $this->hasMany(Inventario::class,'categoria_id','cat_id');
    }

    public function articulo()
    {
        return $this->hasManyThrough(
            Articulo::class, 
            Inventario::class,
            'categoria_id',
            'inventario_id',
            'cat_id',
            'inv_id'
        );
    }
}
