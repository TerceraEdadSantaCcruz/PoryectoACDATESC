@extends('adminlte.index')
@section('title', 'Beneficiario')

@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/beneficiario') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Beneficiario</h2>
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
                    <div class="form-group col-md-6">
                        <label for="Identificacion_Beneficiario">
                            <FONT SIZE=3>Identificación</FONT>
                        </label>
                        <input type="text" class="form-control" name="Identificacion_Beneficiario"
                            value="{{ isset($beneficiario->Identificacion_Beneficiario)? $beneficiario->Identificacion_Beneficiario: old('Identificacion_Beneficiario') }}"
                            id="Identificacion_Beneficiario" placeholder="Ingrese la identificación..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Nombre">
                            <FONT SIZE=3>Nombre</FONT>
                        </label>
                        <input type="text" class="form-control" name="Nombre"
                            value="{{ isset($beneficiario->Nombre) ? $beneficiario->Nombre : old('Nombre') }}" id="Nombre"
                            placeholder="Ingrese el nombre..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Apellido_1">
                            <FONT SIZE=3>Primer Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_1"
                            value="{{ isset($beneficiario->Apellido_1) ? $beneficiario->Apellido_1 : old('Apellido_1') }}"
                            id="Apellido_1" placeholder="Ingrese el primer apellido..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Apellido_2">
                            <FONT SIZE=3>Segundo Apellido</FONT>
                        </label>
                        <input type="text" class="form-control" name="Apellido_2"
                            value="{{ isset($beneficiario->Apellido_2) ? $beneficiario->Apellido_2 : old('Apellido_2') }}"
                            id="Apellido_2" placeholder="Ingrese el segundo apellido..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Telefono">
                            <FONT SIZE=3>Número de Teléfono</FONT>
                        </label>
                        <input type="number" class="form-control" name="Telefono"
                            value="{{ isset($beneficiario->Telefono) ? $beneficiario->Telefono : old('Telefono') }}"
                            id="Telefono" placeholder="Ingrese el número de teléfono...">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_nacimiento">
                            <FONT SIZE=3>Fecha de Nacimiento</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_nacimiento"
                            value="{{ isset($beneficiario->Fecha_nacimiento)? $beneficiario->Fecha_nacimiento: old('Fecha_nacimiento', $fechaDefecto) }}"
                            min="1900-01-01" max="2000-01-01" id="Fecha_nacimiento" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Direccion">
                            <FONT SIZE=3>Dirección</FONT>
                        </label>
                        <input type="text" class="form-control" name="Direccion"
                            value="{{ isset($beneficiario->Direccion) ? $beneficiario->Direccion : old('Direccion') }}"
                            id="Direccion" placeholder="Ingrese la dirección..." required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Fecha_Ingreso">
                            <FONT SIZE=3>Fecha de Ingreso</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Ingreso"
                            value="{{ isset($beneficiario->Fecha_Ingreso) ? $beneficiario->Fecha_Ingreso : old('Fecha_Ingreso', date('Y-m-d')) }}"
                            min="2000-01-01" max="{{ date('Y-m-d') }}" id="Fecha_Ingreso" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="Fecha_Salida">
                            <FONT SIZE=3>Fecha de Salida</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Salida"
                            value="{{ isset($beneficiario->Fecha_Salida) ? $beneficiario->Fecha_Salida : old('Fecha_Salida') }}"
                            min="{{ date('Y-m-d') }}" id="Fecha_Salida">

                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="Fotografia">
                        <FONT SIZE=3>Fotografía</FONT>
                    </label>
                    @if (isset($beneficiario->Fotografia))
                        <img class="img-thumbnail" src="{{ asset('storage') . '/' . $beneficiario->Fotografia }}"
                            width="200" alt="">
                    @endif
                    <input type="file" class="controls" name="Fotografia" value="" id="Fotografia">
                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a class="btn btn-secondary " title="Regresar" href="{{ url('beneficiario/') }}"><i
                            class="fas fa-arrow-circle-left"></i>
                        Regresar</a>
                </div>

            </form>
        </section>

        <br />

    </div>
@endsection
