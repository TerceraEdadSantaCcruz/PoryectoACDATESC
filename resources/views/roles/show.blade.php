@extends('adminlte.index')
@section('title', 'Roles-Permisos')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Rol</h2>
            </div>
            <br>
            <div class="row">
                @include('roles.show_fields')
            </div>

            <div class="col-12" style="text-align:right;" title="Regresar">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> <i class="fas fa-arrow-circle-left"></i>
                    Regresar
                </a>
            </div>

        </section>
    </div>
    <br />
@endsection
