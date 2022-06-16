@extends('adminlte.index')
@section('title', 'Finanza')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/egreso') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Egreso</h2>
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
                        <label for="Tipo_Egreso">
                            <FONT SIZE=3>Tipo de egreso</FONT>
                        </label>
                        <input type="text" class="form-control" name="Tipo_Egreso"
                            value="{{ isset($egreso->Tipo_Egreso) ? $egreso->Tipo_Egreso : old('Tipo_Egreso') }}"
                            id="Tipo_Egreso" placeholder="Ingrese el tipo de ingreso ..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_Egreso">
                            <FONT SIZE=3>Fecha de registro</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Egreso"
                            value="{{ isset($ingreso->Fecha_Egreso) ? $ingreso->Fecha_Egreso : old('Fecha_Egreso', date('Y-m-d')) }}"
                            id="Fecha_Egreso" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Num_Factura">
                            <FONT SIZE=3>Número de factura</FONT>
                        </label>
                        <input type="text" class="form-control" name="Num_Factura"
                            value="{{ isset($egreso->Num_Factura) ? $egreso->Num_Factura : old('Num_Factura') }}"
                            id="Num_Factura" placeholder="Ingrese el numero de factura...">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Monto">
                            <FONT SIZE=3>Monto</FONT>
                        </label>
                        <input type="text" class="form-control" name="Monto"
                            value="{{ isset($egreso->Monto) ? $egreso->Monto : old('Monto') }}" id="Monto"
                            placeholder="Ingrese el monto..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Detalle">
                            <FONT SIZE=3>Detalle</FONT>
                        </label>
                        <input type="text" class="form-control" name="Detalle"
                            value="{{ isset($egreso->Detalle) ? $egreso->Detalle : old('Detalle') }}" id="Detalle"
                            placeholder="Ingrese el detalle...">
                    </div>


                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a class="btn btn-secondary" href="{{ url('egreso/') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i>
                        Regresar</a>
                </div>

            </form>

        </section>
        <br />
    </div>
@endsection
