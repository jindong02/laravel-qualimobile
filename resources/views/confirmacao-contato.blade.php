@section('title', __('CONTATO'))
@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('HOME') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('contato') }}">{{ __('CONTATO') }}</a></li>
                <li class="breadcrumb-item active d-none d-lg-block" aria-current="page">{{ __('CONFIRMACA CONTATO') }}</li>
                <li class="breadcrumb-item d-block d-lg-none">{{ __('CONFIRMACA CONTATO') }}</li>
                <li class="breadcrumb-item d-block d-lg-none" aria-current="page"><a href="tel:+551124210080">{{ __('(11) 2421-0080') }}</a></li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-0 py-lg-3 mt-8">
    <div id="orcamento" class="container py-5">
        <h1 class="text-center">Mensagem enviada!</h1>
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