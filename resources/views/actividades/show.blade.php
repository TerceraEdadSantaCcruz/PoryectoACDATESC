@extends('adminlte.index')
@section('title', 'Actividades')
@section('content')
    <div class="container">
        <br />

        <section class="formulario">
            <div class="cabeza">
                <h2>Detalle de actividad</h2>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nombre_act">
                        <FONT SIZE=3>Actividad</FONT>
                    </label>
                    <input type="text" class="form-control" name="nombre_act"
                        value="{{ isset($actividad->nombre_act) ? $actividad->nombre_act : old('nombre_act') }}"
                        id="nombre_act" readonly>

                </div>
                <div class="form-group col-md-6">
                    <label for="fecha_act">
                        <FONT SIZE=3>Fecha</FONT>
                    </label>
                    <input type="date" class="form-control" name="fecha_act"
                        value="{{ isset($actividad->fecha_act) ? $actividad->fecha_act : old('fecha_act') }}"
                        id="fecha_act" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="hora_act">
                        <FONT SIZE=3>Hora</FONT>
                    </label>
                    <input type="time" class="form-control" name="hora_act"
                        value="{{ isset($actividad->hora_act) ? $actividad->hora_act : old('hora_act') }}" id="hora_act"
                        readonly>
                </div>

                <div class="col-md-6">
                    <label for="ubicacion">
                        <FONT SIZE=3>Ubicación</FONT>
                    </label>
                    <textarea type="text" id="ubicacion" class="form-control" name="ubicacion" rows="2"
                    readonly>@if($actividad->ubicacion == null){{"Sin ubicación"}}
                    @else{{ $actividad->ubicacion }}
                    @endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="from-group col-md-6">
                    <label for="descripcion">
                        <FONT SIZE=3>Descripción</FONT>
                    </label>
                    <textarea type="text" id="descripcion" class="form-control" name="descripcion" rows="2"
                        readonly>@if($actividad->descripcion == null){{"Sin descripción"}}
                        @else{{ $actividad->descripcion }}
                        @endif</textarea>
                </div>

                <div class="col-md-6">
                    <label>
                        <FONT SIZE=3>Encargado </FONT>
                    </label>
                    <input type="text" class="form-control" name="Nombre"
                        value="{{ isset($actividad->Nombre) ? $actividad->Nombre : old('Nombre') }}" id="Nombre" readonly>
                </div>
            </div>

            <br>
            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" href="{{ url('actividades') }}" title="Regresar"> <i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        </section>
    </div>

@endsection
