<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Encargado;
use App\Models\BeneficiarioFinanza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datos['beneficiarios'] = Beneficiario::orderBy('id', 'DESC')
            ->paginate();

        return view('beneficiario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        $fechaDefecto = Carbon::parse('1960-01-01')->format('Y-m-d');

        return view('beneficiario.create', compact('fechaDefecto'));
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
            'Identificacion_Beneficiario' => 'required|numeric|unique:beneficiarios|digits_between:9,12',
            'Nombre' => 'required|max:30|regex:/^[\pL\s]+$/u',
            'Apellido_1' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_2' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Telefono' => 'digits_between:8,11',
            'Fecha_nacimiento' => 'required|date_format:Y-m-d',
            'Fecha_Ingreso' => 'required|date_format:Y-m-d',
            'Direccion' => 'required|max:255',
            'Fotografia' => 'max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'Identificacion_Beneficiario.required' => 'Debe ingresar la identificación del beneficiario',
            'Identificacion_Beneficiario.numeric' => 'La identificación solo puede contener números',
            'Identificacion_Beneficiario.unique' => 'Esta identificación ya se encuentra registrada',
            'Identificacion_Beneficiario.digits_between' => 'Debe ingresar un mínimo de 9 dígitos y un máximo de 12 dígitos en identificación',

            'Nombre.required' => 'Debe ingresar el nombre del beneficiario',
            'Nombre.regex' => 'El campo nombre de benficiario solo puede contener letras',
            'Nombre.max' => 'El nombre debe tener un máximo de 30 caracteres',

            'Apellido_1.required' => 'Debe ingresar el primer apellido del beneficiario',
            'Apellido_1.regex' => 'El primer apellido solo puede contener letras',
            'Apellido_1.max' => 'El primer apellido debe tener un máximo de 30 caracteres',

            'Apellido_2.required' => 'Debe ingresar el segundo apellido del beneficiario',
            'Apellido_2.regex' => 'El segundo apellido solo puede contener letras',
            'Apellido_2.max' => 'El segundo apellido debe tener un máximo de 30 caracteres',

            'Telefono.digits_between' => 'Debe ingresar un minimo de 8 dígitos y un maximo de 11 dígitos en el número de teléfono',

            'Fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento del beneficiario',
            'Fecha_Ingreso.required' => 'Debe indicar la fecha de ingreso del beneficiario',

            'Direccion.required' => 'Debe ingresar la dirección del beneficiario',
            'Direccion.max' => 'La dirección solo puede tener un máximo de 255 caracteres',

            'Fotografia.mimes' => 'Solo se pueden ingresar fotografías en formato tipo: jpeg, png, jpg'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except('_token');

        if ($request->hasFile('Fotografia')) {
            $datosBeneficiario['Fotografia'] = $request->file('Fotografia')->store('uploads', 'public');
        }

        $fecha_nacimiento = $request->input('Fecha_nacimiento');
        $edad = Carbon::parse($fecha_nacimiento)->age;

        $datosBeneficiario['Edad'] = $edad;

        Beneficiario::insert($datosBeneficiario);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('beneficiario');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */



    public function show($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        return view('beneficiario.show', compact('beneficiario'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */




    public function edit($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        return view('beneficiario.edit', compact('beneficiario'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $id)
    {

        $campos = [
            'Identificacion_Beneficiario' => 'required|numeric|digits_between:9,12',
            'Nombre' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_1' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_2' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Telefono' => 'digits_between:8,11',
            'Fecha_nacimiento' => 'required|date_format:Y-m-d',
            'Fecha_Ingreso' => 'required|date_format:Y-m-d',
            'Direccion' => 'required|max:255',
            'Fotografia' => 'max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'Identificacion_Beneficiario.required' => 'Debe ingresar la identificación del beneficiario',
            'Identificacion_Beneficiario.numeric' => 'La identificación solo puede contener números',
            'Identificacion_Beneficiario.digits_between' => 'Debe ingresar un mínimo de 9 dígitos y un máximo de 12 dígitos en identificación',

            'Nombre.required' => 'Debe ingresar el nombre del beneficiario',
            'Nombre.regex' => 'El nombre solo puede contener letras',
            'Nombre.max' => 'El nombre debe tener un máximo de 30 caracteres',

            'Apellido_1.required' => 'Debe ingresar el primer apellido del beneficiario',
            'Apellido_1.regex' => 'El primer apellido solo puede contener letras',
            'Apellido_1.max' => 'El primer apellido debe tener un máximo de 30 caracteres',

            'Apellido_2.required' => 'Debe ingresar el segundo apellido del beneficiario',
            'Apellido_2.regex' => 'El segundo apellido solo puede contener letras',
            'Apellido_2.max' => 'El segundo apellido debe tener un máximo de 30 caracteres',


            'Telefono.digits_between' => 'Debe ingresar un minimo de 8 dígitos y un maximo de 11 dígitos en el número de teléfono',

            'Fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento del beneficiario',
            'Fecha_Ingreso.required' => 'Debe indicar la fecha de ingreso del beneficiario',

            'Direccion.required' => 'Debe ingresar la dirección del beneficiario',
            'Direccion.max' => 'La dirección solo puede tener un máximo de 255 caracteres',

            'Fotografia.mimes' => 'Solo se pueden ingresar fotografías en formato tipo: jpeg, png, jpg'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except(['_token', '_method']);

        if ($request->hasFile('Fotografia')) {
            $beneficiario = Beneficiario::findOrFail($id);
            Storage::delete('public/' . $beneficiario->Fotografia);
            $datosBeneficiario['Fotografia'] = $request->file('Fotografia')->store('uploads', 'public');
        }

        $fecha_nacimiento = $request->input('Fecha_nacimiento');
        $edad = Carbon::parse($fecha_nacimiento)->age;

        $datosBeneficiario['Edad'] = $edad;

        Beneficiario::where('id', '=', $id)->update($datosBeneficiario);

        $beneficiario = Beneficiario::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return  redirect('beneficiario');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */


    public function delete($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        $delete = Beneficiario::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $beneficiario->Fotografia)) {
                    Beneficiario::destroy($id);
                } else {
                    Beneficiario::destroy($id);
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


    public static function downloadPDF($id)
    {
        $beneficiario = Beneficiario::where('id', '=', $id)->first();
        $encargado = Encargado::where('beneficiario_id','=',$beneficiario->id)->first();
        $pagos = BeneficiarioFinanza::where('beneficiario_id','=',$beneficiario->id)
            ->orderBy('fin_id', 'DESC')
            ->get();
        $pagosCount = $pagos->count();

        $fecha = Carbon::now();
        $fecha = $fecha->format('d/m/Y');


        $pdf = PDF::loadView('beneficiario.reporte', compact('beneficiario','encargado', 'pagos','pagosCount','fecha'));

        return $pdf->stream('beneficiario.pdf');
    }



    public function mostrarEncargado($id)
    {

        $encargado = Encargado::where('beneficiario_id', '=', $id)->first();

        return view('beneficiario.mostrarEncargado', compact('encargado', 'id'));
    }

    public function mostrarHistorial($id)
    {
        $historial = BeneficiarioFinanza::buscarpor('beneficiario_id', $id)->paginate();
        $montoTotal = $historial->sum('Monto');

        return view('beneficiario.mostrarHistorial', compact('historial', 'id', 'montoTotal'));
    }

    public function agregarEncargado($id)
    {
        $beneficiario = Beneficiario::findOrFail($id);
        return view('beneficiario.agregarEncargado', compact('beneficiario', 'id'));
    }
}
