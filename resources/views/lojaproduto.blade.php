@section('title', __($produto->nome))
@extends('loja_layouts.app')

@push('styles')
<link href="{{ url('vendors/OwlCarousel2/assets/owl.carousel.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/lightslider/lightslider.min.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/youCover/youCover.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/jquery.zoomy/zoomy.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('vendors/lightbox2/css/lightbox.css') }}">
<link rel="stylesheet" href="{{ url('vendors/jquery.exzoom/jquery.exzoom.css') }}">
@endpush

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7">
    <div class="container d-none d-sm-block">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-column flex-sm-row">
                <li class="breadcrumb-item"><a href="{{ route('loja') }}">Loja</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lojaprodutos') }}">{{ __('PRODUTOS') }}</a></li>
                {{--@if ($produto->Categoria)
                    <li class="breadcrumb-item">
                        <a href="{{ route('produtos', ['c' => $produto->Categoria->id]) }}">
                            {{ $produto->Categoria->nome }}
                        </a>
                    </li>
                    @if ($produto->Subcategoria)
                    <li class="breadcrumb-item">
                        <a
                            href="{{ route('produtos', ['c' => $produto->Categoria->id, 's' => $produto->Subcategoria->id]) }}">
                            {{ $produto->Subcategoria->nome }}
                        </a>
                    </li>
                    @endif
                @endif--}}
            </ol>
        </nav>
    </div>
</section>


<section class="bg-white pt-3 pt-sm-5 pb-4 pb-sm-8">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 order-2 order-lg-1 mt-8 mt-sm-0">
                <h4 class="text-dark text-uppercase fw-semi-bold">{{ __($produto->nome) }}</h4>

                {!! $produto->descricao !!}

                {!! $produto->tecnico !!}

                @if ($produto->certificacoes)
                <div class="col-6">
                    <img class="img-fluid mb-2" src="{{ url('/storage/certificacoes/' . $produto->certificacoes) }}">
                </div>
                @endif

                <div class="text-gray-dark mt-0 ml-3 d-none d-sm-block">
                    <div class="row">
                        <div class="col">
                            <a id="button-orcamento" href="#" class="btn btn-warning" >comprar</a>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-12 col-lg-7 order-1 order-lg-2 d-flex justify-content-center align-content-center">
                <div class="container-exzoom container">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach ($produto->imagem as $imagem)
                                <li><img src="{{ url('/storage/produtos/' . $imagem) }}" /></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>

@if ($produto->sketchup)

<section class="px-0 py-0 mb-0">
    <div class="row align-items-center justify-content-center pt-3 mb-5 text-dark g-0">
        <div class="col-11 col-md-10 col-lg-7 p-0 text-center">
            <h3 class="fw-bold lh-sm ">
                {{ __('Veja este produto em sua casa') }}
            </h3>
            <p class="mt-3 mb-4  fs-0 fs-lh-1">
                {{ __('Criar chamada com o objetivo de promover a sessão onde o usuário tem a possibilidade de visualizar o produto em sua casa em realidade aumentada') }}
            </p>
            <a href="{{ url('/storage/produtos/' . $produto->sketchup) }}" download=""
                class="btn btn-secondary rounded py-lg-2 py-3 px-lg-5 px-3 fs--1 text-uppercase">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fs--2">
                        <img src="{{ url('assets/svg/realidade.svg') }}" class="me-0 realidade img-fluid">
                        {{ __('Ver produto em REALIDADE AUMENTADA') }}
                    </div>
                </div>

            </a>
        </div>
    </div>

</section>
@endif

@if ($produto->Revestimentos->isNotEmpty() or $produto->Cores->isNotEmpty())

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-between">
            @if ($produto->Revestimentos->isNotEmpty())
            <div class="col-12 col-sm-6">
                <h4 class="text-dark text-uppercase fw-semi-bold mt-3">REVESTIMENTOS</h4>
                @foreach ($produto->Revestimentos->groupBy('categoria') as $categoria => $revestimentos)
                <label class="pt-4">{{ $categoria }}</label>
                <div class="row photos d-flex border-bottom">
                    @foreach ($revestimentos as $revestimento)
                    <img class="col-auto img-fluid" width="47" src="{{ url('/storage/revestimentos/' . $revestimento->imagem) }}"
                        title="{{ $categoria }} - {{ __($revestimento->nome) }}">
                    @endforeach
                </div>
                @endforeach

            </div>
            @endif

            @if ($produto->Cores->isNotEmpty())
            <div class="col-12 col-sm-6">
                <h4 class="text-dark text-uppercase fw-semi-bold mt-3">Cores disponíveis</h4>
                <div class="row photos d-flex">
                    @foreach ($produto->Cores as $cor)
                        <img class="col-auto img-fluid" width="47" src="{{ url('/storage/cores/' . $cor->imagem) }}" title="{{ __($cor->nome) }}" href="{{ url('/storage/cores/' . $cor->imagem) }}">
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif


