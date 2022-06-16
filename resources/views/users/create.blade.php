@extends('adminlte.index')
@section('title', 'Usuario')
@section('content')

    <div class="container">
        <br />
        <section class="formulario">

            @include('adminlte-templates::common.errors')


            <div class="cabeza">
                <h2>Crear Usuario</h2>
            </div>

            {!! Form::open(['route' => 'users.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('users.fields')
                </div>

            </div>

            <div class="col-12" style="text-align:right;" title="Guardar">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-secondary " title="Regresar"><i
                        class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>

            {!! Form::close() !!}

        </section>

        <br />

    </div>
@endsection
