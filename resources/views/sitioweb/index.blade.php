<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACDATESC</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="loader">
        <div id="myDiv">
            <!--HEADER-->
            <div class="header">
                <div class="bg-color">
                    <header id="main-header">
                        <nav class="navbar navbar-default navbar-fixed-top">
                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">ACDATESC</a>
                                </div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a href="#main-header">Inicio</a></li>
                                        <li class=""><a href="#servicios">Servicios</a></li>
                                        <li class=""><a href="#instalaciones">Instalaciones</a></li>
                                        <li class=""><a href="#requisitos">Requisitos</a></li>
                                        <li class=""><a href="#portfolio">Galería</a></li>
                                        <li class=""><a href="#sobrenosotros">Sobre Nosotros</a></li>
                                        <li class=""><a href="#contactos">Contáctenos</a></li>
                                        <li class=""><a href="{{ url('/login') }}">Administración</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </header>
                    <div class="wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="banner-info text-center wow fadeIn delay-05s">

                                    <h2 class="bnr-sub-title">Asociación Centro Diurno de Atención a Ciudadanos de la
                                        Tercera Edad de Santa Cruz.</h2>
                                    <h1 class="bnr-title">Promover la independencia y la autonomía de quienes
                                        asisten al centro para que puedan mantenerse activos y con una mejor calidad de
                                        vida que los haga felices.</h1>

                                    <div class="overlay-detail">
                                        <a href="#servicios"><i class="fa fa-angle-down"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ HEADER-->
            <!---->
            <!-- Servicios -->
            <section id="servicios" class="section-padding wow fadeInUp delay-05s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15">¿Que Ofrecemos?</h2>
                            <p class="sub-title pad-bt15">En la Asociación Centro Diurno para la Atención de la Tercera
                                Edad de Santa Cruz, ofrecemos servicios muy variados para nuestros beneficiarios, esto
                                para mejorar su calidad de vida en sus años de jubilación.</p>
                            <hr class="bottom-line">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <h3><span>E</span>nfermería</h3>
                                <p>El servicio de Enfermería lo apoya la Universidad Latina como parte del T.C.U,
                                    quienes realizan exámenes de rutina. Toma de presión arterial, Glicemia.</p>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <h3><span>F</span>isioterapia</h3>
                                <p>Servicio brindado por funcionaria profesional directa de la asociación, además del
                                    apoyo de estudiantes practicantes en esta área.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <h3><span>T</span>rabajo Social</h3>
                                <p>Servicio brindado por una profesional del Centro de Salud de Santa Cruz, nos visita
                                    una vez por semana.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <h3><span>M</span>edicina</h3>
                                <p>El servicio de Medicina y control lo proveen los diferentes ebais del área de salud
                                    de Santa Cruz, la cual se ubica a los 100 metros de la asociación.</p>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="service-item">
                                <h3><span>O</span>dontología</h3>
                                <p>Se ofrece atención Odontológica gracias al apoyo de la unión de odontólogos del
                                    cantón y al Club de Leones. Todos los beneficiarios que lo requieran cuentan con
                                    prótesis dentales nuevas que facilitan su nutrición.</p>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="service-item">
                                <h3><span>A</span>ctividades Recreativas</h3>
                                <p>Se brindan diferentes actividades recreativas como talleres de manualidades, charlas,
                                    confecciones, grupo de baile, cantos, cursos de bordados, juegos de mesa y demás.
                                </p>

                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="service-item">
                                <h3><span>N</span>utrición Balanceada</h3>
                                <p>Se brinda un servicio de alimentación de acuerdo con los lineamientos brindados por
                                    la Federación Cruzada Nacional de Protección al Anciano.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fin servicios -->

            <!-- Instalaciones -->

            <section id="instalaciones" class="section-padding wow fadeInUp delay-05s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15">Sobre nuestras áreas</h2>
                            <hr class="bottom-line">
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/salonevento.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Salon de Eventos</h2>
                                    <p>Contamos con un salón de eventos que alberga actividades como charlas, talleres
                                        de baile, actividades físicas y demás.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/cocina.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Cocina</h2>
                                    <p>Contamos con cocina equipada con lo necesario para la preparación de alimentos
                                        balanceados con respecto a los padecimientos de nuestros visitantes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/fisio.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Consultorio Fisioterapéutico</h2>
                                    <p>Contamos con un consultorio fisioterapéutico en el cual se da el tratamiento de
                                        lesiones, enfermedades y trastornos a través de métodos físicos, un lugar
                                        equipado y atendido por profesionales colaboradores de la asociación.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/areaverde.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Áreas Verdes</h2>
                                    <p>Contamos con zonas verdes las cuales ayudan a tener un ambiente agradable y
                                        tranquilo para nuestros visitantes.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/salon.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Salones de trabajo</h2>
                                    <p>Contamos con diferentes espacios y salones los cuales dan lugar a las actividades
                                        que se desarrollan en la asociación.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-sec">
                                <div class="blog-img">
                                    <img src="img/comedor.jpeg" class="img-responsive">
                                </div>
                                <div class="blog-info">
                                    <h2>Comedor</h2>
                                    <p>Nuestras instalaciones cuentan con un comedor equipado para el disfrute de los
                                        alimentos por parte de nuestros beneficiarios.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- fin Instalaciones -->

            <!-- inicio Requisitos -->
            <section id="requisitos" class="section-padding wow fadeInUp delay-05s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center white">
                            <h2 class="service-title pad-bt15">Requisitos para formar parte</h2>
                            <p class="sub-title pad-bt15">La Asociación Centro Diurno de Atención a Ciudadanos de la
                                Tercera Edad de Santa Cruz solicita los siguientes requisitos a las personas interesadas
                                para poder disfrutar de los beneficios de la asociación</p>
                            <hr class="bottom-line white-bg">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/hombre.png">
                            </div>
                            <h3 class="pad-bt15">Mayor de 65 años</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/tarjeta-de-identificacion.png">
                            </div>
                            <h3 class="pad-bt15">Copia de la cedula por ambos lados</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/caminando.png">
                            </div>
                            <h3 class="pad-bt15">Tener capacidad de valerse por sí mismo</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/no-alcohol.png">
                            </div>
                            <h3 class="pad-bt15">No tener problemas de alcoholismo</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/documentos.png">
                            </div>
                            <h3 class="pad-bt15">Presentar epicrisis o dictamen medico (pedir en la CCSS)</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/documentos-oficiales.png">
                            </div>
                            <h3 class="pad-bt15">Presentar certificado del tipo de pensión que recibe (pedir en
                                la CCSS)</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/acuerdo.png">
                            </div>
                            <h3 class="pad-bt15">Cumplir con el reglamento de la institución</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/billete-de-banco.png">
                            </div>
                            <h3 class="pad-bt15">Tener o no tener pensión de 0 a 98.000.00 colones</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/dar-dinero.png">
                            </div>
                            <h3 class="pad-bt15">Colaborar con una cuota mensual </h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/casa.png">
                            </div>
                            <h3 class="pad-bt15">Ser de escasos recursos </h3>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 white">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="img/sin-virus.png">
                            </div>
                            <h3 class="pad-bt15">No padecer enfermedades infectocontagiosas o desequilibrio
                                mental</h3>
                        </div>
                    </div>

                </div>
            </section>
            <!-- fin requisitos -->
            <!-- portafolio -->
            <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15">Galería de Fotos</h2>
                            <p class="sub-title pad-bt15">Acá se encuentran algunas fotografías de las actividades que
                                se realizan en la asociación.</p>
                            <hr class="bottom-line">
                        </div>


                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/almuerzo.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Almuerzo</h2>
                                    <p>Almuerzo de los beneficiarios de la asociación.</p>
                                </figcaption>
                            </figure>
                        </div>


                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/tamal.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Tamaleada</h2>
                                    <p>Tamaleada para el mes de diciembre del año 2021 a cargo de nuestros
                                        beneficiarios.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/diadeamistad.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Foto grupal</h2>
                                    <p>Fotografía grupal de nuestros beneficiarios en el día del amor y la amistad.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/ejercicio.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Actividad física</h2>
                                    <p>Ejercicios realizados por nuestros beneficiarios a cargo de voluntarios.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/asamblea.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Asamblea</h2>
                                    <p>Asamblea de la junta directiva realizada en los años 90s.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/inaguracion.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Inauguración</h2>
                                    <p>Inauguración de placa en las instalaciones de la asociación en los años 90s.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/nadar.jpg" class="img-responsive">
                                <figcaption>
                                    <h2>Natación</h2>
                                    <p>Actividad recreativa de natación en el polideportivo de Santa Cruz en los años
                                        90s.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/manualidad.jpeg" class="img-responsive">
                                <figcaption>
                                    <h2>Manualidades</h2>
                                    <p>Actividad de manualidades realizado por nuestros beneficiarios.</p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
                            <figure>
                                <img src="img/fachada.jpeg" class="img-responsive">
                                <figcaption>
                                    <h2>Fachada Principal</h2>
                                    <p>Fachada principal de la Asociación Centro Diurno de Atención a Ciudadanos de la
                                        Tercera Edad de Santa Cruz.</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fin portafolio -->
            <!-- sobre nosotr5os -->
            <section id="sobrenosotros" class="section-padding wow fadeInUp delay-05s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15">Reseña Histórica </h2>
                            <p class="sub-title pad-bt15">Esta Organización fue fundada el 30 de Abril de 1986, fue
                                creado con el fin de atender a algunos adultos mayores de la región, personas de escasos
                                recursos económicos y carentes de familiares que procuraran su cuido y bienestar, y con
                                ello ofrecerles condiciones y características de un ambiente familiar sano como:
                                alimentación, actividades recreativas, coordinación con entidades que también procuran
                                mejorar su salud como la Caja Costarricense del Seguro
                                Social, Tribunales de Justicia, IMAS, Junta de Protección Social, CONAPAM, que procuran
                                el mejoramiento de la calidad de vida en general.</p>
                            <div class="col-md-12 text-center">
                                <img src="img/old.jpg" class="img-responsive"><br>
                            </div>
                            <hr class="bottom-line">
                        </div>
                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15">Razón de Ser</h2>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="sub-title pad-bt15">Esta Organización de Bienestar Social del Cantón de Santa
                                Cruz, nace a raíz del incremento de la población adulta mayor, pues este cantón cuenta
                                con más de 45000 mil habitantes y con excelentes expectativas de vida, por lo que por
                                razones obvias en un futuro se necesitara del servicio de este centro de forma efectiva
                                y oportuna para satisfacer las necesidades prioritarias de esta población especifica.
                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="sub-title pad-bt15">Se justifica la existencia de este Centro Diurno por el
                                aumento de adultos mayores sin familia de muy escasos recursos que velen por brindarles
                                atención básica, como es la alimentación, servicio de salud, recreación, proporcionar
                                la socialización entre ellos. Cada día nuestra población se está envejeciendo para lo
                                que se ofrece en Santa Cruz una repuesta a los retos de los próximos años. La idea de
                                este lugar es que cada vez menos adultos mayores ocupen
                                los servicios de hogares de ancianos donde estén las personas postradas.</p>
                        </div>
                        <hr class="bottom-line">

                        <div class="col-md-6 text-center">
                            <h2 class="service-title pad-bt15">Misión</h2>
                            <p class="sub-title pad-bt15">Es una organización que promueve la satisfacción de
                                necesidades prioritarias de la atención y cuido de las personas adultas mayores,
                                beneficiados, para mejorar la calidad de vida.</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="service-title pad-bt15">Visión</h2>
                            <p class="sub-title pad-bt15">Ser una organización sólida y eficaz que contribuya al
                                bienestar de las personas adultas mayores, para que sean capaz de adaptarse a los
                                cambios socioculturales, psicológicos y económicos del futuro.</p>
                        </div>
                        <hr class="bottom-line">

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="wrap-item text-center">
                                <div class="item-img">
                                    <img src="img/jps.png">
                                </div>
                                <h3 class="pad-bt15">Junta de Protección Social</h3>
                                <p>La Junta de Protección Social contribuye con la salud pública, el bienestar y la
                                    calidad de vida de las poblaciones en pobreza y vulnerabilidad social.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="wrap-item text-center">
                                <div class="item-img">
                                    <img src="img/conapam.png">
                                </div>
                                <h3 class="pad-bt15">CONAPAM</h3>
                                <p>Órgano rector en materia de envejecimiento y vejez en Costa Rica, con fundamento
                                    jurídico en la Ley Integral para la Persona Adulta Mayor.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="wrap-item text-center">
                                <div class="item-img">
                                    <img src="img/Imas-logo 2.png">
                                </div>
                                <h3 class="pad-bt15">IMAS</h3>
                                <p>En el IMAS trabajamos para resolver el problema de la pobreza extrema en el país,
                                    para lo cual planeamos, dirigimos, ejecutamos y controlamos un plan nacional
                                    destinado a dicho fin.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="wrap-item text-center">
                                <div class="item-img">
                                    <img src="img/ccss.png">
                                </div>
                                <h3 class="pad-bt15">Caja Costarricense del Seguro Social</h3>
                                <p>Proporcionar los servicios de salud en forma integral al individuo, la familia y la
                                    comunidad y otorgar la protección económica, social y de pensiones, conforme la
                                    legislación vigente, a la población.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <br>
        </div>
        </section>

        <!-- fin sobre nosostros -->

        <!-- contactos -->
        <section id="contactos" class="section-padding wow fadeInUp delay-05s">
            <div class="fcontacto">
                <div class="bg-color2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center white">
                                <h2 class="service-title pad-bt15">Póngase en Contacto con Nosotros</h2>
                                <p class="sub-title pad-bt15">Puedes ponerte en contacto con nosotros por diferentes
                                    medios, será un gusto atenderte.</p>
                                <hr class="bottom-line white-bg">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="loction-info white">
                                    <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>De los tribunales de
                                        justicia 600 sur y 25mts <br> oeste a un costado de las oficinas del Inder</p>
                                    <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>tercerast@gmail.com</p>
                                    <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>2680-1569</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="contact-form">
                                    <div id="sendmessage">Tu mensaje fue enviado. Gracias!</div>
                                    <div id="errormessage"></div>
                                    <form action="https://formspree.io/f/myyoazkp"
                                    method="POST" class="contactForm">
                                    @csrf
                                        <div class="col-md-6 padding-right-zero">
                                            <div class="form-group">
                                                <input type="text" name="nombre" class="form-control" id="nombre"
                                                    placeholder="Tu Nombre" data-rule="minlen:4"
                                                    data-msg="Por favor, ingresa como minimo 4 caracteres" />
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Tu Correo" data-rule="email"
                                                    data-msg="Por favor, ingresa un correo valido" />
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                                    data-msg="Por favor, escribe algo para nosotros"
                                                    placeholder="Mensaje"></textarea>
                                                <div class="validation"></div>
                                            </div>
                                            <input  class="btn btn-primary btn-submit" type="submit" value="Enviar" id="boton">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="bottom-line white-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center white">
                                <div class="loction-info white">
                                    <p>Seguinos en: <a
                                            href="https://www.facebook.com/Centro-Diurno-Tercera-Edad-Santa-Cruz-281277086047970"
                                            data-placement="top" title="Facebook"><i
                                                class="fa fa-facebook fa-2x"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin contactos -->
        <!-- pie -->
        <footer id="footer">
            <div class="container">
                <div class="row text-center">
                    <p>&copy; ACDATESC. Derechos Reservados.</p>
                    <div class="credits">

                        Desarrollado con <i class="fa fa-heart fa-1x"></i> por estudiantes de la UNA</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- fin pie -->
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    </div>
</body>

</html>
