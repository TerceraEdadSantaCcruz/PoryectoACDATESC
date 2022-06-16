@extends('adminlte.index')
@section('title', 'Articulo')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Artículo</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-12" style="text-align:right;">
                    <a href="{{ url('/inventario/' . $articulo->inventario_id . '/mostrarArticulo') }}"
                        class="btn btn-info" title="Mostrar Inventario"><i class="fa fa-book"></i> Ver inventario</a>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nombre">
                        <FONT SIZE=3>Nombre</FONT>
                    </label>
                    <input type="text" class="form-control" name="nombre"
                        value="{{ isset($articulo->nombre) ? $articulo->nombre : old('nombre') }}" id="nombre" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="fecha_registro">
                        <FONT SIZE=3>Fecha de registro</FONT>
                    </label>
                    <input type="date" class="form-control" name="fecha_registro"
                        value="{{ isset($articulo->fecha_registro) ? $articulo->fecha_registro : old('fecha_registro') }}"
                        id="fecha_registro" readonly>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cantidad">
                        <FONT SIZE=3>Cantidad</FONT>
                    </label>
                    <input type="text" class="form-control" name="cantidad"
                        value="{{ isset($articulo->cantidad) ? $articulo->cantidad : old('cantidad') }}" id="cantidad"
                        readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="fecha_caducidad">
                        <FONT SIZE=3>Fecha de caducidad</FONT>
                    </label>
                    <input type="date" class="form-control" name="fecha_caducidad"
                        value="{{ isset($articulo->fecha_caducidad) ? $articulo->fecha_caducidad : old('fecha_caducidad') }}"
                        id="fecha_caducidad" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="descripcion">
                        <FONT SIZE=3>Descripción</FONT>
                    </label>
                    <input type="text" class="form-control" name="descripcion"
                        value="{{ isset($articulo->descripcion) ? $articulo->descripcion : old('descripcion',"Sin descripción") }}"
                        id="descripcion" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="codigo">
                        <FONT SIZE=3>Código</FONT>
                    </label>
                    <input type="text" class="form-control" name="codigo"
                        value="{{ isset($articulo->codigo) ? $articulo->codigo : old('codigo',"Sin código") }}" id="codigo" readonly>
                </div>

            </div>
            <br>
            <br>
            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" title="Regresar" href="{{ url('Articulo/') }}"> <i
                        class="fas fa-arrow-circle-left"></i>
                    Regresar</a>
            </div>
    </div>
    </section>
    </div>
    </div>
    <br />
@endsection
