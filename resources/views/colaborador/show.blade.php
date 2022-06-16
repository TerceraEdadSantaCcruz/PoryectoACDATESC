@extends('adminlte.index')
@section('title', 'Colaborador')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Colaborador</h2>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">

                   @if (isset($colaborador->Fotografia))
                    <label>
                        <FONT SIZE=3>Fotografía</FONT>
                    </label>
                        <img src="{{ asset('storage') . '/' . $colaborador->Fotografia }}"
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
                        <label for="Identificacion">
                            <FONT SIZE=3>Identificación</FONT>
                        </label>
                        <input type="text" class="form-control" name="Identificacion"
                            value="{{ isset($colaborador->Identificacion) ? $colaborador->Identificacion : old('Identificacion') }}"
                            id="Identificacion" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Nombre" <FONT SIZE=3>Nombre</FONT></label>
                        <input type="text" class="form-control" name="Nombre"
                            value="{{ isset($colaborador->Nombre) ? $colaborador->Nombre : old('Nombre') }}" id="Nombre"
                            readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Apellido_1">
                            <FONT SIZE=3>Primer Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_1"
                            value="{{ isset($colaborador->Apellido_1) ? $colaborador->Apellido_1 : old('Apellido_1') }}"
                            id="Apellido_1" readonly>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="Apellido_2">
                            <FONT SIZE=3>Segundo Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_2"
                            value="{{ isset($colaborador->Apellido_2) ? $colaborador->Apellido_2 : old('Apellido_2') }}"
                            id="Apellido_2" readonly>
                    </div>
                </div>
                <div class=" row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="Telefono">
                            <FONT SIZE=3>Número de Teléfono</FONT>
                        </label>
                        <input type="text" class="form-control" name="Telefono"
                            value="{{ isset($colaborador->Telefono) ? $colaborador->Telefono : old('Telefono') }}"
                            id="Telefono" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_nacimiento">
                            <FONT SIZE=3>Fecha de Nacimiento</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_nacimiento"
                            value="{{ isset($colaborador->Fecha_nacimiento) ? $colaborador->Fecha_nacimiento : old('Fecha_nacimiento') }}"
                            id="Fecha_nacimiento" readonly>
                    </div>
                </div>

                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="Edad">
                            <FONT SIZE=3>Edad</FONT>
                        </label>
                        <input type="text" class="form-control" name="Edad"
                            value="{{ isset($colaborador->Edad) ? $colaborador->Edad : old('Edad') }}" id="Edad" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Direccion">
                            <FONT SIZE=3>Dirección</FONT>
                        </label>
                        <input type="text" class="form-control" name="Direccion"
                            value="{{ isset($colaborador->Direccion) ? $colaborador->Direccion : old('Direccion') }}"
                            id="Direccion" readonly>
                    </div>
                </div>

                <div class="row col-md-12">
                    <div class="form-group col-sm-6">
                        <label for="Puesto">
                            <FONT SIZE=3>Puesto</FONT>
                        </label>
                        <input type="text" class="form-control" name="Puesto"
                            value="{{ isset($colaborador->Puesto) ? $colaborador->Puesto : old('Puesto') }}" id="Puesto"
                            readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Correo_Electronico_Colaborador">
                            <FONT SIZE=3>Correo Electrónico</FONT>
                        </label>
                        <input type="text" class="form-control" name="Correo_Electronico_Colaborador"
                            value="{{ isset($colaborador->Correo_Electronico_Colaborador)? $colaborador->Correo_Electronico_Colaborador: old('Correo_Electronico_Colaborador',"Correo no proporcionado") }}"
                            id="Correo_Electronico_Colaborador" readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="Comentarios">
                            <FONT SIZE=3>Comentarios</FONT>
                        </label>
                        <textarea type="text" class="form-control" name="Comentarios" id="Comentarios"
                        rows="3" readonly>@if($colaborador->Comentarios == null){{"Sin comentarios"}}
                                          @else{{ $colaborador->Comentarios }}
                                          @endif</textarea>
                    </div>
                </div>
                <br>
                <div class="col-12" style="text-align:right;">
                    <a class="btn btn-secondary" href="{{ url('colaborador/') }}" title="Regresar"> <i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
    </div>
    </div>
    <br />
@endsection
