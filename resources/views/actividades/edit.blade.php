@extends('adminlte.index')
@section('title', 'Actividades')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/actividades/' . $actividad->act_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Actividad</h2>
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
                        <label for="nombre_act">
                            <FONT SIZE=3>Actividad</FONT>
                        </label>
                        <input type="text" class="form-control" id="nombre_act" name="nombre_act"
                            value="{{ old('nombre_act', $actividad->nombre_act) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha_act">
                            <FONT SIZE=3>Fecha</FONT>
                        </label>
                        <input type="date" class="form-control" name="fecha_act" id="fecha_act" required
                            value="{{ old('fecha_act', $actividad->fecha_act) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="hora_act">
                            <FONT SIZE=3>Hora</FONT>
                        </label>
                        <input type="time" class="form-control" id="hora_act" name="hora_act"
                            value="{{ old('hora_act', $actividad->hora_act) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="ubicacion">
                            <FONT SIZE=3>Ubicación</FONT>
                        </label>
                            <textarea type="text" id="ubicacion" class="form-control" name="ubicacion"
                             rows="2">{{ old('ubicacion', $actividad->ubicacion) }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="from-group col-md-6">
                        <div class="form-group">
                            <label for="descripcion">
                                <FONT SIZE=3>Descripción</FONT>
                            </label>
                            <textarea type="text" id="descripcion" class="form-control" name="descripcion" 
                            rows="2">{{ old('descripcion', $actividad->descripcion) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="colaborador_id">
                            <FONT SIZE=3>Encargado de la Actividad</FONT>
                        </label>
                        <select name="colaborador_id" id="colaborador_id" class="form-control">
                            @foreach ($colaboradores as $colaborador)
                                <option value="{{ $colaborador['id'] }}"
                                    {{ $colaborador->id == $actividad->colaborador_id ? 'selected' : '' }}>
                                    {{ $colaborador['Nombre'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Editar"> <i class="far fa-save"></i>
                        Editar</button>
                    <a class="btn btn-secondary" href="{{ url('actividades') }}" title="Regresar"> <i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
