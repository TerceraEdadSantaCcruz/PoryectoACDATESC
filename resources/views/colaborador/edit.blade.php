@extends('adminlte.index')
@section('title', 'Colaborador')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/colaborador/' . $colaborador->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Colaborador</h2>
                </div>
                @if (count($errors) > 0)
                    <br>
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
                        <label for="Fotografia">
                            <FONT SIZE=3>Fotografía</FONT>
                        </label>
                        @if (isset($colaborador->Fotografia))
                            <img src="{{ asset('storage') . '/' . $colaborador->Fotografia }}"
                                style="max-width:100%;width:auto;height:auto;">
                        @endif
                        <input type="file" class="form-control" name="Fotografia" value="" id="Fotografia">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="Identificacion">
                                <FONT SIZE=3>Identificación</FONT>
                            </label>
                            <input type="text" class="form-control" name="Identificacion"
                                value="{{ isset($colaborador->Identificacion) ? $colaborador->Identificacion : old('Identificacion') }}"
                                id="Identificacion">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Nombre">
                                <FONT SIZE=3>Nombre</FONT>
                            </label>
                            <input type="text" class="form-control" name="Nombre"
                                value="{{ isset($colaborador->Nombre) ? $colaborador->Nombre : old('Nombre') }}" id="Nombre">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Apellido_1">
                                <FONT SIZE=3>Primer Apellido</FONT>
                            </label>
                            <input type="text" class="form-control" name="Apellido_1"
                                value="{{ isset($colaborador->Apellido_1) ? $colaborador->Apellido_1 : old('Apellido_1') }}"
                                id="Apellido_1">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Apellido_2">
                                <FONT SIZE=3>Segundo Apellido</FONT>
                            </label>
                            <input type="text" class="form-control" name="Apellido_2"
                                value="{{ isset($colaborador->Apellido_2) ? $colaborador->Apellido_2 : old('Apellido_2') }}"
                                id="Apellido_2">
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="Telefono">
                                <FONT SIZE=3>Número de Teléfono</FONT>
                            </label>
                            <input type="text" class="form-control" name="Telefono"
                                value="{{ isset($colaborador->Telefono) ? $colaborador->Telefono : old('Telefono') }}"
                                id="Telefono">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Fecha_nacimiento">
                                <FONT SIZE=3>Fecha de Nacimiento</FONT>
                            </label>
                            <input type="date" class="form-control" name="Fecha_nacimiento"
                                value="{{ isset($colaborador->Fecha_nacimiento) ? $colaborador->Fecha_nacimiento : old('Fecha_nacimiento') }}"
                                id="Fecha_nacimiento">
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="Edad">
                                <FONT SIZE=3>Edad</FONT>
                            </label>
                            <input type="text" class="form-control" name="Edad"
                                value="{{ isset($colaborador->Edad) ? $colaborador->Edad : old('Edad') }}" id="Edad">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Direccion">
                                <FONT SIZE=3>Dirección</FONT>
                            </label>
                            <input type="text" class="form-control" name="Direccion"
                                value="{{ isset($colaborador->Direccion) ? $colaborador->Direccion : old('Direccion') }}"
                                id="Direccion">
                        </div>
                    </div>

                    <div class=" row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="Puesto">
                                <FONT SIZE=3>Puesto</FONT>
                            </label>
                            <input type="text" class="form-control" name="Puesto"
                                value="{{ isset($colaborador->Puesto) ? $colaborador->Puesto : old('Puesto') }}" id="Puesto">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Correo_Electronico_Colaborador">
                                <FONT SIZE=3>Correo Electrónico</FONT>
                            </label>
                            <input type="text" class="form-control" name="Correo_Electronico_Colaborador"
                                value="{{ isset($colaborador->Correo_Electronico_Colaborador)? $colaborador->Correo_Electronico_Colaborador: old('Correo_Electronico_Colaborador') }}"
                                id="Correo_Electronico_Colaborador">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Comentarios">
                                <FONT SIZE=3>Comentarios</FONT>
                            </label>
                                <textarea type="text" class="form-control" name="Comentarios" id="Comentarios"
                                rows="3">{{ $colaborador->Comentarios }}</textarea>
                        </div>
                    </div>
                    <div class="col-12" style="text-align:right;">

                        <button type="submit" class="btn btn-primary" title="Editar"> <i class="far fa-save"></i>
                            Editar</button>
                        <a class="btn btn-secondary" href="{{ url('colaborador/') }}" title="Regresar"><i
                                class="fas fa-arrow-circle-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </form>
    </div>
    </div>
    </div>
    <br />

@endsection
