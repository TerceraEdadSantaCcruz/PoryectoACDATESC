@extends('adminlte.index')
@section('title', 'Usuario')
@section('content')
    <div class="container">
        <br />
        <section class="formulario">
            <div class="cabeza">
                <h2>Detalles de Usuario</h2>
            </div>
            <br>
            <div class="row">
                @include('users.show_fields')
            </div>
            <div class="col-12" style="text-align:right;">
                <a class="btn btn-primary" href="{{ route('users.index') }}" title="Regresar"> <i
                        class="fas fa-arrow-circle-left"></i>
                    Regresar
                </a>
            </div>


        </section>
    </div>
    <br />
@endsection
