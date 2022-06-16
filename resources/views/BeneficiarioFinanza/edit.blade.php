@extends('adminlte.index')
@section('title', 'Historial de Pago')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <form action="{{ url('/BeneficiarioFinanza/' . $beneficiarioFinanza->fin_id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="cabeza">
                    <h2>Editar Pago de Beneficiario</h2>
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
                    <br>
                @endif
                @method('PUT')
                <br>
                <div class="row">
                    @php
                        // listado
                        $array = ['Semanal', 'Quincenal', 'Mensual', 'Trimestral', 'Semestral', 'Anual'];
                    @endphp
                    <div class="form-group col-md-6">
                        <label for="Tipo_Cuota">
                            <FONT SIZE=3>Tipo de cuota</FONT>
                        </label>
                        <select name="Tipo_Cuota" id="Tipo_Cuota" class="form-control">
                            @foreach ($array as $item)
                                <option value="{{ $item }}"
                                    @if ($beneficiarioFinanza->Tipo_Cuota === $item) selected='selected' @endif>{{ $item }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <label for="Fecha_Pago">
                            <FONT SIZE=3>Fecha de Pago</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Pago"
                            value="{{ isset($beneficiarioFinanza->Fecha_Pago) ? $beneficiarioFinanza->Fecha_Pago : old('Fecha_Pago') }}"
                            id="Fecha_Pago">

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Fecha_Proximo_Pago">
                            <FONT SIZE=3>Fecha de Próximo Pago</FONT>
                        </label>
                        <input type="date" class="form-control" name="Fecha_Proximo_Pago"
                            value="{{ isset($beneficiarioFinanza->Fecha_Proximo_Pago) ? $beneficiarioFinanza->Fecha_Proximo_Pago : old('Fecha_Proximo_Pago') }}"
                            min="{{ date('Y-m-d') }}" id="Fecha_Proximo_Pago">

                    </div>

                    <div class="form-group col-md-6">
                        <label for="Monto">
                            <FONT SIZE=3>Monto</FONT>
                        </label>
                        <input type="number" class="form-control" name="Monto"
                            value="{{ isset($beneficiarioFinanza->Monto) ? $beneficiarioFinanza->Monto : old('Monto') }}"
                            id="Monto">

                    </div>
                </div>

                <div class="form-group">
                    <label for="Descripcion">
                        <FONT SIZE=3>Descripción</FONT>
                    </label>
                    <input type="text" class="form-control" name="Descripcion"
                        value="{{ isset($beneficiarioFinanza->Descripcion) ? $beneficiarioFinanza->Descripcion : old('Descripcion') }}"
                        id="Descripcion">
                    <br>
                </div>

                <div class="col-12" style="text-align:right;">

                    <button type="submit" title="Editar" class="btn btn-primary"> <i class="far fa-save"></i>
                        Editar</button>

                    <a class="btn btn-secondary" title="Regresar" href="{{ url('BeneficiarioFinanza') }}"> <i
                            class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>

            </form>
    </div>
    </div>
    </div>

@endsection
