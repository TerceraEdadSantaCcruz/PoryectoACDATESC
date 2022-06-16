@extends('adminlte.index')
@section('title', 'Finanza')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/egreso/' . $egreso->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Egresos</h2>
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

                {{ @method_field('PATCH') }}
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Tipo_Egreso">
                            <FONT SIZE=3>Tipo de Egreso</FONT>
                        </label>
                        <input type="text" class="form-control" name="Tipo_Egreso"
                            value="{{ old('Tipo_Egreso', $egreso->Tipo_Egreso) }}"
                            id="Tipo_Egreso">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_Egreso">
                            <FONT SIZE=3>Fecha de Egreso</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Egreso"
                            value="{{ old('Fecha_Egreso', $egreso->Fecha_Egreso) }}"
                            id="Fecha_Egreso">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Num_Factura">
                            <FONT SIZE=3>Número de Factura</FONT>
                        </label>
                        <input type="text" class="form-control" name="Num_Factura"
                            value="{{ old('Num_Factura', $egreso->Num_Factura) }}"
                            id="Num_Factura">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Monto">
                            <FONT SIZE=3>Monto</FONT>
                        </label>
                        <input type="text" class="form-control" name="Monto"
                            value="{{ old('Monto', $egreso->Monto) }}" id="Monto">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Detalle">
                            <FONT SIZE=3>Detalle</FONT>
                        </label>
                        <input type="text" class="form-control" name="Detalle"
                            value="{{ old('Detalle', $egreso->Detalle) }}" id="Detalle">
                    </div>
                </div>

                <div class="col-12" style="text-align:right;">
                    <button type="submit" class="btn btn-primary" title="Editar"> <i class="far fa-save"></i>
                        Editar</button>
                    <a class="btn btn-secondary" href="{{ url('egreso/') }}" title="Regresar"> <i
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
