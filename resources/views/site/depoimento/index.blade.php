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

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Artigos & Receitas" href="/blog">Artigos & Receitas</a>
                            </li>

                            <li class="current_page_item">
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
                        <h1 class="l-head"> Depoimentos
                            </h1>
                        <ul class="breadcrumbs_content-2 ">
                            <li><a href="/" title="home">Home</a> /</li>
                            <li><span>Depoimentos</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rafaa-section contactus-page depoimentos">
        <div class="container">

            <div class="row">
                <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12 offset-sm-0 col-12">
                    <div class="wrap_contact_page">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                    @endif

                        <div class="rq-wrap-form">
                            <form action="depoimentos" method="POST" class="tp-form-1" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                                <div class="row">

                                    <div class="col-12">
                                        <div class="centralizarImagem">
                                            <span class="employee_img">
                                                <img id="blah" src="/storage/images/perfil/default.jpg">
                                            </span>
                                        </div>

                                        <div class="centralizarImagem">
                                            <div class="fileupload btn btn-success">
                                                <span>Carregar Foto</span>
                                                <input type="file" name="photo" class="upload" onchange="readURL(this);" />
                                            </div>
                                        </div>

                                        <div class="centralizarTexto" >
                                            @if ($errors->has('photo'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 col-form-right">

                                        @if ($errors->has('name'))
                                            <span class="text-red">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <p class="tp-form-el">
                                            <input type="text" name="name" value="{{ old('name') }}" class="tp-feild" placeholder="Nome completo *" maxlength="30" required>
                                        </p>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 col-form-left">
                                        
                                        @if ($errors->has('city'))
                                            <span class="text-red">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                        <p class="tp-form-el">
                                            <input type="text" name="city" value="{{ old('city') }}" class="tp-feild" placeholder="Cidade *" maxlength="25" required>
                                        </p>

                                    </div>
                                    <div class="col-12">
                                        @if ($errors->has('comment'))
                                            <span class="text-red">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif
                                        <p class="tp-form-el">
                                            <textarea name="comment" value="{{ old('comment') }}" class="tp-message" placeholder="Seu depoimento deverá conter no máximo 160 caracteres." maxlength="160" required></textarea>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="tp-wrap-btn">
                                            <button type="submit" class="sendmessage_btn" id="tp-submit">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rafaa-section r-what-offers">
        <div class="container">
            <div class="row">
                
                @foreach ($testimonies as $testimonie)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="wrap_service_2 services_index_4 ">
                            <div class="head-servcie">
                                <span class="tesmonail_img">
                                    <img src="/storage/{{ $testimonie->photo }}" alt="{{ $testimonie->name }}">
                                </span>
                                <h3>{{ $testimonie->name }}</h3>
                                <p>{{ $testimonie->city }}</p>
                            </div>
                            <div class="body-service">
                                <p>{{ $testimonie->comment }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>

            <ul class="wrap_pignation">
                {{ $testimonies->links() }}
            </ul>

        </div>
    </section>

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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

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