@extends('adminlte.index')
@section('title', 'Beneficiario')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/beneficiario/' . $beneficiario->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Beneficiario</h2>
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
                        @if (isset($beneficiario->Fotografia))
                            <img src="{{ asset('storage') . '/' . $beneficiario->Fotografia }}"
                                style="max-width:100%;width:auto;height:auto;">
                        @endif
                        <input type="file" class="col-md-6" name="Fotografia" value="" id="Fotografia">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="Identificacion_Beneficiario">
                                <FONT SIZE=3>Identificación</FONT>
                            </label>
                            <input type="text" class="form-control" name="Identificacion_Beneficiario"
                                value="{{ old('Identificacion_Beneficiario',$beneficiario->Identificacion_Beneficiario) }}"
                                id="Identificacion_Beneficiario">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Nombre">
                                <FONT SIZE=3>Nombre</FONT>
                            </label>
                            <input type="text" class="form-control" name="Nombre"
                                value="{{ old('Nombre', $beneficiario->Nombre) }}"
                                id="Nombre">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Apellido_1">
                                <FONT SIZE=3>Primer Apellido</FONT>
                            </label>
                            <input type="text" class="form-control" name="Apellido_1"
                                value="{{ old('Apellido_1', $beneficiario->Apellido_1) }}"
                                id="Apellido_1">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Apellido_2">
                                <FONT SIZE=3>Segundo Apellido</FONT>
                            </label>
                            <input type="text" class="form-control" name="Apellido_2"
                                value="{{ old('Apellido_2', $beneficiario->Apellido_2) }}"
                                id="Apellido_2">
                        </div>
                    </div>
                    <div class=" row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="Telefono">
                                <FONT SIZE=3>Número de Teléfono</FONT>
                            </label>
                            <input type="number" class="form-control" name="Telefono"
                                value="{{ old('Telefono', $beneficiario->Telefono) }}"
                                id="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Fecha_nacimiento">
                                <FONT SIZE=3>Fecha de Nacimiento</FONT>
                            </label>
                            <input type="date" class="form-control" name="Fecha_nacimiento"
                                value="{{ old('Fecha_nacimiento', $beneficiario->Fecha_nacimiento) }}"
                                id="Fecha_nacimiento">
                        </div>
                    </div>
                    <div class=" row col-md-12">
                        <div class="form-group col-md-12">
                            <label for="Direccion">
                                <FONT SIZE=3>Dirección</FONT>
                            </label>
                            <input type="text" class="form-control" name="Direccion"
                                value="{{ old('Direccion', $beneficiario->Direccion) }}"
                                id="Direccion">
                        </div>
                    </div>
                    <div class=" row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="Fecha_Ingreso">
                                <FONT SIZE=3>Fecha de Ingreso</FONT>
                            </label>
                            <input type="date" class="form-control" name="Fecha_Ingreso"
                                value="{{ old('Fecha_Ingreso', $beneficiario->Fecha_Ingreso) }}"
                                id="Fecha_Ingreso">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Fecha_Salida">
                                <FONT SIZE=3>Fecha de Salida</FONT>
                            </label>
                            <input type="date" class="form-control" name="Fecha_Salida"
                                value="{{ old('Fecha_Salida', $beneficiario->Fecha_Salida) }}"
                                id="Fecha_Salida">
                        </div>
                    </div>
                    <div class="col-12" style="text-align:right;">
                        <button type="submit" class="btn btn-primary" title="Editar"> <i class="far fa-save"></i>
                            Editar</button>
                        <a class="btn btn-secondary" title="Regresar" href="{{ url('beneficiario/') }}">
                            <i class="fas fa-arrow-circle-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
    </div>
    </div>
    <br />
@endsection
