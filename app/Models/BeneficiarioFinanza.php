<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiarioFinanza extends Model
{
    //use HasFactory;
    protected $primaryKey = 'fin_id';

    public function scopeBuscarpor($query, $tipo, $buscar){
        if ($buscar){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}