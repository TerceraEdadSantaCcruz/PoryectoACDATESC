@extends('adminlte.index')
@section('title', 'Registro de Salud')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/atencion_periodicas/' . $atencionPeriodica->aten_id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Ficha Medica</h2>
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
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Fecha">
                            <FONT SIZE=3>Fecha de Atención</FONT>
                        </label>
                        <input type="date" class="form-control" id="Fecha" name="Fecha"
                            value="{{ old('Fecha',$atencionPeriodica->Fecha) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Presion_Arterial">
                            <FONT SIZE=3>Presión Arterial (mmHg)</FONT>
                        </label>
                        <input type="text" class="form-control" name="Presion_Arterial" id="Presion_Arterial" required
                            value="{{ old('Presion_Arterial',$atencionPeriodica->Presion_Arterial) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Palpitaciones">
                            <FONT SIZE=3>Palpitaciones por Minuto</FONT>
                        </label>
                        <input type="text" class="form-control" id="Palpitaciones" name="Palpitaciones"
                            value="{{ old('Palpitaciones',$atencionPeriodica->Palpitaciones) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Diabetes">
                            <FONT SIZE=3>Diabetes mg/dL</FONT>
                        </label>
                        <input type="text" class="form-control" id="Diebetes" name="Diabetes"
                            value="{{ old('Diabetes',$atencionPeriodica->Diabetes) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Temperatura">
                            <FONT SIZE=3>Temperatura en Grados Celsius (°C)</FONT>
                        </label>
                        <input type="text" class="form-control" id="Temperatura" name="Temperatura"
                            value="{{ old('Temperatura',$atencionPeriodica->Temperatura) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Oxigno">
                            <FONT SIZE=3>Oxígeno en la Sangre</FONT>
                        </label>
                        <input type="text" class="form-control" id="Oxigeno" name="Oxigeno"
                            value="{{ old('Oxigeno',$atencionPeriodica->Oxigeno) }}">
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="Observaciones">
                            <FONT SIZE=3>Observaciones Generales</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Observaciones" id="Observaciones"
                        rows="3">{{ old('Observaciones',$atencionPeriodica->Observaciones) }}</textarea>
                    </div>
                    <div class="col-12" style="text-align:right;">
                        <button type="submit" class="btn btn-primary" title="Editar"><i class="far fa-save"></i>
                            Editar</button>
                        <a class="btn btn-secondary" href="{{ url('atencion_periodicas') }}" title="Regresar"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>
                </div>
            </form>
    </div>
    </div>
    </div>
@endsection
