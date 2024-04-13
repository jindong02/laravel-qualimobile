@section('title', __('CONTATO'))
@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('HOME') }}</a></li>
                <li class="breadcrumb-item active d-none d-lg-block" aria-current="page">{{ __('CONTATO') }}</li>
                <li class="breadcrumb-item d-block d-lg-none">{{ __('CONTATO') }}</li>
                <li class="breadcrumb-item d-block d-lg-none" aria-current="page"><a href="tel:+551124210080">{{ __('(11) 2421-0080') }}</a></li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-0 py-lg-3 mt-8">
    <div id="orcamento" class="container">
        <form method="POST" action="{{ route('ContatoPost') }}">
            @csrf
            <div class="row px-lg-5 px-1 py-4 text-dark align-items-center justify-content-center">
                @include('layouts.message')

                <h3 class="mt-3 mb-4 fw-semi-bold text-dark text-center">
                    {{ __('Entre em contato com a gente') }}
                </h3>

                <p class="mt-3 mb-4  fs-0 fw-medium text-dark text-center">
                    {{ __('Preencha o formulário abaixo para entrar em contato com a QualiMobile, em breve nossa equipe entrará em contato com você.') }}
                </p>

                <div class="col-12">
                    <input type="text" name="nome" class="form-control form-control-lg mb-4" placeholder="NOME" required="">
                </div>                        

                <div class="col-6">
                    <input type="email" name="email" class="form-control form-control-lg mb-4" placeholder="E-mail" required="">
                </div>

                <div class="col-6">
                    <input type="text" name="telefone" class="form-control form-control-lg mb-4" placeholder="Telefone" required="">
                </div>                    

                <div class="col-12">
                    <textarea class="form-control form-control-lg mt-4" name="mensagem" rows="4" cols="50" placeholder="MENSAGEM" required=""></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-info rounded-0 py-lg-3 py-2 px-4 fs--1 text-uppercase mt-4 w-100">
                        <div class="d-flex justify-content-lg-between justify-content-center">
                            <span class="">Enviar</span>
                            <span class="d-none d-lg-block"><img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='5.207' height='9.414' viewBox='0 0 5.207 9.414'%3E%3Cpath id='Caminho_24' data-name='Caminho 24' d='M1130.616-30.677l4,4,4-4' transform='translate(31.384 1139.323) rotate(-90)' fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1'/%3E%3C/svg%3E%0A"></span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="py-lg-5 py-3">
    <div class="row align-items-center justify-content-center g-0">
        <div class="col-lg-6 col-11">
            <div class="row">
                <div class="col-lg-6 col-12 order-lg-0 order-1 px-lg-0 px-5">
                    <p class="mb-4 text-uppercase fs-1 fw-semi-bold text-dark mt-lg-0 mt-5">
                        {{ config('config.cidade') }}
                    </p>
                    <p class="mb-4 fs-0 fw-medium text-dark">
                        {{ config('config.email') }}
                        <br>
                        {{ config('config.telefone') }}
                    </p>
                    <p class="mb-4 fs-0 fw-medium text-dark">
                        {{ config('config.endereco') }}
                    </p>
                    <div class="text-center text-lg-start ">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode(config('config.endereco')) }}" target="_blank" class="btn btn-light rounded-0 p-3 px-lg-4 px-5 fs--1  text-uppercase icon-arrow-bottom">
                            {{ __('Mostrar mapa') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12  order-lg-1 order-0 ">
                    <div class="img-contato-n"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection