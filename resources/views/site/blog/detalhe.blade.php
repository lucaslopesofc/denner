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
                        @foreach ($infos as $info)
                            <a href="/" title="Denner Grillo">       
                                <img src="/storage/{{ $info->logo }}" alt="Denner Grillo" class="tp_whitelogo">
                            </a>
                        @endforeach
                        <span class="phone_menu  primary-color">
                            <i class="fas fa-bars"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12 col-12">
                    <nav class="tp-menu tagpoint-menu-3">
                        <ul class="tagpoint-main-menu ">

                            <li>
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

                            <li class="current_page_item">
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

    <!-- breadcrumbs -->
    <section class="rafaa-section r-breadcurmbs-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrap_breadcrumbs_col-2">
                        
                        <h1 class="l-head">{!! $blog->title !!}</h1>
                        <ul class="breadcrumbs_content-2 ">
                            <li><a href="/" title="home">Home</a> /</li>
                            <li><span>{!! $blog->catName !!}</span> /</li>
                            <li><span>{!! $blog->title !!}</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="rafaa-section blog-details ">
        <div class="container">
            <div class="row">
                <!-- blogs content -->
                <div class="col-lg-9 col-12">
                    <div class="wrap_blog_details">
                        
                        <article class="r-article">
                            <div class="blog-thumbnail">
                                <img src="/storage/{!! $blog->image !!}" />
                            </div>
                            <ul class="article_meta single_page">
                                <li><span class="tp_date">{!! Carbon\Carbon::parse($blog->updated_at)->format('d/m/Y H:i') !!}</span> |</li>
                                <li><span class="author_date">by {!! $blog->userName !!}</span> |</li>
                                <li><span> <i class="bx bx-message-alt"></i> {!! count($comment) !!} Comentários</span> </li>
                            </ul>
                            <h2 class="article_title">{!! $blog->title !!}</h2>
                            <p>{!! $blog->text !!}</p>
                        </article>

                        <div class="comment-box">
                            <!-- list of comments ====  -->
                            <div class="list-commetns">
                                <h3 class="count-comments "><strong>{!! count($comment) !!}</strong>comentários</h3>
                                <ul class="list-comments">                                    
                                    
                                    @foreach ($comment as $c)
                                    <li>
                                        <div class="row row-comment">
                                            <div class="col-lg-2 col-md-2 col-3  col-comment-img">
                                                <div class="comment-img"><img src="/storage/images/perfil/default.jpg" alt="image title"></div>
                                            </div>
                                            <div class="col-md-10 col-9 ">
                                                <div class="comment-text">
                                                    <div class="comment-head">
                                                        <h5 class=" comment-name">{!! $c->name !!}</h5>
                                                        <span class="comment_date">{{ Carbon\Carbon::parse($c->created_at)->format('d/m/Y H:i') }}</span>
                                                    </div>
                                                    <p class="comment-para">{!! $c->comment !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>                                  
                                    @endforeach
                                </ul>
                            </div>

                            <!-- leave comment form ==== -->
                            <div class="leave-comment" id="comment">
                                <h3 class="count-comments ">Deixe o seu comentário.</h3>
                                <form action="#" class="comment-form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12 ">
                                            <p class="comment-feild">
                                                <label for="commentname">Nome :</label>
                                                <input type="text" name="comment-name" id="commentname">
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 ">
                                            <p class="comment-feild">
                                                <label for="commentemail">Email :</label>
                                                <input type="text" name="comment-name" id="commentemail">
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="comment-feild">
                                                <textarea name="comment" id="commentid" placeholder="Escreva seu comentário aqui...."></textarea>
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p class="comment-feil">
                                                <button type="submit" name="comment" class="btn-comment">Enviar</button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--right sidebar -->
                <div class="col-lg-3 col-12">
                    <div class="wrap_sidebar_content">

                        <div class="widget tp_widget recent_posts">
                            <div class="head_widget">
                                <h3 class="rq-meduim-title">Últimos Posts</h3>
                            </div>
                            <div class="content_widget ">
                                <ul class="posts_list">

                                    @foreach ($latest as $lat)
                                    <li>
                                        <span class="wrap_image">
                                        <img src="/storage/{!! $lat->image !!}" alt="{!! $lat->title !!}">
                                    </span>
                                        <div class="rpost_content">
                                            <h3><a href="#" title="{!! $lat->title !!}">{!! $lat->title !!}</a></h3>
                                            <span class="rp_date">{{ Carbon\Carbon::parse($lat->updated_at)->format('d/m/Y H:i') }}</span>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    @foreach ($infos as $info)
    <footer class="rafaa-section rp-footer rp-footer-3">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="wrap_footer_col">
                        <img src="/storage/{{ $info->logo }}" alt="Raqeeb Template">
                        <p>{{ $info->desc }}</p>
                        <ul class="footer_sicons">
                            <li>
                                <a href="{{ $info->facebook }}" target="_blank" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li>
                                <a href="{{ $info->instagram }}" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="wrap_footer_col footer_address">
                        <h3 class="footer-head ">Localização</h3>
                        <p>{{ $info->street }}, n°{{ $info->number }}, {{ $info->neighborhood }}</p>
                        <p>{{ $info->city }}</p>
                        <p><a href="mailto:{{ $info->email }}" title="mailto"><i class="far fa-envelope"></i> {{ $info->email }}</a></p>
                        <p><a href="#"><i class="fas fa-phone"></i> {{ $info->telephone }}</a></p>
                        <p><a href="#"><i class="fas fa-mobile-alt"></i> {{ $info->cellphone }}</a></p>
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
                            <li><a href="/depoimentos" title="Depoimentos">Depoimentos</a></li>
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
    @endforeach

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