<?php

namespace App\Http\Controllers;

use App\Models\AtencionPeriodica;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class AtencionPeriodicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['atencion_periodicas'] = AtencionPeriodica::join('beneficiarios', 'atencion_periodicas.beneficiario_id', '=', 'beneficiarios.id')
            ->orderBy('aten_id', 'DESC')
            ->paginate();

        return view('atencion_periodicas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiarios = Beneficiario::orderBy('Apellido_1', 'ASC')
            ->get();
        return view('atencion_periodicas.create', compact('beneficiarios'));
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
            'beneficiario_id' => 'required|not_in:0',
            'Fecha' => 'required|date_format:Y-m-d',
            'Presion_Arterial' => 'required|max:5',
            'Palpitaciones' => 'required|max:5',
            'Diabetes' => 'required|max:5',
            'Temperatura' => 'required|max:5',
            'Oxigeno' => 'required|max:5',
            'Observaciones' => 'max:300'
        ];

        $mensaje = [
            'beneficiario_id.required' => 'Debe seleccionar un beneficiario',
            'beneficiario_id.not_in' => 'Debe seleccionar un beneficiario',
            'Fecha.required' => 'Debe indicar la fecha de la ficha médica',
            'Presion_Arterial.required' => 'Debe ingresar la presión arterial del beneficiario',
            'Presion_Arterial.max' => 'La presión arterial no debe tener más de 5 caracteres',
            'Palpitaciones.required' => 'Debe ingresar palpitaciones por minuto del beneficiario',
            'Palpitaciones.max' => 'Las palpitaciones por minuto no deben tener más de 5 caracteres',
            'Diabetes.required' => 'Debe ingresar la diabetes del beneficiario',
            'Diabetes.max' => 'La diabetes no debe tener más de 5 caracteres',
            'Temperatura.required' => 'Debe ingresar la temperatura del beneficiario',
            'Temperatura.max' => 'La temperatura no debe tener más de 5 caracteres',
            'Oxigeno.required' => 'Debe ingresar el oxígeno del beneficiario',
            'Oxigeno.max' => 'El oxígeno no debe tener más de 5 caracteres',
            'Observaciones.max' => 'La observación no debe tener más de 300 caracteres'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosatencion_periodica = request()->except('_token');

        AtencionPeriodica::insert($datosatencion_periodica);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect('atencion_periodicas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AtencionPeriodica  $atencionPeriodica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atencionPeriodica = AtencionPeriodica::where('atencion_periodicas.aten_id','=',$id)
        ->join('beneficiarios', 'atencion_periodicas.beneficiario_id', '=', 'beneficiarios.id')
        ->first();
        return view('atencion_periodicas.show', compact('atencionPeriodica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AtencionPeriodica  $atencionPeriodica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atencionPeriodica = AtencionPeriodica::findOrFail($id);
        return view('atencion_periodicas.edit', compact('atencionPeriodica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AtencionPeriodica  $atencionPeriodica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Fecha' => 'required|date_format:Y-m-d',
            'Presion_Arterial' => 'required|max:5',
            'Palpitaciones' => 'required|max:5',
            'Diabetes' => 'required|max:5',
            'Temperatura' => 'required|max:5',
            'Oxigeno' => 'required|max:5',
            'Observaciones' => 'max:300'
        ];

        $mensaje = [
            'Fecha.required' => 'Debe indicar la fecha de ficha médica',
            'Presion_Arterial.required' => 'Debe ingresar la presión arterial del beneficiario',
            'Presion_Arterial.max' => 'La presión arterial no debe tener más de 5 caracteres',
            'Palpitaciones.required' => 'Debe ingresar palpitaciones por minuto del beneficiario',
            'Palpitaciones.max' => 'Las palpitaciones por minuto no deben tener más de 5 caracteres',
            'Diabetes.required' => 'Debe ingresar la diabetes del beneficiario',
            'Diabetes.max' => 'La diabetes no debe tener más de 5 caracteres',
            'Temperatura.required' => 'Debe ingresar la temperatura del beneficiario',
            'Temperatura.max' => 'La temperatura no debe tener más de 5 caracteres',
            'Oxigeno.required' => 'Debe ingresar el oxígeno del beneficiario',
            'Oxigeno.max' => 'El oxígeno no debe tener más de 5 caracteres',
            'Observaciones.max' => 'La observación no debe tener más de 300 caracteres'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosatencion_periodica = request()->except('_token', '_method');
        AtencionPeriodica::where('aten_id', '=', $id)->update($datosatencion_periodica);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect()->route('atencion_periodicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AtencionPeriodica  $atencionPeriodica
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $datosatencion_periodica = AtencionPeriodica::findOrFail($id);
        $delete = AtencionPeriodica::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $datosatencion_periodica->Fotografia)) {
                    AtencionPeriodica::destroy($id);
                } else {
                    AtencionPeriodica::destroy($id);
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
        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public static function downloadPDF($id)
    {
        $beneficiario = AtencionPeriodica::where('aten_id', '=', $id)
            ->join('beneficiarios', 'atencion_periodicas.beneficiario_id', '=', 'beneficiarios.id')
            ->first();
            $fecha = Carbon::now();
            $fecha = $fecha->format('d/m/Y');

        $pdf = PDF::loadView('atencion_periodicas.reporte', compact('beneficiario','fecha'));

        return $pdf->stream('beneficiario.pdf');
    }
}
