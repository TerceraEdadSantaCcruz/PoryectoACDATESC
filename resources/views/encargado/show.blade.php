@extends('adminlte.index')
@section('title', 'Encargado')
@section('content')


    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles del Encargado</h2>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Identificacion_Encargado">
                        <FONT SIZE=3>Identificación</FONT>
                    </label>
                    <input type="text" class="form-control" name="Identificacion_Encargado"
                        value="{{ isset($encargado->Identificacion_Encargado)? $encargado->Identificacion_Encargado: old('Identificacion_Encargado') }}"
                        id="Identificacion_Encargado" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Nombre_Encargado">
                        <FONT SIZE=3>Nombre</FONT>
                    </label>
                    <input type="text" class="form-control" name="Nombre_Encargado"
                        value="{{ isset($encargado->Nombre_Encargado) ? $encargado->Nombre_Encargado : old('Nombre_Encargado') }}"
                        id="Nombre_Encargado" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Apellido_1_Encargado">
                        <FONT SIZE=3>Primer Apellido</FONT>
                    </label>
                    <input type="text" class="form-control" name="Apellido_1_Encargado"
                        value="{{ isset($encargado->Apellido_1_Encargado) ? $encargado->Apellido_1_Encargado : old('Apellido_1_Encargado') }}"
                        id="Apellido_1_Encargado" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Apellido_2_Encargado">
                        <FONT SIZE=3>Segundo Apellido</FONT>
                    </label>
                    <input type="text" class="form-control" name="Apellido_2_Encargado"
                        value="{{ isset($encargado->Apellido_2_Encargado) ? $encargado->Apellido_2_Encargado : old('Apellido_2_Encargado') }}"
                        id="Apellido_2_Encargado" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Telefono_Encargado">
                        <FONT SIZE=3>Teléfono</FONT>
                    </label>
                    <input type="text" class="form-control" name="Telefono_Encargado"
                        value="{{ isset($encargado->Telefono_Encargado) ? $encargado->Telefono_Encargado : old('Telefono_Encargado') }}"
                        id="Telefono_Encargado" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Correo_Electronico_Encargado">
                        <FONT SIZE=3>Correo Electrónico</FONT>
                    </label>
                    <input type="text" class="form-control" name="Correo_Electronico_Encargado"
                        value="{{ isset($encargado->Correo_Electronico_Encargado)? $encargado->Correo_Electronico_Encargado: old('Correo_Electronico_Encargado',"Correo no proporcionado") }}"
                        id="Correo_Electronico_Encargado" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Fecha_Nacimiento_Encargado">
                        <FONT SIZE=3>Fecha de Nacimiento</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha_Nacimiento_Encargado"
                        value="{{ isset($encargado->Fecha_Nacimiento_Encargado)? $encargado->Fecha_Nacimiento_Encargado: old('Fecha_Nacimiento_Encargado') }}"
                        id="Fecha_Nacimiento_Encargado" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Direccion_Encargado">
                        <FONT SIZE=3>Dirección</FONT>
                    </label>
                    <input type="text" class="form-control" name="Direccion_Encargado"
                        value="{{ isset($encargado->Direccion_Encargado) ? $encargado->Direccion_Encargado : old('Direccion_Encargado') }}"
                        id="Direccion_Encargado" readonly>
                </div>
            </div>
            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" title="Regresar" href="{{ url('encargado/') }}"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>

            </div>
    </div>
    </div>

@endsection
