@extends('adminlte::page')
@section('title', 'Home')

<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--css-->
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"
            integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Data Table -->
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/r-2.2.9/datatables.min.css" />

    @endsection

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    @section('content')
        <main>
            <div class="contenedor_dashboard">
                <div class="contenedor_cards">
                    <div class="card_dashboard primera_card">
                        <div class="info">
                            <div class="icono">
                                <i class="fa-solid fa-user-check iconos_card"></i>
                            </div>
                            <div id="totalDeBeneficiarios">
                                <p>Beneficiarios</p>
                            </div>
                        </div>
                        <div class="mas_info info-1">
                            <a href="{{ url('/beneficiario') }}" rel="noopener noreferrer">Más Información</a>
                        </div>
                    </div>
                    <div class="card_dashboard segunda_card">

                        <div class="info">
                            <div class="icono">
                                <i class="fas fa-calendar-alt iconos_card"></i>
                            </div>
                            <div id="totalActividades">
                                <p>Actividades</p>
                            </div>
                        </div>
                        <div class="mas_info info-2">
                            <a href="{{ url('/actividades') }}" rel="noopener noreferrer">Más Información</a>
                        </div>
                    </div>

                    <div class="card_dashboard tercera_card">
                        <div class="info">
                            <div class="icono">
                                <i class="fas fa-users iconos_card"></i>
                            </div>
                            <div id="totalColaboradores">
                                <p>Colaboradores</p>
                            </div>
                        </div>
                        <div class="mas_info info-3">
                            <a href="{{ url('/colaborador') }}" rel="noopener noreferrer">Más Información</a>
                        </div>
                    </div>
                    <div class="card_dashboard cuarta_card">
                        <div class="info">
                            <div class="icono">
                                <i class="fas fa-list iconos_card"></i>
                            </div>
                            <div id="totalInventarios">
                                <p>Inventarios</p>
                            </div>
                        </div>
                        <div class="mas_info info-4">
                            <a href="{{ url('/inventario') }}" rel="noopener noreferrer">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container__card">
                <div class="card__father">
                    <div class="card card_extra">
                        <div class="card__front" style="background-image: url(css/imagen/img2.jpg);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>Misión</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h3>Misión</h3>
                                <p>Es una organización que promueve la satisfacción de necesidades prioritarias de la
                                    atención y cuido de las Personas Adultas Mayores, beneficiados, para mejorar la calidad
                                    de vida.</p>
                                <!--<input type="button" value="Leer Más">-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card__father">
                    <div class="card card_extra">
                        <div class="card__front" style="background-image: url(css/imagen/img1.jpg);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>CDTE</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h3>Historia</h3>
                                <p>Esta Organización fue fundada el 30 de Abril de 1986, fue creado con el fin de atender a
                                    algunos adultos mayores de la región, con el proposito de ofrecer un ambiente familiar
                                    sano.</p>
                                <!--<input type="button" value="Leer Más">-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card__father">
                    <div class="card card_extra">
                        <div class="card__front" style="background-image: url(css/imagen/img3.jpg);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>Visión</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h3>Visión</h3>
                                <p>Ser una organización sólida y eficaz que contribuya al bienestar de las Personas Adultas
                                    Mayores, para que sean capaz de adaptarse a los cambios socioculturales, psicológicos y
                                    económicos del futuro.</p>
                                <!--<input type="button" value="Leer Más">-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </main>
    @stop

    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
        $.ajax({
            url: "/totalBeneficiarios",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const valor = document.createElement("h3");
                const valorNumero = document.createTextNode("Total: " + data.data);
                valor.appendChild(valorNumero);
                document.getElementById("totalDeBeneficiarios").appendChild(valor);
            }
        });
    </script>

    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
        $.ajax({
            url: "/totalActividades",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const valor = document.createElement("h3");
                const valorNumero = document.createTextNode("Total: " + data.data);
                valor.appendChild(valorNumero);
                document.getElementById("totalActividades").appendChild(valor);
            }
        });
    </script>

    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
        $.ajax({
            url: "/totalColaboradores",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const valor = document.createElement("h3");
                const valorNumero = document.createTextNode("Total: " + data.data);
                valor.appendChild(valorNumero);
                document.getElementById("totalColaboradores").appendChild(valor);
            }
        });
    </script>

    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
        $.ajax({
            url: "/totalInventarios",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                const valor = document.createElement("h3");
                const valorNumero = document.createTextNode("Total: " + data.data);
                valor.appendChild(valorNumero);
                document.getElementById("totalInventarios").appendChild(valor);
            }
        });
    </script>

</body>

</html>

@include('sweetalert::alert')
