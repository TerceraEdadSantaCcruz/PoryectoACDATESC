@extends('adminlte.index')
@section('title', 'Inventario')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/inventario') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Inventario</h2>
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
                        <label for="nombre_inv">
                            <FONT SIZE=3>Nombre de Inventario</FONT>
                        </label>
                        <input type="text" class="form-control" name="nombre_inv"
                            value="{{ isset($inventario->nombre_inv) ? $inventario->nombre_inv : old('nombre_inv') }}"
                            id="nombre_inv" placeholder="Ingrese el nombre..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="categoria_id">
                            <FONT SIZE=3>Categoría</FONT>
                        </label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="0">Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria['cat_id'] }}">{{ $categoria['nombre_cat'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fecha_inv">
                            <FONT SIZE=3>Fecha de Inventario</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_inv" id="fecha_inv"
                            value="{{ isset($inventario->fecha_inv) ? $inventario->fecha_inv : old('fecha_inv', date('Y-m-d')) }}"
                            required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">
                            <FONT SIZE=3>Descripción</FONT>
                        </label>
                        <input type="text" class="form-control" name="descripcion"
                            value="{{ isset($inventario->descripcion) ? $inventario->descripcion : old('descripcion') }}"
                            id="descripcion" placeholder="Ingrese la descripción...">
                    </div>
                </div>
                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a class="btn btn-secondary" href="{{ url('inventario') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>

            </form>
        </section>
        <br />
    </div>
@endsection
