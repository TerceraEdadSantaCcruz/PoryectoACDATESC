<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['categorias']=Categoria::paginate();
        return view( 'categoria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre_cat'=>'required|regex:/^[\pL\s]+$/u|max:30',

        ];

        $mensaje=[
            'required' => 'El nombre de categoría es requerido',
            'regex' => 'Solo se permiten letras en el nombre de categoría',
            'max' => 'El nombre permite un máximo de 30 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);


        $datosCategoria = request()->except('_token');

        Categoria::insert($datosCategoria);

        Alert::success('Registro Guardado', 'El registro se ha guardado correctamente');

        return  redirect('categoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::findOrFail($id);
        return view ('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        $campos=[
            'nombre_cat'=>'required|regex:/^[\pL\s]+$/u|max:30',

        ];

        $mensaje=[
            'required' => 'El nombre de categoría es requerido',
            'regex' => 'Solo puede ingresar letras en el nombre de categoría',
            'max' => 'El nombre de categoría permite un maximo de 30 caracteres',
        ];

        $this->validate($request, $campos, $mensaje);


            $datosCategoria = request()->except(['_token', '_method']);


            Categoria::where('cat_id','=', $id)->update($datosCategoria);

            $categoria=Categoria::findOrFail($id);

            Alert::success('Registro Editado', 'El registro se ha editado correctamente');

            return  redirect('categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $categoria = Categoria::findOrFail($id);
        $delete = Categoria::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            try {
                if (Storage::delete('public/' . $categoria->Fotografia)) {
                    Categoria::destroy($id);
                } else {
                    Categoria::destroy($id);
                }
                $success = true;
                $message = "El registro se ha eliminado correctamente";
            } catch (\Exception$e) {
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

