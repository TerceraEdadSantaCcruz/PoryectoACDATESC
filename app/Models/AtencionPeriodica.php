<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionPeriodica extends Model
{
    use HasFactory;

    protected $primaryKey = 'aten_id';

    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['title','descripcion','start','end'];
}
