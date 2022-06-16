@extends('adminlte.index')
@section('title', 'Articulo')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/Articulo/' . $articulo->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Articulo</h2>
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
                    <div class="form-group col-md-6">
                        <label for="nombre">
                            <FONT SIZE=3>Nombre</FONT>
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required
                            value="{{ old('nombre',$articulo->nombre) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="codigo">
                            <FONT SIZE=3>Código </FONT>
                        </label>
                        <input type="number" class="form-control" id="codigo" name="codigo"
                            value="{{ old('codigo',$articulo->codigo) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fecha_registro">
                            <FONT SIZE=3>Fecha de Registro</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" required
                            value="{{ old('fecha_registro',$articulo->fecha_registro) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_caducidad">
                            <FONT SIZE=3>Fecha de Caducidad</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_caducidad" id="fecha_caducidad"
                            value="{{ old('fecha_caducidad',$articulo->fecha_caducidad) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="cantidad">
                            <FONT SIZE=3>Cantidad</FONT>
                        </label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required
                            value="{{ old('cantidad',$articulo->cantidad) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="descripcion">
                            <FONT SIZE=3>Descripción </FONT>
                        </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            value="{{ old('descripcion',$articulo->descripcion) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="inventario_id" value="{{ $articulo->inventario_id }}"
                            id="inventario_id" hidden>
                    </div>
                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Editar"><i class="far fa-save"></i>
                        Editar</button>
                    <a class="btn btn-secondary" href="{{ url('/inventario/' . $articulo->inventario_id . '/mostrarArticulo') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
