<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['actividades'] = Actividades::join('colaboradors', 'actividades.colaborador_id', '=', 'colaboradors.id')
            ->orderBy('act_id', 'DESC')
            ->paginate();

        return view('actividades.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colaboradores = Colaborador::all();
        return view('actividades.create', compact('colaboradores'));
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
            'nombre_act' => 'required|max:50',
            'fecha_act' => 'required|date_format:Y-m-d',
            'colaborador_id' => 'required|not_in:0'
        ];
        $mensaje = [
            'nombre_act.required' => 'Debe ingresar el nombre de la actividad',
            'fecha_act.required' => 'Debe indicar la fecha de la actividad',
            'colaborador_id.required' => 'Debe seleccionar un encargado',
            'colaborador_id.not_in' => 'Debe seleccionar un encargado'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosActividad = request()->except('_token');

        Actividades::insert($datosActividad);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect('actividades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actvidades  $actvidades
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividades::where('actividades.act_id','=',$id)
            ->join('colaboradors', 'actividades.colaborador_id', '=', 'colaboradors.id')
            ->first();
        return view('actividades.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actvidades  $actvidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividades::findOrFail($id);
        $colaboradores = Colaborador::all();
        return view('actividades.edit', compact('actividad', 'colaboradores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actvidades  $actvidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre_act' => 'required|max:50',
            'fecha_act' => 'required|date_format:Y-m-d',
            'colaborador_id' => 'required'
        ];
        $mensaje = [
            'nombre_act.required' => 'Debe ingresar el nombre de la actividad',
            'fecha_act.required' => 'Debe indicar la fecha de la actividad',
            'colaborador_id.required' => 'Debe seleccionar un encargado'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosActividad = request()->except('_token', '_method');
        Actividades::where('act_id', '=', $id)->update($datosActividad);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actvidades  $actvidades
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $datosActividad = Actividades::findOrFail($id);
        $delete = Actividades::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $datosActividad->Fotografia)) {
                    Actividades::destroy($id);
                } else {
                    Actividades::destroy($id);
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

    public function calendario()
    {
        return view('actividades.calendario');
    }
}