@if ($relacionados->isNotEmpty())
<section class="py-6 d-none d-sm-block">
    <div class="container">
        <h4 class="pb-0 mb-0 fw-bold text-dark m-2 mb-6">PRODUTOS RELACIONADOS</h4>
        <div class="owl-carousel owl-theme">
            @foreach ($relacionados as $relacionado)
            <div class="item">
                <a href="{{ route('lojaproduto', $relacionado->slug) }}" class="card card-rel shadow rounded-0 m-2"
                    style="width: 100%;">
                    <div class="card-body"
                        style=" background-image: url({{ url('/storage/produtos/' . current($relacionado->imagem)) }}); width: 100%; height: 280px; background-position: center; background-size: cover; ">
                    </div>
                    <div class="card-body">
                        <h5 class="text-dark fw-semi-bold fs--1  mt-3 text-uppercase">
                            {{ __($relacionado->nome) }}
                        </h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


<section class="py-2 py-lg-3 border-sm-top" id="orcamento">
    <div class="container">
        <div class="row g-0  justify-content-center align-content-center align-items-center ">
            <div class="col-12 col-lg-8 p-lg-4 p-3  text-lg-start text-center">
                <div class="row justify-content-center align-content-center align-items-center ">
                    <div class="col-12 col-lg-3 ">
                        <h4 class="mb-0">Solicite seu​</h4>
                        <h1 class="">Orçamento</h1>
                    </div>
                    <div class="col-12 col-lg-9 ps-sm-6">
                        Temos a solução ideal para seu projeto de mobiliário corporativo. Preencha o formulário abaixo
                        ou fale com um consultor via WhatsApp.
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-4 p-lg-4 p-3 bg-white text-lg-center text-center">
                <div class="row justify-content-center align-content-center align-items-center">
                    <div class="col-12 col-lg-12 text-center">
                        <a href="tel:01143071368" class="btn btn-info rounded-0 py-3 py-lg-3 px-4 px-lg-5 fs-1 fs-lg--1 text-uppercase">
                            FALE COM UM CONSULTOR
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-5">
        <form method="POST" action="{{ route('OrcamentoPost') }}">
            <div class="row px-lg-5 px-1 py-4 text-dark align-items-center justify-content-center">

                @csrf
                @include('layouts.message')
                <!-- product detail -->
                <input type="hidden" name="produto_nome" value="{{ $produto->nome }}" />
                <!-- ./ -->
                <div class="col-12">
                    <input type="text" name="nome" class="form-control form-control-lg mb-4" placeholder="NOME" required>
                </div>
                <div class="col-6">
                    <input type="email" name="email" class="form-control form-control-lg mb-4" placeholder="E-mail" required>
                </div>
                <div class="col-6">
                    <input type="text" name="telefone" class="form-control form-control-lg mb-4" placeholder="Telefone" required>
                </div>
                <div class="col-12">
                    <textarea class="form-control form-control-lg mt-4" name="mensagem" rows="4" cols="50" placeholder="MENSAGEM" required></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-info rounded-0 py-lg-3 py-2 px-4 fs--1 text-uppercase mt-4 w-100">
                        <div class="d-flex justify-content-lg-between justify-content-center">
                            <span class="">Enviar</span>
                            <span class="d-none d-lg-block">
                                <img rc="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='5.207' height='9.414' viewBox='0 0 5.207 9.414'%3E%3Cpath id='Caminho_24' data-name='Caminho 24' d='M1130.616-30.677l4,4,4-4' transform='translate(31.384 1139.323) rotate(-90)' fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1'/%3E%3C/svg%3E%0A">
                            </span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


@if (!empty($produto->youtube))
<section class="py-lg-5 py-lg-5 px-lg-4 px-0 py-0 mb-0 min-vh-75 bg-primary ">
    <div class="row px-lg-5 px-3 py-4 text-dark g-0 align-items-center">
        <div class="col-12 col-lg-6 p-0">
            <div class="col-12 col-lg-8">
                <p class="mt-3 mb-4  fs-0 fs-lh-1 fw-semi-bold text-white text-lg-start text-center">
                    {{ __('Confira nesse vídeo tudo sobre sofá de couro! Saiba como escolher o modelo de sofá de couro ideal e muitas dicas de como cuidar de sofá de couro.') }}
                </p>
            </div>
        </div>
        <div class="col-12 col-lg-6 p-0">
            <div data-youcover data-fancybox data-id="{{ $produto->youtube }}" data-rel="galery"></div>
        </div>
    </div>
</section>
@endif

<section class="fale-conosco-tag py-0 min-vh-50 d-none d-sm-block">
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ url('vendors/lightbox2/js/lightbox.js') }}"></script>
<script src="{{ url('vendors/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script src="{{ url('vendors/lightslider/lightslider.min.js') }}"></script>
<script src="{{ url('vendors/fancybox/jquery.fancybox.js') }}"></script>
<script src="{{ url('vendors/youCover/youCover.js') }}"></script>
<script src="{{ url('assets/js/produto.js') }}"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<link rel="stylesheet" href="{{ url('vendors/jquery.exzoom/jquery.exzoom.js') }}">
<script src="{{ url('vendors/jquery.exzoom/jquery.exzoom.js') }}"></script>

<script>
    $('.container-exzoom').imagesLoaded(function() {
    $("#exzoom").exzoom({
        autoPlay: false,
    });
    $("#exzoom").removeClass('hidden')
});

$("#button-orcamento").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#orcamento").offset().top
    }, 500);
});

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});
</script>
@endpush
