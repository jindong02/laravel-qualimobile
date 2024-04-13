<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

    <head>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5G494H2');</script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ Config::get('config.nome_site') }} - @yield('title')</title>
        <meta name="description" content="{{ Config::get('config.descricao') }}">
        <meta name="keywords" content="{{ Config::get('config.keywords') }}">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
        <meta name="bingbot" content="index, follow">
        <meta name="google" content="notranslate">
        <meta name="theme-color" content="#ffffff">

        <link rel="preload stylesheet" href="{{ url('assets/css/theme.css') }}" as="style" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <style>
            .whatsapp-link {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 40px;
                right: 40px;
                background-color: #25d366;
                color: #fff;
                border-radius: 50px;
                text-align: center;
                font-size: 30px;
                box-shadow: 1px 1px 2px #888;
                z-index: 1000;
            }

            .fa-whatsapp {
                margin-top: 16px;
            }

            .loja {
                background-color: #ff00ff;
                opacity: 0.8;
                border-radius: 2px;
                color: rgb(255, 255, 255)
                text-align: left;
                vertical-align: middle;
                padding-top: 4 !important;
                margin: 10 auto; 
                width:100% ;  
                box-shadow: 2px 2px 2px #000000;              
                animation-name: example;
                animation-duration: 4s;
                animation-iteration-count: infinite;
            }

            @keyframes example {
                0%   {background-color:#ff00ff;}
                50%  {background-color:blue;}
                100% {background-color:#ff00ff;}
            }
        </style>
        @stack('styles')

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5df96b4d43be710e1d228a60/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

    </head>
    <body>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5G494H2"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

        <main class="main" id="top">

            <span class="screen-darken"></span>

            <div id="containerDesktop" class="bg-primary navbar navbar-expand-lg navbar-dark fixed-top py-3 d-flex d-lg-none" data-navbar-on-scroll="data-navbar-on-scroll">

                <a class="navbar-brand logo align-content-center order-1 order-sm-1 order-lg-0 pe-1 me-0" href="{{ route('index') }}">
                    <img alt="Logo Mobile" src="{{ url('assets/svg/logo-white.svg') }}" width="144" height="100%">
                </a>
                <button data-trigger="navbar_main" class="navbar-toggler collapsed" type="button" >
                    <span class="navbar-toggler-icon">
                    </span>
                </button>

                <div class="btn-group order-2 order-sm-2 order-lg-0 d-block d-lg-none">
                    <a href="{{ route('contato') }}" class="btn btn-link text-white text-uppercase pe-0"  style="font-size: 12px;text-decoration: auto;">
                        CONTATO
                    </a>
                </div>
            </div>

            @include((Route::currentRouteName() == "index")? 'layouts.navbar_main' : 'layouts.navbar')

            @yield('content')

            @include('layouts.footer')

            <a class="whatsapp-link" href="https://api.whatsapp.com/send?phone=5511997082039" target="_blank">
                <i class="fa fa-whatsapp"></i>
            </a>

        </main>
        <script src="{{ url('vendors/@popperjs/popper.min.js') }}"></script>
        <script src="{{ url('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>

        @stack('scripts')
    </body>

</html>