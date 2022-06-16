@extends('adminlte.index')
@section('title', 'Historial')
@section('content')
    <br>
    <div class="container">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">Historial de Pagos</h2>
                    </div>
                </div>

                @if (Session::has('mensaje'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ Session::get('mensaje') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <br>
                <br>
                @if ($historial->isNotEmpty())
                    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                        <thead class="bg-primary">
                            <tr>
                                <th style="font-size:110%;">Fecha de pago</th>
                                <th style="font-size:110%;">Monto en colones</th>
                                <th style="font-size:110%;">Tipo de cuota</th>
                                <th style="font-size:110%;">Fecha de próximo pago</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($historial as $registro)
                                <tr>
                                    <td style="font-size:100%;">{{ $registro->Fecha_Pago }}</td>
                                    <td style="font-size:100%;">{{ $registro->Monto }} CRC</td>
                                    <td style="font-size:100%;">{{ $registro->Tipo_Cuota }}</td>
                                    @if($registro->Fecha_Proximo_Pago == null)
                                    <td style="font-size:100%;">Sin agendar</td>
                                    @else
                                    <td style="font-size:100%;">{{ $registro->Fecha_Proximo_Pago }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td style="font-size:100%;">
                                    <b>Total pagado:</b>
                                </td>

                                <td>{{ $montoTotal }} CRC</td>
                            </tr>
                        </tbody>

                    </table>

                    {!! $historial->links() !!}
                    <br>
                    <div class="col-md-12" style="text-align:right;">
                        <a href="{{ url('beneficiario/' . $id) }}" class="btn btn-secondary" title="Regresar"><i
                                class="fas fa-arrow-circle-left"></i> Regresar</a>
                    </div>

            </div>
        </div>
    </div>
@else
    <br>
    <h3 class="card-header text-center ">Sin Registros</h3>
    <br>
    <div class="col-12" style="text-align:right;">
        <a class="btn btn-secondary" href="{{ url('beneficiario/' . $id) }}" title="Regresar"><i
                class="fas fa-arrow-circle-left"></i> Regresar</a>
    </div>
    <br />
    @endif
@endsection
