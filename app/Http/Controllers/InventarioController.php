<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Categoria;
use App\Models\Articulo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['inventarios'] = Inventario::join('categorias', 'categorias.cat_id', '=', 'inventarios.categoria_id')
            ->orderBy('inv_id', 'DESC')
            ->paginate();
        return view('inventario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('inventario.create', compact('categorias'));
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
            'nombre_inv' => 'required|string|max:30',
            'categoria_id' => 'required|not_in:0',
            'fecha_inv' => 'required|date_format:Y-m-d',

        ];

        $mensaje = [
            'nombre_inv.required' => 'Debe ingresar el nombre del inventario',
            'nombre_inv.string' => 'Debe ingresar el nombre del inventario',
            'nombre_inv.max' => 'El nombre de inventario no debe tener mas de 30 caracteres',

            'categoria_id.not_in' => 'Debe seleccionar una categoría',

            'fecha_inv.required' => 'Debe ingresar la fecha de inventario',

        ];

        $this->validate($request, $campos, $mensaje);


        $datosInventario = request()->except('_token');

        Inventario::insert($datosInventario);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect('inventario');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        $categorias = Categoria::all();
        return view('inventario.edit', compact('inventario', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre_inv' => 'required|string|max:30',
            'categoria_id' => 'required',
            'fecha_inv' => 'required|date_format:Y-m-d',

        ];

        $mensaje = [
            'nombre_inv.required' => 'Debe ingresar el nombre del inventario',
            'nombre_inv.string' => 'Debe ingresar el nombre del inventario',
            'nombre_inv.max' => 'El nombre de inventario no debe tener mas de 30 caracteres',

            'categoria_id.required' => 'Debe seleccionar una categoría',

            'fecha_inv.required' => 'Debe ingresar la fecha de inventario',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosInventario = request()->except(['_token', '_method']);

        Inventario::where('inv_id', '=', $id)->update($datosInventario);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect()->route('inventario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $datosInventario = Inventario::findOrFail($id);
        $delete = Inventario::destroy($id);

        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $datosInventario->Fotografia)) {
                    Inventario::destroy($id);
                } else {
                    Inventario::destroy($id);
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

    public function mostrarArticulo($id)
    {
        $buscar = $id;
        $tipo = 'inventario_id';

        $inventario = Inventario::where('inv_id', '=', $id)->first();
        $articulos = Categoria::join('inventarios', 'inventarios.categoria_id', '=', 'categorias.cat_id')
            ->join('articulos', 'articulos.inventario_id', '=', 'inventarios.inv_id')
            ->orderBy('id', 'DESC')
            ->buscarpor($tipo, $buscar)
            ->paginate(15);
        return view('inventario.mostrarArticulo', compact('articulos', 'inventario'));
    }

    public function agregarArticulo($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('inventario.agregarArticulo', $inventario);
    }
}
