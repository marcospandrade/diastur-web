<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @IndicaTur }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    
    <!-- Styles -->
    <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">IndicaTur</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#conheca">Conheça-nos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#portfolio">Itinerários</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#time">Time</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Entrar') }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item nav-link js-scroll-trigger" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                                <a class="dropdown-item nav-link js-scroll-trigger" href="{{ route('register') }}">
                                    {{ __('Registrar') }}
                                </a>
                            </div>
                        </li>
                        @endguest
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item nav-link js-scroll-trigger" href="{{ url('/perfil') }}">
                                    {{ __('Perfil') }}
                                </a>

                                <a class="dropdown-item nav-link js-scroll-trigger" href="{{ route('logout') }}">
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Bem vindo ao IndicaTur!</div>
                    <div class="intro-heading text-uppercase">É muito bom conhecer você!</div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#conheca">Saiba mais</a>
                </div>
            </div>
        </header>

        <!-- Services -->
        <section id="conheca">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Conheça o Indicatur</h2>
                        <h3 class="section-subheading text-muted">Acompanhe nossos itinerários </h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Clube de indicações</h4>
                        <p class="text-muted">O IndicaTur tem como função principal fornecer um clube de indicações,
                            onde sua recomendação é bonificada. Leia mais sobre nosso Clube e faça parte!</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Blog de Promoções</h4>
                        <p class="text-muted">Acompanhe nosso blog com promoções de viagens e matérias sobre viagens de
                            turismo.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">Transfira seus pontos</h4>
                        <p class="text-muted">Nosso sistema permite que você possa transferir seus bônus para algum
                            indicado,
                            aumentando a chance de aproveitamento da bonificação.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Itinerario/portfolio Grid -->

        <section class="bg-light" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Itinerários</h2>
                        <h3 class="section-subheading text-muted">Conheça nossas rotas de serviço.</h3>
                    </div>
                </div>
                <div class="row al-center">
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>

                            <img class="img-fluid" src="{{asset('/images/portfolio/BeloHorizonte.jpg')}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Belo Horizonte</h4>
                            <p class="text-muted">Conheça nossas rotas.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{asset('/images/portfolio/CidadeSalvador.jpg')}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Salvador</h4>
                            <p class="text-muted">Temos rotas que acompanham os concursos públicos mais conhecidos. </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{asset('/images/portfolio/03-thumbnail.jpg') }}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>São Paulo</h4>
                            <p class="text-muted">Nossas rotas incluem as grandes capitais</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{asset('/images/portfolio/04-thumbnail.jpg')}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Maringá</h4>
                            <p class="text-muted">Trabalhamos também com o Sul do país</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{asset('/images/portfolio/05-thumbnail.jpg')}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Curitiba</h4>
                            <p class="text-muted">Conheça a capital da Rússia Brasileira</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{asset('/images/portfolio/06-thumbnail.jpg')}}" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>Brasília</h4>
                            <p class="text-muted">Também podemos acompanhar sobre</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About -->
        <section id="sobre">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Sobre</h2>
                        <h3 class="section-subheading text-muted">Conheça um pouco sobre nossa história.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{asset('/images/about/1.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>2009-2011</h4>
                                        <h4 class="subheading">Nosso começo</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui
                                            quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore
                                            laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{asset('/images/about/2.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>March 2011</h4>
                                        <h4 class="subheading">A agencia nasceu</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui
                                            quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore
                                            laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{asset('/images/about/3.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>December 2012</h4>
                                        <h4 class="subheading">Nosso primeiro serviço full-stack</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui
                                            quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore
                                            laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{asset('/images/about/4.jpg')}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>July 2014</h4>
                                        <h4 class="subheading">Fase 2: Expansão</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui
                                            quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore
                                            laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Faça parte
                                        <br>Da nossa
                                        <br>Historia!</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="bg-light" id="time">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Nosso time</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row al-center">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('/images/team/2.jpg')}}" alt="">
                            <h4>Wagão</h4>
                            <p class="text-muted">Lider Design</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('/images/team/3.jpg')}}" alt="">
                            <h4>Iza</h4>
                            <p class="text-muted">Lider de desenvolvimento</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-btn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
                            eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut
                            unde.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="{{asset('/images/logos/envato.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="{{asset('/images/logos/designmodo.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="{{asset('/images/logos/themeforest.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="{{asset('/images/logos/creative-market.jpg')}}"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Contate-nos</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" name="sentMessage" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" type="text" placeholder="Nome *" required="required"
                                            data-validation-required-message="Por favor, insira seu nome.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="email" type="email" placeholder="Email *"
                                            required="required" data-validation-required-message="Por favor insira seu email.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="phone" type="tel" placeholder="Telefone *"
                                            required="required" data-validation-required-message="Por favor, insira seu telefone.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Mensagem *" required="required"
                                            data-validation-required-message="Por favor, insira sua mensagem."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envie
                                        sua mensagem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Wooser corporation 2018</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li class="list-inline-item">
                                <a href="#">Política de privacidade</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Termos de uso</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Portfolio Modals -->

        <!-- Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Belo Horizonte</h2>
                                    <p class="item-intro text-muted">Viagem para Belo Horizonte no valor de R$ 160,00
                                        reais.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/BeloHorizonte.jpg')}}"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Salvador - BA</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/CidadeSalvador.jpg')}}"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3 -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/03-full.jpg')}}"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 4 -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/04-full.jpg')}}"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 5 -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/05-full.jpg')}}"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 6 -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="{{asset('/images/portfolio/06-full.jpg')}}img/portfolio/06-full.jpg"
                                        alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos
                                        deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate,
                                        maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/script.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/vendor/jquery-easing/jquery.easing.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/vendor/jquery/jquery.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</body>
</html>