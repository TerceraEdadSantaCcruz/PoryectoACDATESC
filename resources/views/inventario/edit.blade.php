@extends('adminlte.index')
@section('title', 'Inventario')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/inventario/' . $inventario->inv_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Inventario</h2>
                </div>
                <br>
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @method('PUT')
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_inv">
                                <FONT SIZE=3>Nombre de Inventario</FONT>
                            </label>
                            <input type="text" class="form-control" id="nombre_inv" name="nombre_inv"
                                value="{{ $inventario->nombre_inv }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoria_id">
                                <FONT SIZE=3>Categoría</FONT>
                            </label>
                            <select name="categoria_id" id="categoria_id" class="form-control">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria['cat_id'] }}"
                                        {{                                         $categoria->cat_id == $inventario->categoria_id ? 'selected' : '' }}>
                                        {{ $categoria['nombre_cat'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_inv">
                                <FONT SIZE=3>Fecha de Inventario</FONT>
                            </label>
                            <input type="date" class="form-control" name="fecha_inv" id="fecha_inv"
                                value="{{ $inventario->fecha_inv }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">
                                <FONT SIZE=3>Descripción</FONT>
                            </label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                value="{{ $inventario->descripcion }}">
                        </div>
                    </div>

                    <div class="col-12" style="text-align:right;">
                        <button type="submit" class="btn btn-primary" title="Editar"><i class="far fa-save"></i>
                            Editar</button>
                        <a class="btn btn-secondary" href="{{ url('inventario') }}" title="Regresar"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>
                </div>
            </form>
    </div>
    </div>
    </div>
@endsection
