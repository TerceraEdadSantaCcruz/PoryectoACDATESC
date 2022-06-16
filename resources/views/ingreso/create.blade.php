@extends('adminlte.index')
@section('title', 'Finanza')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/ingreso') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Registrar Ingresos</h2>
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
                        <label for="Tipo_Ingreso">
                            <FONT SIZE=3>Tipo de Ingreso</FONT>
                        </label>
                        <input type="text" class="form-control" name="Tipo_Ingreso"
                            value="{{ isset($ingreso->Tipo_Ingreso) ? $ingreso->Tipo_Ingreso : old('Tipo_Ingreso') }}"
                            id="Tipo_Ingreso" placeholder="Ingrese el tipo de ingreso ..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_Ingreso">
                            <FONT SIZE=3>Fecha de Ingreso</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Ingreso"
                            value="{{ isset($ingreso->Fecha_Ingreso) ? $ingreso->Fecha_Ingreso : old('Fecha_Ingreso', date('Y-m-d')) }}"
                            id="Fecha_Ingreso" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Num_Factura">
                            <FONT SIZE=3>Número de Factura</FONT>
                        </label>
                        <input type="text" class="form-control" name="Num_Factura"
                            value="{{ isset($ingreso->Num_Factura) ? $ingreso->Num_Factura : old('Num_Factura') }}"
                            id="Num_Factura" placeholder="Ingrese el número de factura...">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Monto">
                            <FONT SIZE=3>Monto</FONT>
                        </label>
                        <input type="text" class="form-control" name="Monto"
                            value="{{ isset($ingreso->Monto) ? $ingreso->Monto : old('Monto') }}" id="Monto"
                            placeholder="Ingrese el monto..." required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Detalle">
                            <FONT SIZE=3>Detalle</FONT>
                        </label>
                        <input type="text" class="form-control" name="Detalle"
                            value="{{ isset($ingreso->Detalle) ? $ingreso->Detalle : old('Detalle') }}" id="Detalle"
                            placeholder="Ingrese el detalle...">
                    </div>



                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Guardar"><i class="far fa-save"></i>
                        Guardar</button>
                    <a class="btn btn-secondary" href="{{ url('ingreso/') }}" title="Regresar"><i
                            class="fas fa-arrow-circle-left"></i>
                        Regresar</a>
                </div>

            </form>

        </section>
        <br />
    </div>
@endsection
