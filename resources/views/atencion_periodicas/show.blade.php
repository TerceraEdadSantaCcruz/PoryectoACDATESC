@extends('adminlte.index')
@section('title', 'Registro de Salud')
@section('content')

    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Atención Fisioterapéutica Periódica</h2>
            </div>
            <br>

            <div class="col-md-12" style="text-align: right">
                <a class="btn btn-danger" title="Descargar PDF"
                    href="{{ url('periodico-pdf/' . $atencionPeriodica->aten_id) }}"> <i
                        class="fas fa-file-pdf"></i>
                    Reporte</a>
            </div>

            <div class="row">
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="beneficiario_id">
                        <FONT SIZE=3>Beneficiario</FONT>
                    </label>
                    <input type="text" class="form-control" name="Nombre"
                        value="{{ $atencionPeriodica->Nombre }}" id="Nombre"
                        readonly>
                </div>

                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Fecha">
                        <FONT SIZE=3>Fecha de Atención</FONT>
                    </label>
                    <input type="date" class="form-control" id="Fecha" name="Fecha"
                        value="{{ $atencionPeriodica->Fecha }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Presion_Arterial">
                        <FONT SIZE=3>Presión Arterial (mmHg)</FONT>
                    </label>
                    <input type="text" class="form-control" name="Presion_Arterial" id="Presion_Arterial" required
                        value="{{ $atencionPeriodica->Presion_Arterial }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Palpitaciones">
                        <FONT SIZE=3>Palpitaciones por Minuto</FONT>
                    </label>
                    <input type="text" class="form-control" id="Palpitaciones" name="Palpitaciones"
                        value="{{ $atencionPeriodica->Palpitaciones }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Diabetes">
                        <FONT SIZE=3>Diabetes mg/dL</FONT>
                    </label>
                    <input type="text" class="form-control" id="Diebetes" name="Diabetes"
                        value="{{ $atencionPeriodica->Diabetes }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Temperatura">
                        <FONT SIZE=3>Temperatura en Grados Celsius (°C)</FONT>
                    </label>
                    <input type="text" class="form-control" id="Temperatura" name="Temperatura"
                        value="{{ $atencionPeriodica->Temperatura }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-4">
                    <label for="Oxigno">
                        <FONT SIZE=3>Oxígeno en la Sangre</FONT>
                    </label>
                    <input type="text" class="form-control" id="Oxigeno" name="Oxigeno"
                        value="{{ $atencionPeriodica->Oxigeno }}" readonly>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <label for="Observaciones">
                        <FONT SIZE=3>Observaciones Generales</FONT>
                    </label>
                    <textarea type="text" class="form-control" name="Observaciones" id="Observaciones"
                    rows="3" readonly>@if($atencionPeriodica->Observaciones == null){{"Sin observaciones"}}
                                      @else{{ $atencionPeriodica->Observaciones }}
                                      @endif</textarea>
                </div>
            </div>
            <br>
            <div class="col-md-12" style="text-align:right">
                <a class="btn btn-secondary" href="{{ url('atencion_periodicas/') }}" title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
    </div>
    </section>
    </div>
    </div>

@endsection
