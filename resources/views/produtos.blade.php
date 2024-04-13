@section('title', __('Produtos'))
@extends('layouts.app')
@push('styles')
    <link href="{{ url('vendors/OwlCarousel2/assets/owl.carousel.css') }}" rel="stylesheet" />
    <link href="{{ url('vendors/lightslider/lightslider.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<?php
    $segments = request()->segments();
    if (isset($segments[1])) {
        $menu = \App\Models\Menu::where('slug', $segments[1])->first();
    }
    if (isset($segments[2])) {
        $submenu = \App\Models\Submenu::where('slug', $segments[2])->first();
    }
?>

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7">
    <div class="container d-none d-sm-block">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-column flex-sm-row">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Início</a></li>
                @if (isset($menu) && $menu)
                    <li class="breadcrumb-item">
                        <a href="{{ route('produtos', ['main' => $menu->slug]) }}">
                            {{ $menu->name }}
                        </a>
                    </li>
                    @if (isset($submenu) && $submenu)
                    <li class="breadcrumb-item">
                        <a
                            href="{{ route('produtos', ['main' => $menu->slug, 'sub' => $submenu->slug]) }}">
                            {{ $submenu->name }}
                        </a>
                    </li>
                    @endif
                @endif
            </ol>
        </nav>
    </div>
</section>

<section class="pt-3 pt-sm-5 pb-4 pb-sm-8">
    <div class="container pt-4">
        <div class="d-flex justify-content-between align-items-center text-white">
            <div></div>
            <div class="text-gray-dark mt-0 ml-3">
                <a href="{{ url('storage/' . Config::get('config.catalogo')) }}" download=""
                    class="btn btn-info rounded-0 py-1 py-lg-2 px-2 px-lg-3 fs--2 fs-lg--1 text-uppercase icon-arrow-bottom">
                    {{ __('FAÇA O DOWNLOAD DO CATÁLOGO COMPLETO') }}
                    <img src="/assets/svg/icon-arrow-top.svg" class="ms-1">
                </a>
            </div>
        </div>
        <div class="border-bottom mt-3 mb-4"></div>
        <form method="GET"
            class="row align-self-center justify-content-between align-content-center align-items-center">
            <div class="col-6 col-lg-4 order-0">
                <h4 class="pb-0 mb-0 fw-bold text-dark">{{ isset($menu) && $menu ? $menu->name : __('PRODUTOS') }}</h4>
                @if (isset($submenu) && $submenu)
                    <span class="pb-0 mb-0 text-small text-dark">{{ $submenu->name }}</span>
                @endif
            </div>
            <div class="col-lg-5 col-12 order-3 order-lg-1 mt-3 mt-lg-0">
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <img src="/assets/svg/seach.svg" class="ms-0">
                        </div>
                    </div>
                    <input type="text" name="q" class="form-control-lg form-control border-0"
                        placeholder="{{ __('Nome do produto') }}" value="{{ request('q') }}" required>
                </div>
            </div>
            <div class="col-6 col-lg-3 order-1 order-lg-2">
                <input type="submit" class="btn btn-info rounded-0 filtro-btn" value=" {{ __('Buscar') }}">
            </div>
        </form>
    </div>
</section>

<section class="py-0 py-lg-3 ">
    <div class="container">
        <div class="border-top  my-4" style="border-top: 1px solid #eee !important;"></div>
        <div class="row ">
            @foreach ($produtos as $produto)
                <div class="col-12 col-xs-12 col-sm-12 col-lg-4 col-xl-3 col-xxl-3 mt-4">
                    <a href="{{ route('produto', ['slug' => $produto->slug]) }}" class="card card-rel shadow rounded-0 m-2"
                        style="width: 100%;">
                        <div class="card-body"
                            style=" background-image: url({{ url('/storage/produtos/' . current($produto->imagem)) }}); width: 100%; height: 330px; background-position: center; background-size: cover; ">
                        </div>
                        <div class="card-body">
                            <h5 class="text-dark fw-semi-bold fs--1  mt-3 text-uppercase">
                                {{ $produto->nome }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{ $produtos->links() }}

<section class="">
    <div class="container">
        @if (isset($submenu) && $submenu && $submenu->description)
        <h4 class="pb-0 mb-0 fw-bold text-dark">{{ $submenu->name }}</h4>
        <p class="pt-3">{{ $submenu->description }}</p>
        @elseif (isset($menu) && $menu && $menu->description)
        <h4 class="pb-0 mb-0 fw-bold text-dark">{{ $menu->name }}</h4>
        <p class="pt-3">{{ $menu->description }}</p>
        @endif
    </div>
</section>
@endsection
