<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['beneficiario'] = Beneficiario::join('encargados', 'encargados.beneficiario_id', '=', 'beneficiarios.id')
            ->orderBy('encargados.id', 'DESC')
            ->paginate();
        return view('encargado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiarios = Beneficiario::orderBy('Apellido_1', 'ASC')->get();

        return view('encargado.create', compact('beneficiarios'));
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

            'beneficiario_id' => 'not_in:0|unique:encargados',
            'Identificacion_Encargado' => 'required|numeric|unique:encargados',
            'Nombre_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_1_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_2_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Telefono_Encargado' => 'required|numeric|digits:8',
            'Correo_Electronico_Encargado' => 'nullable|string|email|unique:encargados|max:50',
            'Direccion_Encargado' => 'required|max:255'
        ];

        $mensaje = [
            'beneficiario_id.unique' => 'Este beneficiario ya tiene un encargado registrado',
            'beneficiario_id.not_in' => 'Debe seleccionar un beneficiario',

            'Identificacion_Encargado.required' => 'Debe ingresar la identificación del encargado',
            'Identificacion_Encargado.numeric' => 'La identificación solo puede contener números',
            'Identificacion_Encargado.unique' => 'Esta identificación ya se encuentra registrada',

            'Nombre_Encargado.required' => 'Debe ingresar el nombre del encargado',
            'Nombre_Encargado.regex' => 'El nombre solo puede contener letras',
            'Nombre_Encargado.max' => 'El nombre debe tener un máximo de 30 caracteres',

            'Apellido_1_Encargado.required' => 'Debe ingresar el primer apellido del encargado',
            'Apellido_1_Encargado.regex' => 'El primer apellido solo puede contener letras',
            'Apellido_1_Encargado.max' => 'El primer apellido debe tener un máximo de 30 caracteres',

            'Apellido_2_Encargado.required' => 'Debe ingresar el segundo apellido del encargado',
            'Apellido_2_Encargado.regex' => 'El segundo apellido solo puede contener letras',
            'Apellido_2_Encargado.max' => 'El segundo apellido debe tener un máximo de 30 caracteres',

            'Telefono_Encargado.required' => 'Debe ingresar el número de teléfono',
            'Telefono_Encargado.numeric' => 'No puede ingresar letras en el número de teléfono',
            'Telefono_Encargado.digits' => 'Debe ingresar 8 dígitos en el número de telefono',

            'Correo_Electronico_Encargado.email' => 'El correo electrónico del encargado debe ser una dirección de correo electrónico válida',
            'Correo_Electronico_Encargado.unique' => 'El Correo electronico ya ha sido registrado',

            'Direccion_Encargado.required' => 'Debe ingresar la dirección del encargado',
            'Direccion_Encargado.max' => 'La dirección solo puede tener un máximo de 255 caracteres'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except('_token');
        $beneficiario = $request->input('beneficiario_id');

        Encargado::insert($datosBeneficiario);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect()->route('beneficiario.mostrarEncargado', [$beneficiario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encargado = Encargado::findOrFail($id);
        return view('encargado.show', compact('encargado'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encargado = Encargado::findOrFail($id);
        $beneficiarios = Beneficiario::all();
        return view('encargado.edit', compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [

            'Identificacion_Encargado' => 'required|numeric',
            'Nombre_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_1_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Apellido_2_Encargado' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'Telefono_Encargado' => 'required|numeric|digits:8',
            'Correo_Electronico_Encargado' => 'nullable|string|email|max:50',
            'Direccion_Encargado' => 'required|max:255'
        ];

        $mensaje = [

            'Identificacion_Encargado.required' => 'Debe ingresar la identificación del encargado',
            'Identificacion_Encargado.numeric' => 'La identificación solo puede contener números',


            'Nombre_Encargado.required' => 'Debe ingresar el nombre del encargado',
            'Nombre_Encargado.regex' => 'El nombre solo puede contener letras',
            'Nombre_Encargado.max' => 'El nombre debe tener un máximo de 30 caracteres',

            'Apellido_1_Encargado.required' => 'Debe ingresar el primer apellido del encargado',
            'Apellido_1_Encargado.regex' => 'El primer apellido solo puede contener letras',
            'Apellido_1_Encargado.max' => 'El primer apellido debe tener un máximo de 30 caracteres',

            'Apellido_2_Encargado.required' => 'Debe ingresar el segundo apellido del encargado',
            'Apellido_2_Encargado.regex' => 'El segundo apellido solo puede contener letras',
            'Apellido_2_Encargado.max' => 'El segundo apellido debe tener un máximo de 30 caracteres',

            'Telefono_Encargado.required' => 'Debe ingresar el número de teléfono',
            'Telefono_Encargado.numeric' => 'No puede ingresar letras en el número de teléfono',
            'Telefono_Encargado.digits' => 'Debe ingresar 8 dígitos en el número de telefono',

            'Correo_Electronico_Encargado.email' => 'El correo electrónico del encargado debe ser una dirección de correo electrónico válida',

            'Direccion_Encargado.required' => 'Debe ingresar la dirección del encargado',
            'Direccion_Encargado.max' => 'La dirección solo puede tener un máximo de 255 caracteres'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosBeneficiario = request()->except('_token', '_method');
        Encargado::where('id', '=', $id)->update($datosBeneficiario);
        $encargado = Encargado::findOrFail($id);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect('encargado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $encargado = Encargado::findOrFail($id);
        $delete = Encargado::destroy($id);

        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $encargado->Fotografia)) {
                    Encargado::destroy($id);
                } else {
                    Encargado::destroy($id);
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
