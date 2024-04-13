<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Administração - {{ Config::get('config.nome_site') }}</title>

        <link rel="icon" type="image/png" href="{{ url('storage/bg/'. Config::get('config.favicon')) }}">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="{{ url('assets/admin/css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/font/font-awesome/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('assets/admin/css/custom.css') }}">

    </head>

    <body class="skin-blue sidebar-mini">

        <div class="log-in">
            <div class="container-login">
                <div class="wrap-login">
                    <form action="{{ route('admin.login') }}" method="POST" class="login-form validate-form">

                        @csrf

                        <span class="login-form-title p-b-48">
                            <img src="{{ url('assets/svg/logo-color.svg') }}">
                        </span>

                        <div class="log-head">
                            <h2 class="mb-3">Administração</h2>

                            @include('admin.layouts.message')

                        </div>

                        <div class="wrap-input validate-input">
                            <input type="text" class="form-control" placeholder="Login" name="login" value="{{ old('login') }}" required="">
                        </div>

                        <div class="wrap-input validate-input">
                            <input type="password" class="form-control" placeholder="Senha" name="password" required="">
                        </div>

                        <div class="container-login-form-btn">
                            <div class="wrap-login-form-btn">
                                <div class="login-form-bgbtn"></div>
                                <button type="submit" class="login-form-btn">
                                    Login
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <script src="{{ url('assets/admin/js/plugin/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/admin/js/plugin/popper.min.js') }}"></script>
        <script src="{{ url('assets/admin/js/plugin/bootstrap.min.js') }}"></script>

    </body>

</html>