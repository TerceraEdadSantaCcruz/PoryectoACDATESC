@extends('adminlte.index')
@section('title', 'Beneficiario')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Beneficiario</h2>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-12">

                </div>
                <div class="col-md-6 col-sm-12" style="text-align:right;">
                    <a class="btn btn-primary" title="Encargado"
                        href="{{ url('/beneficiario/' . $beneficiario->id . '/mostrarEncargado') }}"> <i
                            class="fas fa-user"></i>
                        Encargado</a>
                    <a class="btn btn-success" title="Historial de pago"
                        href="{{ url('/beneficiario/' . $beneficiario->id . '/mostrarHistorial') }}"> <i
                            class="fas fa-dollar"></i>
                        Historial</a>
                    <a class="btn btn-danger" title="Descargar PDF"
                        href="{{ url('beneficiarios-pdf/' . $beneficiario->id) }}"> <i class="fas fa-file-pdf"></i>
                        Reporte</a>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  
                    @if (isset($beneficiario->Fotografia))
                    <label>
                        <FONT SIZE=3>Fotografía</FONT>
                    </label>
                        <img src="{{ asset('storage') . '/' . $beneficiario->Fotografia }}"
                            style="max-width:100%; width:auto; height:auto;">
                    @else
                    <label>
                        <FONT SIZE=3>Fotografía no disponible</FONT>
                    </label>
                    <img src="{{ asset('img/noPhotoProfile.png') }}"
                    style="width: 100%; max-width: 260px;">
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <label for="Identificacion_Beneficiario">
                            <FONT SIZE=3>Identificación</FONT>
                        </label>
                        <input type="text" class="form-control" name="Identificacion_Beneficiario"
                            value="{{ isset($beneficiario->Identificacion_Beneficiario)? $beneficiario->Identificacion_Beneficiario: old('Identificacion_Beneficiario') }}"
                            id="Identificacion_Beneficiario" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Nombre">
                            <FONT SIZE=3>Nombre</FONT>
                        </label>
                        <input type="text" class="form-control" name="Nombre"
                            value="{{ isset($beneficiario->Nombre) ? $beneficiario->Nombre : old('Nombre') }}" id="Nombre"
                            readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Apellido_1">
                            <FONT SIZE=3>Primer Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_1"
                            value="{{ isset($beneficiario->Apellido_1) ? $beneficiario->Apellido_1 : old('Apellido_1') }}"
                            id="Apellido_1" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Apellido_2">
                            <FONT SIZE=3>Segundo Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_2"
                            value="{{ isset($beneficiario->Apellido_2) ? $beneficiario->Apellido_2 : old('Apellido_2') }}"
                            id="Apellido_2" readonly>
                    </div>
                </div>
                <div class=" row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="Telefono">
                            <FONT SIZE=3>Número de Teléfono</FONT>
                        </label>
                        <input type="text" class="form-control" name="Telefono"
                            value="{{ isset($beneficiario->Telefono) ? $beneficiario->Telefono : old('Telefono') }}"
                            id="Telefono" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Edad">
                            <FONT SIZE=3>Edad</FONT>
                        </label>
                        <input type="text" class="form-control" name="Edad"
                            value="{{ isset($beneficiario->Edad) ? $beneficiario->Edad : old('Edad') }}" id="Edad"
                            readonly>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="Fecha_nacimiento">
                            <FONT SIZE=3>Fecha de Nacimiento</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_nacimiento"
                            value="{{ isset($beneficiario->Fecha_nacimiento) ? $beneficiario->Fecha_nacimiento : old('Fecha_nacimiento') }}"
                            id="Fecha_nacimiento" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Direccion">
                            <FONT SIZE=3>Dirección</FONT>
                        </label>
                        <input type="text" class="form-control" name="Direccion"
                            value="{{ isset($beneficiario->Direccion) ? $beneficiario->Direccion : old('Direccion') }}"
                            id="Direccion" readonly>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="Fecha_Ingreso" <FONT SIZE=3>Fecha de Ingreso</FONT></label>
                        <input type="date" class="form-control" name="Fecha_Ingreso"
                            value="{{ isset($beneficiario->Fecha_Ingreso) ? $beneficiario->Fecha_Ingreso : old('Fecha_Ingreso') }}"
                            id="Fecha_Ingreso" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Fecha_Salida" <FONT SIZE=3>Fecha de Salida</FONT></label>
                        <input type="date" class="form-control" name="Fecha_Salida"
                            value="{{ isset($beneficiario->Fecha_Salida) ? $beneficiario->Fecha_Salida : old('Fecha_Salida') }}"
                            id="Fecha_Salida" readonly>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-12" style="text-align:right;">
                    <a class="btn btn-secondary" title="Regresar" href="{{ url('beneficiario/') }}"> <i
                            class="fas fa-arrow-circle-left"></i>
                        Regresar</a>
                </div>
            </div>
        </section>
    </div>
    </div>
    <br />
@endsection
