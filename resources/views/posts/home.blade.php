@extends('..layouts.app')

@section('content')

    <section class="portfolio-block block-intro">
        <div class="container">
            <div class="avatar"
                style="background-image:url('https://www.cornejoquintana.com/storage/2021/08/IVAN-CORNEJO-QUINTANA-2-scaled.jpg');">
            </div>
            <div class="about-me">
                <p><strong>Hola, soy ivan.&nbsp;</strong>Ingeniero en Tecnologías de la Información, desarrollador de
                    software, me considero una persona apasionada por la tecnología y un curioso de la seguridad
                    informática. Algunas de las tecnologías con las que trabajo son:<br>#Java, #MySQL, #PHP, #Python,
                    #MongoDB, #JS #Android #Linux<br><br></p><a class="btn btn-outline-primary" role="button" href="#">Sobre
                    Mí</a>
            </div>
        </div>
    </section>
    <section class="projects-clean">
        <div class="container" data-aos="fade-left">
            <div class="intro">
                <h2 class="text-center">Proyectos</h2>
            </div>
            <div class="row projects">
                <div class="col-sm-6 col-lg-4 item">
                    <a class="action" href="#">
                        <img class="img-fluid"
                            src="{{ asset('assets/img/desk.jpg') }}" />
                    </a>
                    <a class="text-decoration-none" href="#">
                        <h3 class="name">Plataforma Digital Estatal Anticorrupción</h3>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-4 item">
                    <a class="action" href="#">
                        <img class="img-fluid"
                            src="{{ asset('assets/img/desk.jpg') }}" />
                    </a>
                    <a class="text-decoration-none" href="#">
                        <h3 class="name">Smart Business POS<br /></h3>
                    </a>
                </div>
            </div>
            <div class="col-md-12 text-center py-5"><a class="btn btn-outline-primary" role="button" href="#">Ver más</a>
            </div>
        </div>
    </section>
    <section class="portfolio-block skills">
        <div class="container" data-aos="fade-right">
            <div class="heading">
                <h2>Lo que me gusta hacer</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-ios-world"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Diseño y Desarrollo Web<br></h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-android-phone-portrait"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Desarrollo Móvil<br></h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-android-desktop"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Desarrollo para el escritorio<br></h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="article-list">
        <div class="container" data-aos="fade-left">
            <div class="intro">
                <h2 class="text-center"><strong>Publicaciones recientes</strong><br></h2>
            </div>
            <div class="row articles">
                @foreach ($posts as $post)
                    <div class="col-sm-6 col-md-4 item">
                        <a href="{{ route('posts.detail', $post->slug) }}">
                            @if ($post->outstanding_image != null && empty($post->outstanding_image) == false)
                                <img class="img-fluid" src="{{ asset('".$post->outstanding_image."') }}" />
                            @else
                                <img class="img-fluid" src="{{ asset('assets/img/beach.jpg') }}" />
                            @endif
                        </a>
                        <h3 class="name">{{ $post->title }}</h3>
                        @if ($post->excerpt != null && empty($post->excerpt) == false)
                            <p class="description">{{ $post->excerpt }} </p>
                        @else
                            <p class="description">{{ $post->get_limit_body }} </p>
                        @endif
                        <a class="action" href="{{ route('posts.detail', $post->slug) }}">
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center py-5">
                    <a class="btn btn-outline-primary" role="button" href="#">
                        Ver m&aacute;s
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
