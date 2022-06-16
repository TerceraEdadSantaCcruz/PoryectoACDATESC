<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{

    //use HasFactory;
    public function scopeBuscarpor($query, $tipo, $buscar){
        if (($tipo) && ($buscar)){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    public function encargado()
    {
        return $this->hasOne(Encargado::class);
    }

    public function pagos()
    {
        return $this->hasMany(BeneficiarioFinanza::class);
    }



}
