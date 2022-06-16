@extends('adminlte.index')
@section('title', 'Encargado')
@section('content')
    <div class="container">
        @if ($encargado == null)
            <br>
            <h2 class="card-header text-center ">Encargado No Registrado</h2>
            <br>
            <div class="col-12" style="text-align:right;">
                <a href="{{ url('/beneficiario/' . $id . '/mostrarEncargado/agregarEncargado') }}" class="btn btn-success"
                    title="Registar Encargado"><i class="fas fa-plus"></i> Asignar encargado</a>

                <a class="btn btn-secondary" href="{{ url('beneficiario/' . $id) }}" title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        @else
            <div class="container">
                <br>
                <br>
                <section class="formulario">
                    <div class="cabeza">
                        <h2>Datos de Encargado</h2>
                    </div>
                    <br>

                    <div class="card-body">
                        <div class=row>
                            <div class="form-group col-md-6">
                                <b>Identificación:</b>
                                <input type="text" class="form-control"
                                    value="{{ $encargado->Identificacion_Encargado }}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <b>Nombre:</b>
                                <input type="text" class="form-control"
                                    value="{{ $encargado->Nombre_Encargado }} {{ $encargado->Apellido_1_Encargado }} {{ $encargado->Apellido_2_Encargado }}"
                                    readonly>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <b>Teléfono:</b>
                                <input type="text" class="form-control" value="{{ $encargado->Telefono_Encargado }}"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <b>Fecha de nacimiento:</b>
                                <input type="text" class="form-control"
                                    value="{{ $encargado->Fecha_Nacimiento_Encargado }}" readonly>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <b>Correo electrónico:</b>
                                <input type="text" class="form-control"
                                    value="@if($encargado->Correo_Electronico_Encargado == null){{"Correo no proporcionado"}}
                                           @else{{ $encargado->Correo_Electronico_Encargado }}
                                           @endif" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <b>Dirección:</b>
                                <input type="text" class="form-control" value="{{ $encargado->Direccion_Encargado }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-12" style="text-align:right;">
                            <a class="btn btn-success" href="{{ url('encargado/') }}" title="Regresar"><i class="fa-solid fa-table"></i> Mostrar en tabla</a>
                            <a class="btn btn-secondary" href="{{ url('beneficiario/' . $id) }}" title="Regresar"><i
                                    class="fas fa-arrow-circle-left"></i> Regresar</a>
                        </div>
                    </div>
                </section>
            </div>

    </div>
    <br />
    @endif

@endsection
