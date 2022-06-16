<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['articulos'] = Categoria::join('inventarios', 'inventarios.categoria_id', '=', 'categorias.cat_id')
            ->join('articulos', 'articulos.inventario_id', '=', 'inventarios.inv_id')
            ->orderBy('id', 'DESC')
            ->paginate();

        return view('Articulo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarios = Categoria::join('inventarios', 'inventarios.categoria_id', '=', 'categorias.cat_id')
            ->orderBy('inv_id', 'DESC')
            ->get();
        return view('Articulo.create', compact('inventarios'));
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
            'nombre' => 'required|string|max:30',
            'fecha_registro' => 'required|date_format:Y-m-d',
            'cantidad' => 'required|numeric',
            'descripcion' => 'max:300'

        ];
        $mensaje = [
            'nombre.required' => 'Debe ingresar el nombre del articulo',
            'nombre.string' => 'El nombre solo puede contener letras',
            'fecha_registro.required' => 'La fecha de registro es requerida',
            'cantidad.required' => 'Debe ingresar la cantidad',
            'cantidad.numeric' => 'La cantidad debe ser un número',
            'descripcion.max' => 'La descripción permite un máximo de 300 caracteres'
            
        ];

        $this->validate($request, $campos, $mensaje);

        $datosarticulo = request()->except('_token');
        $inventario = $request->input('inventario_id');

        Articulo::insert($datosarticulo);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return redirect()->route('inventario.mostrarArticulo', [$inventario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('Articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
       
        return view('Articulo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:30',
            'fecha_registro' => 'required|date_format:Y-m-d',
            'cantidad' => 'required|numeric',
            'descripcion' => 'max:300'

        ];
        $mensaje = [
            'nombre.required' => 'Debe ingresar el nombre del articulo',
            'nombre.string' => 'El nombre solo puede contener letras',
            'fecha_registro.required' => 'La fecha de registro es requerida',
            'cantidad.required' => 'Debe ingresar la cantidad',
            'cantidad.numeric' => 'La cantidad debe ser un número',
            'descripcion.max' => 'La descripción permite un máximo de 300 caracteres'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosArticulo = request()->except('_token', '_method');
        $inventario = $request->input('inventario_id');
        Articulo::where('id', '=', $id)->update($datosArticulo);

        Alert::success('Registro Editado', 'El registro se ha editado correctamente');

        return redirect()->route('inventario.mostrarArticulo', [$inventario]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $datosArticulo = Articulo::findOrFail($id);
        $delete = Articulo::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $datosArticulo->Fotografia)) {
                    Articulo::destroy($id);
                } else {
                    Articulo::destroy($id);
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
