@extends('adminlte.index')
@section('title', 'Historial de Pago')
@section('content')
    <div class="container">
        <br>
        <section class="formulario">

            <form action="{{ url('/BeneficiarioFinanza') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Pago</h2>
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
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="beneficiario_id">
                            <FONT SIZE=3>Beneficiario</FONT>
                        </label>
                        <select name="beneficiario_id" id="beneficiario_id" class="form-control">
                            <option value="0">Seleccione un beneficiario</option>
                            @foreach ($beneficiarios as $beneficiario)
                                <option value="{{ $beneficiario->id }}">{{ $beneficiario->Apellido_1 }} {{ $beneficiario->Apellido_2 }}
                                    {{ $beneficiario->Nombre }} / {{ $beneficiario->Identificacion_Beneficiario }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Tipo_Cuota">
                            <FONT SIZE=3>Tipo de cuota</FONT>
                        </label>
                            <select name="Tipo_Cuota" id="Tipo_Cuota" class="form-control"required>
                                <option value="{{ isset($beneficiarioFinanza->Tipo_Cuota) ? $beneficiarioFinanza->Tipo_Cuota : old('Tipo_Cuota') }}" selected>Seleccionar tipo de Cuota</option>
                                <option value="Semanal">Semanal</option>
                                <option value="Quincenal">Quincenal</option>
                                <option value="Mensual">Mensual</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Semestral">Semestral</option>
                                <option value="Anual">Anual</option>
                          </select>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Fecha_Pago">
                            <FONT SIZE=3>Fecha de pago</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Pago"
                            value="{{ isset($beneficiarioFinanza->Fecha_Pago)? $beneficiarioFinanza->Fecha_Pago: old('Fecha_Pago', date('Y-m-d')) }}"
                            min="2022-01-01" max="2100-01-01" id="Fecha_Pago" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="Fecha_Proximo_Pago">
                            <FONT SIZE=3>Fecha de próximo pago</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Proximo_Pago"
                            value="{{ isset($beneficiarioFinanza->Fecha_Proximo_Pago)? $beneficiarioFinanza->Fecha_Proximo_Pago: old('Fecha_Proximo_Pago') }}"
                            min="{{ date('Y-m-d') }}" max="2100-01-01" id="Fecha_Proximo_Pago">

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Monto">
                            <FONT SIZE=3>Monto</FONT>
                        </label>
                        <input type="number" class="form-control" name="Monto"
                            value="{{ isset($beneficiarioFinanza->Monto) ? $beneficiarioFinanza->Monto : old('Monto') }}"
                            id="Monto" placeholder="Ingrese el monto..." required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="Descripcion">
                            <FONT SIZE=3>Descripción</FONT>
                        </label>
                        <input type="text" class="form-control" name="Descripcion"
                            value="{{ isset($beneficiarioFinanza->Descripcion) ? $beneficiarioFinanza->Descripcion : old('Descripcion') }}"
                            id="Descripcion" placeholder="Ingrese una descripción...">
                        <br>
                    </div>
                </div>



                <div class="col-12" style="text-align:right;">

                    <button type="submit" title="Guardar" class="btn btn-primary"><i class="far fa-save"></i>
                        Guardar</button>

                    <a class="btn btn-secondary" title="Regresar" href="{{ url('BeneficiarioFinanza') }}"><i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>

            </form>
        </section>
        <br />


    </div>

@endsection
