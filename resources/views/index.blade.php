@section('title', __('Página Inicial'))
@extends('layouts.app')

@push('styles')
<link rel="preload stylesheet" href="{{ url('vendors/OwlCarousel2/assets/owl.carousel.css') }}" as="style" />
@endpush

@section('content')

<div id="hero">

    <div class="owl-carousel owl-theme" id="owl-principal">
        @foreach ($banners as $key => $banner)
        <div class="item {{ ($key == 0)? 'overlay' : 'owl-lazy' }}" data-src="{{ url('/storage/banners/'.$banner->imagem) }}" style="{{ ($key == 0)? 'background-image: url(' . url('/storage/banners/'.$banner->imagem) . ')' : '' }};background-size: cover">
            <div class="container">
                <div class="row align-items-end justify-content-start  align-content-center min-vh-100 px-lg-6 px-0 px-sm-0">
                    <div class="col-10 col-md-10 col-lg-6 p-0 text-start">
                        @if($banner->Categoria)
                            <p class="pb-0 mb-0 fw-bold text-white mt-9 mt-lg-0 mb-2 mb-lg-0 text-uppercase">{{ __($banner->Categoria->nome) }}</p>
                        @endif

                        <h1 class="display-2 fw-bold fs-2 fs-sm-2 fs-md-4 fs-xl-5 text-white text-uppercase lh-sm ">
                            {{ __($banner->titulo) }}
                        </h1>
                        <p class="mt-3 mb-4 text-white fs-sm--1 fs--1 fs-lh-1">
                            {{ __($banner->descricao) }}
                        </p>

                        @if($banner->link)
                            <a class="btn btn-light rounded-0 py-lg-3 py-2 px-lg-5 px-3 fs--1 text-uppercase" href="{{ $banner->link }}">{{ __('Saiba mais') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



<section class="py-0">


    <div class="row g-0 " >
        @foreach (App\Models\Menu::orderByRaw('RAND()')->get() as $menu)
        <?php
            $categoria = $menu->categoria->first();
            if (! $categoria) {
                $submenu = $menu->submenus->first();
                if ($submenu) {
                    $categoria = $submenu->categoria->first();
                }
            }
        ?>
        <a href="{{ route('produtos', ['main' => $menu->slug]) }}" loading="lazy" class="col-sm-3 imagem-categorias-home align-self-end justify-content-start align-items-end d-flex p-4 text-white fw-semi-bold" style="background: linear-gradient(rgb(0 0 0 / 20%) 100% 100%),url('{{ url('/storage/categorias/'.$categoria->imagem) }}') bottom center no-repeat; {{ 'background-color:'. sprintf('#%06X', mt_rand(0, 0xFFFFFF)) }};">
            <div>
                {{ __($menu->name) }}
            </div>
        </a>
        @endforeach

    </div>

</section>
<!-- <section> close ============================-->
<!-- ============================================-->


<section class="bg-primary bg-sub">
    <div class=" text-white">
        <div class="container">
            <div class="row">
                <div class="col-11 col-lg-7 mt-lg-5 ">

                    <p class="a-a fw-semi-bold">
                        {{ __('Inspiração, conforto, inovação e qualidade aliados para proporcionar beleza e estilo ao seu ambiente traduzem o que nós pensamos ao elaborar os produtos QualiMobile.') }}
                    </p>

                    <p class="mt-2 mt-lg-4 a-b">
                        {{ __('Ao adquirir nossos produtos você está conectando-se a uma empresa em constante sintonia com as tendências mundiais e atuante com responsabilidade social e ecológica em seus processos de fabricação. Além disso, estamos sempre dispostos a propor soluções eficazes para todas as pessoas, de todos os estilos.') }}

                    </p>
                    <a class="btn btn-light rounded-0 py-lg-3 py-2 px-4 fs--1 text-uppercase mt-lg-4" href="{{ route('produtos') }}">
                        {{ __('Saiba mais') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="conheca-historia py-0">
    <div class="container">
        <div class="row flex-center justify-content-center align-content-center align-self-center min-vh-100">
            <div class="col-lg-6 col-12 text-center ">
                <div class="h5 fw-semi-bold fs-lg-1 fs-0 text-white px-4 px-lg-0">
                    {{ __('Design envolvente que se adapta a todos os tipos de ambientes. Descubra o elegante, a gente entende você.') }}
                </div>

                <a class="btn btn-light rounded-0  py-lg-3 py-2 px-3 fs--1 text-uppercase mt-lg-6 mt-3" href="{{ route('historia') }}">
                    {{ __('CONHEÇA NOSSA HISTÓRIA') }}
                </a>
            </div>
        </div>

    </div>
</section>


<section class="py-5">

    <div class="container">
        <h4 class="text-center">Quem usa, recomenda</h4>

        <div class="owl-carousel owl-recomenda owl-theme">

            @foreach ($clientes as $cliente)
            <div class="item ">
                <div class="card shadow mt-5">
                    <div class="card-body p-4 text-center min-vh-50 mb-5">

                        <center>
                            <img class="me-2 " style="max-width: 100px;width: 100px; "
                                src="{{ url('/storage/clientes/' . $cliente->imagem) }}" width="20"
                                alt="">
                        </center>
                        <h5 class="mt-3">{{ $cliente->nome }}</h5>
                        <p class="mt-4" style=" font-size: 15px; ">{{ $cliente->descricao }}</p>

                    </div>

                    <div class="card-footer bg-white border-top text-center bg-light" style=" font-size: 14px; ">
                        {{ $cliente->empresa }}
                    </div>
                </div>

            </div>
            @endforeach


        </div>






    </div>
</section>



<section id="newsletter" class="pt-0 pt-sm-5 pb-0 px-0 px-lg-5 mb-4">

    <div class="row row-grid align-items-center g-0">
        <div class="col-sm-6 bg-primary">
            <form action="{{ route('newsletter') }}" method="POST" class="container p-7 px-4">
                @csrf

                <div class="text-center mb-4 text-white fw-normal fs-2">Newsletter</div>

                <input type="text" name="nome" " class="form-control form-control-lg" placeholder="{{ __('Nome') }}" required="">
                <input type="email" name="email" class="form-control form-control-lg mt-3" placeholder="{{ __('E-mail') }}" required="">

                <div class="text-lg-end text-center">
                    <button type="submit" class="btn btn-info rounded-0 py-lg-3 py-2 px-4 fs--1 text-uppercase mt-4 w-50 mb-3">
                        <div class="d-flex justify-content-lg-between justify-content-center">
                            <span class="">{{ __('Enviar') }}</span>
                            <span class="d-none d-lg-block">
                                <img alt="Newsletter" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='5.207' height='9.414' viewBox='0 0 5.207 9.414'%3E%3Cpath id='Caminho_24' data-name='Caminho 24' d='M1130.616-30.677l4,4,4-4' transform='translate(31.384 1139.323) rotate(-90)' fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1'/%3E%3C/svg%3E%0A">
                            </span>
                        </div>
                    </button>
                </div>

                @include('layouts.message')

            </form>
        </div>
        <div class="col-sm-6 newsletter"></div>
    </div>



</section>

@endsection


@push('scripts')
<script src="{{ url('assets/js/jquery-3.6.0.slim.min.js') }}"></script>
<script src="{{ url('vendors/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/js/index.js') }}"></script>

<script>
$('.owl-recomenda').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        }
    }
})
</script>
@endpush