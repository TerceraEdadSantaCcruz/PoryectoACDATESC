@extends('layouts.app')
@section('content')
    <br>
    <br>
    <div class="box-form">
        <div class="left">
            <div class="overlay">

                <h1>ACDATESC</h1>
                <h2>ASOCIACIÓN CENTRO DIURNO DE ATENCIÓN A CIUDADANOS DE LA TERCERA EDAD DE SANTA CRUZ.</h2>

                <span>
                    <a href="{{ url('/') }}"><i class="fas fa-arrow-circle-left" aria-hidden="true"></i>Regresar</a>
                </span>
            </div>
        </div>

        <div class="right">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h5>Acceso</h5>
                <h5>Administrativo</h5>
                <p>Por favor ingresa tu usuario y contraseña para poder acceder al área administrativa</p>
                @if (session('error'))
                    <span class="text-danger"> {{ session('error') }}</span>
                @endif
                <div class="inputs">
                    <input id="username" type="username" class="login__input" name="username"
                        value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Usuario">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <input id="password" type="password" class="login__input" name="password" required
                        autocomplete="current-password" placeholder="Contraseña">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>

                <button class="button login__submit">
                    {{ __('Ingresar') }}
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
