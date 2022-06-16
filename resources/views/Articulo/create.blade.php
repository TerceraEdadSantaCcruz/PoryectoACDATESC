@extends('adminlte.index')
@section('title', 'Articulo')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action={{ url('/Articulo') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Artículo</h2>
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
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inventario_id">
                            <FONT SIZE=3>Inventario</FONT>
                        </label>
                        <select name="inventario_id" id="inventario_id" class="form-control">
                            @foreach ($inventarios as $inventario)
                                <option value="{{ $inventario['inv_id'] }}">{{ $inventario['nombre_inv'] }} /
                                    {{ $inventario['fecha_inv'] }} / {{ $inventario['nombre_cat'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nombre">
                            <FONT SIZE=3>Nombre</FONT>
                        </label>
                        <input type="text" class="form-control"
                            value="{{ isset($articulo->nombre) ? $articulo->nombre : old('nombre') }}" id="nombre"
                            name="nombre" placeholder="Ingrese el nombre..." required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="codigo">
                            <FONT SIZE=3>Código </FONT>
                        </label>
                        <input type="text" class="form-control"
                            value="{{ isset($articulo->codigo) ? $articulo->codigo : old('codigo') }}" id="codigo"
                            name="codigo" placeholder="Ingrese el código...">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_registro">
                            <FONT SIZE=3>Fecha de Registro</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_registro"
                            value="{{ isset($articulo->fecha_registro) ? $articulo->fecha_registro : old('fecha_registro', date('Y-m-d')) }}"
                            id="fecha_registro" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fecha_caducidad">
                            <FONT SIZE=3>Fecha de Caducidad</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_caducidad"
                            value="{{ isset($articulo->fecha_caducidad) ? $articulo->fecha_caducidad : old('fecha_caducidad') }}"
                            id="fecha_caducidad">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="cantidad">
                            <FONT SIZE=3>Cantidad</FONT>
                        </label>
                        <input type="number" class="form-control"
                            value="{{ isset($articulo->cantidad) ? $articulo->cantidad : old('cantidad') }}" id="cantidad"
                            name="cantidad" placeholder="Ingrese la cantidad..." required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="descripcion">
                        <FONT SIZE=3>Descripción</FONT>
                    </label>
                    <input type="text" class="form-control"
                        value="{{ isset($articulo->descripcion) ? $articulo->descripcion : old('descripcion') }}"
                        id="descripcion" name="descripcion" placeholder="Ingrese la descripción...">
                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a class="btn btn-secondary" href="{{ url('Articulo') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i>
                        Regresar</a>
                </div>

            </form>

        </section>
        <br />
    </div>
@endsection
