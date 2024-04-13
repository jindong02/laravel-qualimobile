<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Administração - {{ config('config.nome_site') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/font/material-icon/materialdesignicons.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/font/font-awesome/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/plugin/submain.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/custom.css') }}">
        
        @stack('styles')
    </head>

    <body class="skin-blue sidebar-mini">
        <div class="main-page">
            <!-- Top bar -->
            @include('admin.layouts.topbar')
            <!-- ./ -->

            <!-- Left sidebar -->
            @include('admin.layouts.sidebar')
            <!-- ./ -->

            <div class="right-area content-wrapper">
                <div class="content-header">
                    @yield('content')

                    <!-- Footer -->
                    @include('admin.layouts.footer')
                    <!-- ./ -->
                </div>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>