<!doctype html >
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Denner Grillo</title>

    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('vendor/site/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/site/css/bootstrap.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/all.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/owl.carousel.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/light-box.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/tp-animation.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/style.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('vendor/site/css/responsive.css') }}" media="all">
</head>

<body>

    <!-- perload section -->
    <div id="preloader">
        <div id="preloader-inner"></div>
    </div>

    <!-- header section -->
    <header class="tp-main-menu header-menu-3 sticky-header">
        <div class="container">
            <div class="row row_menu_2">
                <div class="col-lg-2 col-md-12 col-12 col-logo-3">
                    <div class="tagpoint-wrap-logo ">
                        <a href="/" title="Denner Grillo">       
                            <img src="{{ asset('vendor/site/images/logo.png') }}" alt="Denner Grillo" class="tp_whitelogo">
                        </a>
                        <span class="phone_menu  primary-color">
                            <i class="fas fa-bars"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12 col-12">
                    <nav class="tp-menu tagpoint-menu-3">
                        <ul class="tagpoint-main-menu ">

                            <li class="current_page_item">
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Home" href="/">Home</a>
                            </li>

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Denner Grillo" href="/sobremim">Denner Grillo</a>
                            </li>

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Serviços" href="/servicos">Serviços</a>
                            </li>

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Artigos & Receitas" href="/blog">Artigos & Receitas</a>
                            </li>

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Depoimentos" href="/depoimentos">Depoimentos</a>
                            </li>

                            <li>
                                <i class="  fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Contato" href="/contato">Contato</a>
                            </li>
                            <li class="wrap_phone request_qoute">
                                <a href="http://bit.ly/NutricionistaDennerGrillo" target="_blank" title="Marque Sua Consulta" class="request_qoute">MARQUE SUA CONSULTA<i class="fas fa-external-link-alt"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="rafaa-slider rafaa-slider-2 index-5">
        <div class="owl-carousel r_slider" data-dots="off">
            <div class="r_wrap_slider">
                <div class="r_slider_img" style="background-image:url({{ asset('vendor/site/images/slider1.jpg') }})"></div>
            </div>
            <div class="r_wrap_slider">
                <div class="r_slider_img" style="background-image:url({{ asset('vendor/site/images/slider2.jpg') }})"></div>
            </div>
            <div class="r_wrap_slider">
                <div class="r_slider_img" style="background-image:url({{ asset('vendor/site/images/slider3.jpg') }})"></div>
            </div>
        </div>
    </section>

    <div class="rafaa-section r-about-us-3">
        <div class="container container-sobre-mim">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 ">
                    <div class="wrap_about_us">
                        <span class="rp-tip">Sobre Mim</span>
                        <h2 class="l-head">Denner Grillo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 ">
                    <div class="feature-service-img-denner">
                        <img src="{{ asset('vendor/site/images/denner.png') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature services -->

    <!-- lasts blogs -->
    <section class="rafaa-section last_news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="last-news-title">
                        <h2 class="l-head">Artigos & Receitas</h2>
                        <p>Às vezes bate aquela vontade de fugir da dieta, não é? Você pode!
                        	<br>Veja aqui receitas práticas e fáceis para fugir da rotina!</p>
                    </div>
                    <div class="carousel-blogs owl-carousel">

                        <div class="wrap_blog">
                            <div class="wrap-blog-img">
                                <img src="{{ asset('vendor/site/images/stronda.jpg') }}" alt="blog title" />
                            </div>
                            <div class="wrap-blog-text">
                                <h2><a href="#" title="blog title">Título da Postagem 1</a></h2>
                                <ul class="r-datameta">
                                    <li><a href="#" title="author name" class="r-author"><i class="fas fa-user"></i>Denner Grillo</a></li>
                                    <li><span class="r-data"><i class="fas fa-clock"></i>Janeiro 25,2019</span></li>
                                </ul>
                                <p>Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p>
                                <div class="ream_more"><a href="#">Leia mais</a></div>
                            </div>
                        </div>

                        <div class="wrap_blog">
                            <div class="wrap-blog-img">
                                <img src="{{ asset('vendor/site/images/stronda.jpg') }}" alt="blog title" />
                            </div>
                            <div class="wrap-blog-text">
                                <h2><a href="#" title="blog title">Título da Postagem 2</a></h2>
                                <ul class="r-datameta">
                                    <li><a href="#" title="author name" class="r-author"><i class="fas fa-user"></i>Denner Grillo</a></li>
                                    <li><span class="r-data"><i class="fas fa-clock"></i>Janeiro 25,2019</span></li>
                                </ul>
                                <p>Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p>
                                <div class="ream_more"><a href="#">Leia mais</a></div>
                            </div>
                        </div>

                        <div class="wrap_blog">
                            <div class="wrap-blog-img">
                                <img src="{{ asset('vendor/site/images/stronda.jpg') }}" alt="blog title" />
                            </div>
                            <div class="wrap-blog-text">
                                <h2><a href="#" title="blog title">Título da Postagem 3</a></h2>
                                <ul class="r-datameta">
                                    <li><a href="#" title="author name" class="r-author"><i class="fas fa-user"></i>Denner Grillo</a></li>
                                    <li><span class="r-data"><i class="fas fa-clock"></i>Janeiro 25,2019</span></li>
                                </ul>
                                <p>Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p>
                                <div class="ream_more"><a href="#">Leia mais</a></div>
                            </div>
                        </div>

                        <div class="wrap_blog">
                            <div class="wrap-blog-img">
                                <img src="{{ asset('vendor/site/images/stronda.jpg') }}" alt="blog title" />
                            </div>
                            <div class="wrap-blog-text">
                                <h2><a href="#" title="blog title">Título da Postagem 4</a></h2>
                                <ul class="r-datameta">
                                    <li><a href="#" title="author name" class="r-author"><i class="fas fa-user"></i>Denner Grillo</a></li>
                                    <li><span class="r-data"><i class="fas fa-clock"></i>Janeiro 25,2019</span></li>
                                </ul>
                                <p>Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt.</p>
                                <div class="ream_more"><a href="#">Leia mais</a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rafaa-section r-testmonail-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrap_testmoinal_title">
                        <h2 class="l-head">Relatos de Pacientes</h2>
                        <p>Leia alguns comentários de pacientes que já consultaram comigo!
                        	<br>Avalie meu trabalho e me ajude a melhorar também!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tesmonails-section">
        <div class="container">
            <div class="row row-testmonail">
                <div class="col-12">
                    <div class="wrap_tesmonails owl-carousel" data-show="3">
                    
                        @foreach ($testimonies as $testimonie)
                            @if ($testimonie->status == 1)
                            <div class="testmonail_2">
                                <div class="test_head">
                                    <span class="tesmonail_img"><img src="/storage/{{ $testimonie->photo }}" alt="{{ $testimonie->name }}" /></span>
                                    <div class="test_text">
                                        <h3>{{ $testimonie->name }}</h3>
                                        <p>{{ $testimonie->city }}</p>
                                    </div>
                                </div>
                                <div class="test_body">
                                    <p>{{ $testimonie->comment }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <a href="/depoimentos" class="checkout_features">Envie o seu depoimento</a>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="rafaa-section rp-footer rp-footer-3">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="wrap_footer_col">
                        <img src="{{ asset('vendor/site/images/logo.png') }}" alt="Raqeeb Template">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor ut labore et dolore magna aliqua ut enim. </p>
                        <ul class="footer_sicons">
                            <li>
                                <a href="https://www.facebook.com/denner.grillo" target="_blank" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li>
                                <a href="https://instagram.com/dennergrillonutri/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="wrap_footer_col footer_address">
                        <h3 class="footer-head ">Localização</h3>
                        <p>Rua Paulo Ribeiro da Silva, n°52, Boa Esperança</p>
                        <p>Cachoeiro de Itapemirim</p>
                        <p><a href="mailto:dennergrillo@hotmail.com" title="mailto"><i class="far fa-envelope"></i> dennergrillo@hotmail.com</a></p>
                        <p><a href="#" title="+435-977-3779"><i class="fas fa-phone"></i> (28) 3521-2881</a></p>
                        <p><a href="#" title="+435-977-3779"><i class="fas fa-mobile-alt"></i> (28) 9 9901-0528</a></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8 col-sm-12 col-12">
                    <div class="wrap_footer_col footer_address">
                        <h3 class="footer-head ">Horários</h3>
                        <p>Para agendamentos ligue para os números ao lado ou pelo whatsapp.</p>
                        <p><b>Segunda a sexta-feira:</b> 07:00 às 20:00</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-12 col-12">
                    <div class="wrap_footer_col footer_col_links">
                        <h3 class="footer-head ">Links</h3>
                        <ul class="footer_list">
                            <li><a href="/" title="Home">Home</a></li>
                            <li><a href="/sobremim" title="Denner Grillo">Denner Grillo</a></li>
                            <li><a href="/servicos" title="Serviços">Serviços</a></li>
                            <li><a href="/blog" title="Artigos & Receitas">Artigos & Receitas</a></li>
                            <li><a href="/depoimentos" title="Depoimentos">Na Mídia</a></li>
                            <li><a href="/contato" title="Contato">Contato</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row copywright_row">
                <div class="col-lg-7 col-md-7 col-12 ">
                    <p class="copywright">Todos os direitos reservados - Copyright © 2018
                        <a href="/">Denner Grillo</a>
                    </p>
                </div>
                <div class="col-5 col-md-5 col-12">
                    <ul class="privacy_list ">
                        <p class="copywright">Desenvolvido por: <a href="https://www.facebook.com/luc4slopes" target="_blank">Lucas Lopes</a></p>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- js library including -->
    <script src="{{ asset('vendor/site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/site/js/odometer.min.js') }}"></script>
    <script src="{{ asset('vendor/site/js/chartjs.js') }}"></script>
    <script src="{{ asset('vendor/site/js/progressbar.min.js') }}"></script>
    <script src="{{ asset('vendor/site/js/noframework.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/site/js/light-box.js') }}"></script>
    <script src="{{ asset('vendor/site/js/index.js') }}"></script>
</body>

</html>