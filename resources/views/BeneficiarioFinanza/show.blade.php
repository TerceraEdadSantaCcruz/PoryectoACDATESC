@extends('adminlte.index')
@section('title', 'Historial de Pago')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Pago de Beneficiario</h2>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="beneficiario_id">
                        <FONT SIZE=3>Beneficiario</FONT>
                    </label>
                    <input type="text" class="form-control" name="Nombre"
                        value="{{ $beneficiarioFinanza->Nombre }}  {{ $beneficiarioFinanza->Apellido_1 }} {{ $beneficiarioFinanza->Apellido_2 }}"
                        id="Nombre" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Tipo_Cuota">
                        <FONT SIZE=3>Tipo de Cuota</FONT>
                    </label>
                    <input type="text" class="form-control" name="Tipo_Cuota"
                        value="{{ isset($beneficiarioFinanza->Tipo_Cuota) ? $beneficiarioFinanza->Tipo_Cuota : old('Tipo_Cuota') }}"
                        id="Tipo_Cuota" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Fecha_Pago">
                        <FONT SIZE=3>Fecha de Pago</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha_Pago"
                        value="{{ isset($beneficiarioFinanza->Fecha_Pago) ? $beneficiarioFinanza->Fecha_Pago : old('Fecha_Pago') }}"
                        id="Fecha_Pago" readonly>

                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Fecha_Proximo_Pago">
                        <FONT SIZE=3>Fecha de Próximo Pago</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha_Proximo_Pago"
                        value="{{ isset($beneficiarioFinanza->Fecha_Proximo_Pago) ? $beneficiarioFinanza->Fecha_Proximo_Pago : old('Fecha_Proximo_Pago') }}"
                        id="Fecha_Proximo_Pago" readonly>

                </div>

                <div class="form-group col-md-6">
                    <label for="Monto">
                        <FONT SIZE=3>Monto</FONT>
                    </label>
                    <input type="text" class="form-control" name="Monto"
                        value="{{ isset($beneficiarioFinanza->Monto) ? $beneficiarioFinanza->Monto : old('Monto') }}"
                        id="Monto" readonly>

                </div>
            </div>

            <div class="form-group">
                <label for="Descripcion">
                    <FONT SIZE=3>Descripción</FONT>
                </label>
                <input type="text" class="form-control" name="Descripcion"
                    value="{{ isset($beneficiarioFinanza->Descripcion) ? $beneficiarioFinanza->Descripcion : old('Descripcion', 'Sin descripción') }}"
                    id="Descripcion" readonly>
                <br>
            </div>
            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" title="Regresar" href="{{ url('BeneficiarioFinanza/') }}"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
    </div>
    </div>
    </div>
@endsection
