<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['egresos'] = Egreso::orderBy('id', 'DESC')->paginate();

        return view('egreso.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('egreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'Tipo_Egreso' => 'required',
            'Fecha_Egreso' => 'required|date_format:Y-m-d',
            'Num_Factura' => 'nullable|numeric',
            'Monto' => 'required|numeric',
        ];

        $mensaje = [
            'Tipo_Egreso.required' => 'Debe ingresar el tipo de egreso',
            'Fecha_Egreso.required' => 'Debe ingresar la fecha del egreso',
            'Num_Factura.numeric' => 'Debe ingresar números en el número de factura',
            'Monto.required' => 'Debe ingresar el monto del egreso',
            'Monto.numeric' => 'Debe ingresar números en el monto',
            
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEgreso = request()->except('_token');



        Egreso::insert($datosEgreso);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('egreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egreso = Egreso::findOrFail($id);
        return view('egreso.show', compact('egreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $egreso = Egreso::findOrFail($id);
        return view('egreso.edit', compact('egreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Tipo_Egreso' => 'required',
            'Fecha_Egreso' => 'required|date_format:Y-m-d',
            'Num_Factura' => 'nullable|numeric',
            'Monto' => 'required|numeric',
        ];

        $mensaje = [
            'Tipo_Egreso.required' => 'Debe ingresar el tipo de egreso',
            'Fecha_Egreso.required' => 'Debe ingresar la fecha del egreso',
            'Num_Factura.numeric' => 'Debe ingresar números en el número de factura',
            'Monto.required' => 'Debe ingresar el monto del egreso',
            'Monto.numeric' => 'Debe ingresar números en el monto',
           
            
        ];


        $this->validate($request, $campos, $mensaje);


        $datosEgreso = request()->except(['_token', '_method']);



        Egreso::where('id', '=', $id)->update($datosEgreso);

        $egreso = Egreso::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return  redirect('egreso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $egreso = Egreso::findOrFail($id);
        $delete = Egreso::destroy($id);

        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $egreso->Fotografia)) {
                    Egreso::destroy($id);
                } else {
                    Egreso::destroy($id);
                }
                $success = true;
                $message = "El registro se ha eliminado correctamente";
            } catch (\Exception $e) {
                if ($e->getCode() == "23000") {
                    Alert::error('No se puede eliminar este registro');
                }
            }
        } else {
            $success = true;
            $message = "No se puede eliminar este registro";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public static function downloadPDF()
    {
        $egresos = Egreso::all();
        $pdf = PDF::loadView('egreso.reporte', compact('egresos'));

        return $pdf->download('egresos.pdf');
    }
}
