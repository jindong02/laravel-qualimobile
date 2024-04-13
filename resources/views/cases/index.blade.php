@section('title', __('Cases'))
@extends('layouts.app')

@push('styles')
<link href="{{ url('vendors/OwlCarousel2/assets/owl.carousel.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/lightslider/lightslider.min.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/youCover/youCover.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/jquery.zoomy/zoomy.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('vendors/lightbox2/css/lightbox.css') }}">

<link rel="stylesheet" href="{{ url('vendors/lightbox2/css/lightbox.css') }}">

<link rel="stylesheet" href="{{ url('vendors/jquery.exzoom/jquery.exzoom.css') }}">

@endpush

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7">
    <div class="container d-none d-sm-block">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-column flex-sm-row">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('produtos') }}">{{ __('CASES') }}</a></li>
                <li class="nav-item d-none d-sm-none d-lg-block loja">
                    <a class="nav-link text-uppercase" href="{{ route('loja') }}">{{ __('Loja') }}</a>
                </li>
            </ol>
        </nav>
    </div>
</section>


<section class="bg-white pt-3 pt-sm-5 pb-3 pb-sm-8">


    <!--/.bg-holder-->
    <div class="container">
        <div class="row mb-5 text-center justify-content-center align-items-center">
            <div class="col-12 col-lg-6 mb-4">

                <div class="cases"
                    style="background-image:url({{ url('/storage/cases/' . $destaque->imagem) }});background-position:center center;background-size: cover;">
                </div>
            </div>
            <div class="col-12 col-lg-6 text-md-start" style="max-width: 460px;">
                <h3 class="fw-medium">{{ mb_strimwidth($destaque->titulo, 0, 80, "...") }}</h3>
                <p class="">
                    {{ mb_strimwidth(strip_tags(html_entity_decode($destaque->descricao)), 0, 200, "...") }}
                </p>
                <a class="btn btn-lg btn-primary rounded-pill" href="{{ route('cases.show', $destaque->id) }}">Continue Lendo</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-start justify-content-start">

            @foreach ($cases as $case)
            <div class="col-12 col-lg-4 mb-4 cases-list">
                <a href="{{ route('cases.show', $case->id) }}"
                    class="row mb-5 text-center justify-content-center align-items-center cases-link">
                    <div class="col-12 col-lg-12 mb-4">
                        <div class="cases cases-img"
                            style="background-image:url({{ url('/storage/cases/' . $case->imagem) }});background-position:center center;background-size: cover;">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 text-md-start" style="max-width: 460px;">
                        <h3 class="fw-medium">{{ mb_strimwidth($case->titulo, 0, 80, "...") }}</h3>
                        <p class="">
                            {{ mb_strimwidth(strip_tags(html_entity_decode($case->descricao)), 0, 200, "...") }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="col-12 col-lg-12 mb-4 cases-list text-center">

            {{ $cases->links() }}

        </div>

    </div>

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

<link rel="stylesheet" href="{{ url('vendors/jquery.exzoom/jquery.exzoom.js') }}">

<script src="{{ url('vendors/jquery.exzoom/jquery.exzoom.js') }}"></script>




<script>
    $('.container-exzoom').imagesLoaded(function () {
    $("#exzoom").exzoom({
        autoPlay: false,
    });
    $("#exzoom").removeClass('hidden')
});

$("#button-orcamento").click(function () {
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
