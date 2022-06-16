@extends('adminlte.index')
@section('title', 'Registro de Salud')

@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action={{ url('/atencion_periodicas') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Ficha Médica Periódica </h2>
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
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="beneficiario_id">
                            <FONT SIZE=3>Beneficiario</FONT>
                        </label>
                        <select name="beneficiario_id" id="beneficiario_id" class="form-control">
                            <option value="0">Seleccione un beneficiario</option>
                            @foreach ($beneficiarios as $beneficiario)
                                <option value="{{ $beneficiario->id }}">{{ $beneficiario->Apellido_1 }}
                                    {{ $beneficiario->Nombre }} / {{ $beneficiario->Identificacion_Beneficiario }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Fecha">
                            <FONT SIZE=3>Fecha de Atención</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha"
                            value="{{ isset($atencion_periodicas->Fecha) ? $atencion_periodicas->Fecha : old('Fecha', date('Y-m-d')) }}"
                            id="Fecha" required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Presion_Arterial">
                            <FONT SIZE=3>Presión Arterial (mmHg)</FONT>
                        </label>
                        <input type="number" step="any" class="form-control" name="Presion_Arterial"
                            value="{{ isset($atencion_periodicas->Presion_Arterial)? $atencion_periodicas->Presion_Arterial: old('Presion_Arterial') }}"
                            id="Presion_Arterial" placeholder="Ingrese la presión arterial..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Palpitaciones">
                            <FONT SIZE=3>Palpitaciones por Minuto</FONT>
                        </label>
                        <input type="number"  class="form-control" name="Palpitaciones"
                            value="{{ isset($atencion_periodicas->Palpitaciones) ? $atencion_periodicas->Palpitaciones : old('Palpitaciones') }}"
                            id="Palpitaciones" placeholder="Ingrese las palpitaciones por minuto..." required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Diabetes">
                            <FONT SIZE=3>Diabetes mg/dL</FONT>
                        </label>
                        <input type="number" step="any" class="form-control" name="Diabetes"
                            value="{{ isset($atencion_periodicas->Diabetes) ? $atencion_periodicas->Diabetes : old('Diabetes') }}"
                            id="Diabetes" placeholder="Ingrese diabetes..." required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Temperatura">
                            <FONT SIZE=3>Temperatura en Grados Celsius (°C)</FONT>
                        </label>
                        <input type="number" step="any" class="form-control" name="Temperatura"
                            value="{{ isset($atencion_periodicas->Temperatura) ? $atencion_periodicas->Temperatura : old('Temperatura') }}"
                            id="Temperatura" placeholder="Ingrese la temperatura..." required>
                    </div>

                    <div class="form-group col-xs-12 col-sm-4 col-md-4">
                        <label for="Oxigeno">
                            <FONT SIZE=3>Oxígeno en la Sangre</FONT>
                        </label>
                        <input type="number" step="any" class="form-control" name="Oxigeno"
                            value="{{ isset($atencion_periodicas->Oxigeno) ? $atencion_periodicas->Oxigeno : old('Oxigeno') }}"
                            id="Oxigeno" placeholder="Ingrese el oxígeno..." required>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-12">
                        <label for="Observaciones">
                            <FONT SIZE=3>Observaciones Generales</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Observaciones" id="Observaciones" rows="3"
                        placeholder="Ingrese las observaciones generales">{{ isset($atencion_periodicas->Observaciones)? $atencion_periodicas->Observaciones: old('Observaciones') }}</textarea>
                    </div>
                </div>

                <div class="col-md-12" style="text-align:right">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a href="{{ url('atencion_periodicas') }}" class="btn btn-secondary" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>

            </form>
        </section>
        <br />
    </div>
@endsection
