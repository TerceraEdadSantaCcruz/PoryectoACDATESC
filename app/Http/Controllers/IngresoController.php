<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['ingresos'] = Ingreso::orderBy('id', 'DESC')->paginate();

        return view('ingreso.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'Tipo_Ingreso' => 'required',
            'Fecha_Ingreso' => 'required|date_format:Y-m-d',
            'Num_Factura' => 'nullable|numeric',
            'Monto' => 'required|numeric',
        ];

        $mensaje = [
            'Tipo_Ingreso.required' => 'Debe ingresar el tipo de ingreso',
            'Fecha_Ingreso.required' => 'Debe ingresar la fecha del ingreso',
            'Num_Factura.numeric' => 'Debe ingresar números en el número de factura',
            'Monto.required' => 'Debe ingresar el monto del ingreso',
            'Monto.numeric' => 'Debe ingresar números en el monto',

            
        ];

        $this->validate($request, $campos, $mensaje);

        $datosIngreso = request()->except('_token');


        Ingreso::insert($datosIngreso);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        return view('ingreso.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        return view('ingreso.edit', compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Tipo_Ingreso' => 'required',
            'Fecha_Ingreso' => 'required|date_format:Y-m-d',
            'Num_Factura' => 'nullable|numeric',
            'Monto' => 'required|numeric',
        ];

        $mensaje = [
            'Tipo_Ingreso.required' => 'Debe ingresar el tipo de ingreso',
            'Fecha_Ingreso.required' => 'Debe ingresar la fecha del ingreso',
            'Num_Factura.numeric' => 'Debe ingresar números en el número de factura',
            'Monto.required' => 'Debe ingresar el monto del ingreso',
            'Monto.numeric' => 'Debe ingresar números en el monto',


         
        ];


        $this->validate($request, $campos, $mensaje);


        $datosIngreso = request()->except(['_token', '_method']);

        Ingreso::where('id', '=', $id)->update($datosIngreso);

        $ingreso = Ingreso::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return  redirect('ingreso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $delete = Ingreso::destroy($id);

        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $ingreso->Fotografia)) {
                    Ingreso::destroy($id);
                } else {
                    Ingreso::destroy($id);
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
        $ingresos = Ingreso::all();
        $pdf = PDF::loadView('ingreso.reporte', compact('ingresos'));

        return $pdf->download('ingresos.pdf');
    }
}
