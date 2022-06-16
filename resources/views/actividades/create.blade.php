@extends('adminlte.index')
@section('title', 'Actividades')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action={{ url('/actividades') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Actividad</h2>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre_act">
                                <FONT SIZE=3>Actividad</FONT>
                            </label>
                            <input type="text" class="form-control"
                                value="{{ isset($actividades->nombre_act) ? $actividades->nombre_act : old('nombre_act') }}"
                                id="nombre_act" name="nombre_act" placeholder="Ingrese el nombre de la actividad..."
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_act">
                                <FONT SIZE=3>Fecha</FONT>
                            </label>
                            <input type="date" class="form-control" name="fecha_act" id="fecha_act"
                                value="{{ isset($actividades->fecha_act) ? $actividades->fecha_act : old('fecha_act', date('Y-m-d')) }}"
                                required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_act">
                                <FONT SIZE=3>Hora</FONT>
                            </label>
                            <input type="time" class="form-control"
                                value="{{ isset($actividades->hora_act) ? $actividades->hora_act : old('hora_act') }}"
                                id="hora_act" name="hora_act" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ubicacion">
                                <FONT SIZE=3>Ubicación</FONT>
                            </label>
                                <textarea type="text" class="form-control" name="ubicacion" id="ubicacion"
                                rows="2"
                                placeholder="Ingrese la ubicación...">{{ isset($actividades->ubicacion)? $actividades->ubicacion: old('ubicacion') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">
                                <FONT SIZE=3>Descripción</FONT>
                            </label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion"
                            rows="2"
                            placeholder="Ingrese la descripción...">{{ isset($actividades->descripcion)? $actividades->descripcion: old('descripcion') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="colaborador_id">
                                <FONT SIZE=3>Encargado de la Actividad</FONT>
                            </label>
                            <select name="colaborador_id" id="colaborador_id" class="form-control">
                                <option value="0">Seleccione un encargado</option>
                                @foreach ($colaboradores as $colaborador)
                                    <option value="{{ $colaborador['id'] }}">{{ $colaborador['Nombre'] }} /
                                        {{ $colaborador['Identificacion'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12" style="text-align:right;">

                        <button type="submit" class="btn btn-primary" title="Guardar"> <i class="far fa-save"></i>
                            Guardar</button>
                        <a class="btn btn-secondary" href="{{ url('actividades') }}" title="Regresar"> <i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>

            </form>
        </section>
    </div>
@endsection
