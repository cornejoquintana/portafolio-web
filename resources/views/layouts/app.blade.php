<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel Blog</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Article-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Article-List.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Projects-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Projects-Horizontal.css') }}">

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="{{ route('home') }}">Iván Cornejo Quintana</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Proyectos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><strong>Blog</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">CV</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><strong>Contáctame</strong></a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" title="login">
                                <i class="fa fa-sign-in"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" title="create a new account">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        @if( Auth::user()->isAdmin() or Auth::user()->isStaff() )
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.store') }}" title="Admin">
                                    <i class="fa fa-shield"></i>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" title="logout" class="no-underline hover:underline" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Salir <i class="fa fa-sign-out"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>




    <main class="page lanidng-page">
        @yield('content')
    </main>
    <footer class="footer-clean">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3><strong>Aviso legal y política de privacidad</strong><br></h3>
                    <ul>
                        <li><a href="#"><strong>Términos y condiciones</strong><br></a></li>
                        <li><a href="#"><strong>Política de privacidad</strong><br></a></li>
                        <li><a href="#"><strong>Cookie Policy (US)</strong><br></a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3><strong>Datos de contacto</strong><br></h3>
                    <ul>
                        <li><a href="#">Iván Cornejo Quintana</a></li>
                        <li><a href="tel:+52722-403-1033">+52 722 403 1033<br /></a></li>
                        <li><a href="mailto:cornejo.quintana@outlook.com">cornejo.quintana@outlook.com<br /></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social">
                    <a href="#">
                        <i class="icon ion-social-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="icon ion-social-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="icon ion-social-github"></i>
                    </a>
                    <a href="#">
                        <i class="icon ion-social-linkedin"></i>
                    </a>
                    <p class="copyright">Iván Cornejo Quintana © 2021</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>
