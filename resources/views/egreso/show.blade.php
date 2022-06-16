@extends('adminlte.index')
@section('title', 'Finanza')
@section('content')

    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Egreso</h2>
            </div>
            <br>
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="Tipo_Egreso">
                        <FONT SIZE=3>Tipo de Egreso</FONT>
                    </label>
                    <input type="text" class="form-control" name="Tipo_Egreso"
                        value="{{ isset($egreso->Tipo_Egreso) ? $egreso->Tipo_Egreso : old('Tipo_Egreso') }}" id="Tipo_Egreso"
                        readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Fecha_Egreso">
                        <FONT SIZE=3>Fecha de Egreso</FONT>
                    </label>
                    <input type="date" class="form-control" name="Fecha_Egreso"
                        value="{{ isset($egreso->Fecha_Egreso) ? $egreso->Fecha_Egreso : old('Fecha_Egreso') }}"
                        id="Fecha_Egreso" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="Num_Factura">
                        <FONT SIZE=3>Número de Factura</FONT>
                    </label>
                    <input type="text" class="form-control" name="Num_Factura"
                        value="{{ isset($egreso->Num_Factura) ? $egreso->Num_Factura : old('Num_Factura',"N/A") }}" id="Num_Factura"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="Monto">
                        <FONT SIZE=3>Monto</FONT>
                    </label>
                    <input type="text" class="form-control" name="Monto"
                        value="{{ isset($egreso->Monto) ? $egreso->Monto : old('Monto') }}" id="Monto" readonly>
                </div>

                <div class="form-group col-md-12">
                    <label for="Detalle">
                        <FONT SIZE=3>Detalle</FONT>
                    </label>
                    <input type="text" class="form-control" name="Detalle"
                        value="{{ isset($egreso->Detalle) ? $egreso->Detalle : old('Detalle',"Sin detalle") }}" id="Detalle" readonly>
                </div>
            </div>

            <div class="col-12" style="text-align:right;">
                <a class="btn btn-secondary" href="{{ url('egreso/') }}" title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        </section>
    </div>
    <br>

@endsection
