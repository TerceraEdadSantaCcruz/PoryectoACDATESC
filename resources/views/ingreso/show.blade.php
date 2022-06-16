@extends('adminlte.index')
@section('title', 'Finanza')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Ingreso</h2>
            </div>
            <br>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Tipo_Ingreso">
                        <FONT SIZE=3>Tipo de Ingreso</FONT>
                    </label>
                    <input type="text" class="form-control" name="Tipo_Ingreso"
                        value="{{ isset($ingreso->Tipo_Ingreso) ? $ingreso->Tipo_Ingreso : old('Tipo_Ingreso') }}"
                        id="Tipo_Ingreso" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Fecha_Ingreso">
                        <FONT SIZE=3>Fecha de Ingreso</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha_Ingreso"
                        value="{{ isset($ingreso->Fecha_Ingreso) ? $ingreso->Fecha_Ingreso : old('Fecha_Ingreso') }}"
                        id="Fecha_Ingreso" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="Num_Factura">
                        <FONT SIZE=3>Número de Factura</FONT>
                    </label>
                    <input type="text" class="form-control" name="Num_Factura"
                        value="{{ isset($ingreso->Num_Factura) ? $ingreso->Num_Factura : old('Num_Factura',"N/A") }}"
                        id="Num_Factura" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Monto">
                        <FONT SIZE=3>Monto</FONT>
                    </label>
                    <input type="text" class="form-control" name="Monto"
                        value="{{ isset($ingreso->Monto) ? $ingreso->Monto : old('Monto') }}" id="Monto" readonly>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="Detalle"> Detalle </label>
                    <input type="text" class="form-control" name="Detalle"
                        value="{{ isset($ingreso->Detalle) ? $ingreso->Detalle : old('Detalle',"Sin detalle") }}" id="Detalle" readonly>
                </div>
            </div>

            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" href="{{ url('ingreso/') }}" title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>

    </div>
    <br />
@endsection
