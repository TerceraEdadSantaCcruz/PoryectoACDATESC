<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['colaboradors'] = Colaborador::orderBy('id', 'DESC')->paginate();
        return view('colaborador.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechaDefecto = Carbon::parse('1990-01-01')->format('Y-m-d');
        return view('colaborador.create', compact('fechaDefecto'));
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
            'Identificacion' => 'required|numeric|unique:colaboradors',
            'Nombre' => 'required|alpha|max:30',
            'Apellido_1' => 'required|alpha|max:30',
            'Apellido_2' => 'required|alpha|max:30',
            'Telefono' => 'required|numeric|digits:8',
            'Fecha_nacimiento' => 'required|date_format:Y-m-d',
            'Direccion' => 'required|max:255',
            'Fotografia' => 'max:10000|mimes:jpeg,png,jpg',
            'Puesto' => 'required|max:30',
            'Correo_Electronico_Colaborador' => 'nullable|string|email|unique:colaboradors|max:50'
        ];

        $mensaje = [
            'Identificacion.required' => 'Debe ingresar la identificación del beneficiario',
            'Identificacion.numeric' => 'La identificación solo puede contener números',
            'Identificacion.unique' => 'Esta identificación ya se encuentra registrada',
            'Nombre.required' => 'Debe ingresar el nombre del colaborador',
            'Nombre.alpha' => 'Solo puede ingresar letras en el nombre del colaborador',
            'Apellido_1.required' => 'Debe ingresar el primer apellido del colaborador',
            'Apellido_1.alpha' => 'Solo puede ingresar letras en el primer apellido',
            'Apellido_2.required' => 'Debe ingresar el segundo apellido del colaborador',
            'Apellido_2.alpha' => 'Solo puede ingresar letras en el segundo apellido',
            'Telefono.required' => 'Debe ingresar el número de teléfono',
            'Telefono.numeric' => 'Solo puede ingresar números en el teléfono',
            'Telefono.digits' => 'Debe ingresar 8 dígitos en el número de telefono',
            'Fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento del colaborador',
            'Direccion.required' => 'Debe ingresar la dirección del colaborador',
            'Fotografia' => 'max:10000|mimes:jpeg,png,jpg',
            'Puesto.required' => 'Debe ingresar el puesto del colaborador',
            'Puesto.string' => 'El puesto solo puede contener letras',
            'Correo_Electronico_Colaborador.email' => 'El correo electrónico del colaborador debe ser una dirección de correo electrónico válida',
            'Correo_Electronico_Colaborador.unique' => 'El Correo electronico ya ha sido registrado',
            'Fotografia.mimes' => 'Solo se pueden ingresar fotografías en formato tipo: jpeg, png, jpg'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosColaborador = request()->except('_token');

        if ($request->hasFile('Fotografia')) {
            $datosColaborador['Fotografia'] = $request->file('Fotografia')->store('uploads', 'public');
        }

        $fecha_nacimiento = $request->input('Fecha_nacimiento');
        $edad = Carbon::parse($fecha_nacimiento)->age;

        $datosColaborador['Edad'] = $edad;

        Colaborador::insert($datosColaborador);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('colaborador');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $colaborador = Colaborador::findOrFail($id);
        return view('colaborador.show', compact('colaborador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $colaborador = Colaborador::findOrFail($id);
        return view('colaborador.edit', compact('colaborador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Identificacion' => 'required|numeric',
            'Nombre' => 'required|alpha|max:30',
            'Apellido_1' => 'required|alpha|max:30',
            'Apellido_2' => 'required|alpha|max:30',
            'Telefono' => 'required|numeric|digits:8',
            'Fecha_nacimiento' => 'required|date_format:Y-m-d',
            'Edad' => 'required|numeric',
            'Direccion' => 'required|max:255',
            'Puesto' => 'required|string|max:30',
            'Correo_Electronico_Colaborador' => 'nullable|string|email|max:50',
            'Fotografia' => 'max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje = [
            'Identificacion.required' => 'Debe ingresar la identificación del colaborador',
            'Identificacion.numeric' => 'La identificación solo puede contener números',

            'Nombre.required' => 'Debe ingresar el nombre del colaborador',
            'Nombre.alpha' => 'Solo puede ingresar letras en el nombre del colaborador',

            'Apellido_1.required' => 'Debe ingresar el primer apellido del colaborador',
            'Apellido_1.alpha' => 'Solo puede ingresar letras en el primer apellido',

            'Apellido_2.required' => 'Debe ingresar el segundo apellido del colaborador',
            'Apellido_2.alpha' => 'Solo puede ingresar letras en el segundo apellido',

            'Telefono.required' => 'Debe ingresar el número de teléfono',
            'Telefono.numeric' => 'Solo puede ingresar números en el teléfono',
            'Telefono.digits' => 'Debe ingresar 8 dígitos en el número de telefono',

            'Fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento del colaborador',

            'Edad.required' => 'Debe ingresar la edad del colaborador',
            'Edad.numeric' => 'Solo puede ingresar números en la edad',

            'Direccion.required' => 'Debe ingresar la dirección del colaborador',

            'Puesto.required' => 'Debe ingresar el puesto del colaborador',
            'Puesto.string' => 'El puesto solo puede contener letras',

            'Correo_Electronico_Colaborador.email' => 'El correo electrónico del colaborador debe ser una dirección de correo electrónico válida',

            'Fotografia.mimes' => 'Solo se pueden ingresar fotografías en formato tipo: jpeg, png, jpg'
        ];

        if ($request->hasFile('Fotografia')) {

            $campos = ['Fotografia' => 'max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['Fotografia.required' => 'La foto required'];
        }

        $this->validate($request, $campos, $mensaje);

        $datosColaborador = request()->except(['_token', '_method']);

        if ($request->hasFile('Fotografia')) {
            $colaborador = Colaborador::findOrFail($id);
            Storage::delete('public/' . $colaborador->Fotografia);
            $datosColaborador['Fotografia'] = $request->file('Fotografia')->store('uploads', 'public');
        }

        Colaborador::where('id', '=', $id)->update($datosColaborador);

        $colaborador = Colaborador::findOrFail($id);


        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return  redirect('colaborador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        $delete = Colaborador::destroy($id);


        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $colaborador->Fotografia)) {
                    Colaborador::destroy($id);
                } else {
                    Colaborador::destroy($id);
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
}
