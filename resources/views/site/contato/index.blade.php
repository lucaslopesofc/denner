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

                            <li>
                                <i class="fas fa-chevron-down tp_phone_dropdown"></i>
                                <a title="Depoimentos" href="/depoimentos">Depoimentos</a>
                            </li>

                            <li class="current_page_item">
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
                        <h1 class="l-head"> Contato
                            </h1>
                        <ul class="breadcrumbs_content-2 ">
                            <li><a href="/" title="home">Home</a> /</li>
                            <li><span>Contato</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rafaa-section contactus-page ">
        <div class="container">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12 offset-sm-0 col-12">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                    @endif

                    <div class="wrap_contact_page">
                        @foreach ($infos as $info)
                        <ul class="contact_list">
                            <li>
                                <span class="contact_icon"><i class="fas fa-fax"></i></span>
                                <h3>Fixo</h3>
                                <p>{{ $info->telephone }}</p>
                            </li>
                            <li>
                                <span class="contact_icon"><i class="fas fa-envelope"></i></span>
                                <h3>Email</h3>
                                <p>{{ $info->email }}</p>
                            </li>
                            <li>
                                <span class="contact_icon"><i class="fas fa-phone"></i></span>
                                <h3>Celular</h3>
                                <p>{{ $info->cellphone }}</p>
                            </li>
                        </ul>
                        @endforeach

                        <div class="rq-wrap-form ">
                            <form action="{{ route('contato.send') }}" method="POST" class="tp-form-1">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 col-form-left">
                                        <p class="tp-form-el">
                                            <input type="text" name="name" value="{{ old('name') }}" class="tp-feild tp-user-name" placeholder="Nome completo *" maxlength="100" required>
                                            @if ($errors->has('name'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p class="tp-form-el">
                                            <input type="email" name="email" value="{{ old('email') }}" class="tp-feild tp-email" placeholder="Email *" required>
                                            @if ($errors->has('email'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 col-form-left">
                                        <p class="tp-form-el">
                                            <input type="text" name="phone" value="{{ old('phone') }}" class="tp-feild tp-phone" placeholder="Telefone *" required>
                                            @if ($errors->has('phone'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                        <p class="tp-form-el">
                                            <input type="text" name="subject" value="{{ old('subject') }}" class="tp-feild tp-phone" placeholder="Assunto *" maxlength="30" required>
                                            @if ($errors->has('subject'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <p class="tp-form-el">
                                            <textarea name="message" class="tp-message" placeholder="Escreva sua mensagem..." maxlength="300" required>{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-red">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="tp-wrap-btn">
                                            <button type="submit" class="sendmessage_btn">Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="rq-map" id="rq-map"></div>
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
    function initMap() {
        var location = {lat: -20.8479802, lng: -41.155621};
        var map = new google.maps.Map(document.getElementById('rq-map'), {
            zoom: 17,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    } // close function here
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr_LcwNC56D7pvyaWGoqf9mqX8BprVM1Y&amp;callback=initMap" async defer></script>

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