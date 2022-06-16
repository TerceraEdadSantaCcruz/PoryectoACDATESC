<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Actividades;
use App\Models\Colaborador;
use App\Models\Inventario;
use  Illuminate\Support\Facades\DB;


class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function TotalBeneficiarios(){

       $total = DB::table('beneficiarios')->count();
       return $this->sendResponse($total, 'Total Beneficiarios');
    }

    public function totalActividades(){
        $total = DB::table('actividades')->count();
        return $this->sendResponse($total, 'Total Actividades');
     }
     public function totalColaboradores(){
        $total = DB::table('colaboradors')->count();
        return $this->sendResponse($total, 'Total Colaboradores');
    }
    public function totalInventarios(){
        $total = DB::table('inventarios')->count();
        return $this->sendResponse($total, 'Total Invetarios');
    }



}
