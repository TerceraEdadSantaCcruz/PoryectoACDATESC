<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarioFinanza;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BeneficiarioFinanzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['beneficiario'] = BeneficiarioFinanza::join('beneficiarios', 'beneficiario_finanzas.beneficiario_id', '=', 'beneficiarios.id')
            ->orderBy('fin_id', 'DESC')
            ->paginate();

        return view('BeneficiarioFinanza.index', $datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $beneficiarios = Beneficiario::orderBy('Apellido_1', 'ASC')
            ->get();

        return view('BeneficiarioFinanza.create', compact('beneficiarios'));
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
            'beneficiario_id' => 'required|not_in:0',
            'Tipo_Cuota' => 'required|string|max:50',
            'Fecha_Pago' => 'required|date_format:Y-m-d',
            'Monto' => 'required|numeric',
            'Descripcion' => 'max:300',
        ];

        $mensaje = [
            'beneficiario_id.not_in' => 'Debe seleccionar un beneficiario',

            'Tipo_Cuota.required' => 'Debe ingresar el tipo de cuota',
            'Tipo_Cuota.string' => 'El tipo de cuota solo puede contener letras',
            'Tipo_Cuota.max' => 'El tipo de cuota debe tener un máximo de 50 caracteres',

            'Fecha_Pago.required' => 'Debe indicar la fecha de pago',

            'Monto.required' => 'Debe ingresar el monto',
            'Monto.numeric' => 'No puede ingresar letras en el monto',

            'Descripcion.max' => 'La descripcion debe tener un máximo de 300 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except('_token');

        BeneficiarioFinanza::insert($datosBeneficiario);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect('BeneficiarioFinanza');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeneficiarioFinanza  $beneficiario_Finanza
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiarioFinanza = BeneficiarioFinanza::where('beneficiario_finanzas.fin_id','=',$id)
        ->join('beneficiarios', 'beneficiario_finanzas.beneficiario_id', '=', 'beneficiarios.id')
        ->first();
        return view('BeneficiarioFinanza.show', compact('beneficiarioFinanza'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeneficiarioFinanza  $beneficiarioFinanza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $beneficiarioFinanza = BeneficiarioFinanza::findOrFail($id);

        return view('BeneficiarioFinanza.edit', compact('beneficiarioFinanza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeneficiarioFinanza  $beneficiario_Finanza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'Tipo_Cuota' => 'required|string|max:50',
            'Fecha_Pago' => 'required|date_format:Y-m-d',
            'Monto' => 'required|numeric',
            'Descripcion' => 'max:300',
        ];

        $mensaje = [
            'Tipo_Cuota.required' => 'Debe ingresar el tipo de cuota',
            'Tipo_Cuota.string' => 'El tipo de cuota solo puede contener letras',
            'Tipo_Cuota.max' => 'El tipo de cuota debe tener un máximo de 50 caracteres',

            'Fecha_Pago.required' => 'Debe indicar la fecha de pago',

            'Monto.required' => 'Debe ingresar el monto',
            'Monto.numeric' => 'No puede ingresar letras en el monto',

            'Descripcion.max' => 'La descripcion debe tener un máximo de 300 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosBeneficiario = request()->except('_token', '_method');


        BeneficiarioFinanza::where('fin_id', '=', $id)->update($datosBeneficiario);
        $beneficiarioFinanza = BeneficiarioFinanza::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect('BeneficiarioFinanza');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeneficiarioFinanza  $beneficiarioFinanza
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $beneficiarioFinanza = BeneficiarioFinanza::findOrFail($id);
        $delete = BeneficiarioFinanza::destroy($id);

        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $beneficiarioFinanza->Fotografia)) {
                    BeneficiarioFinanza::destroy($id);
                } else {
                    BeneficiarioFinanza::destroy($id);
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

        $beneficiariofinanza = BeneficiarioFinanza::all();
        $pdf = PDF::loadView('beneficiarioFinanza.reporte', compact('beneficiariofinanza'));

        return $pdf->download('beneficiariofinanza.pdf');
    }
}
