@section('title', __('Página Inicial'))
@extends('layouts.app')

@push('styles')
<link href="{{ url('vendors/OwlCarousel2/assets/owl.theme.cases.css') }}" rel="stylesheet" />
<link href="{{ url('vendors/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('vendors/lightbox2/css/lightbox.css') }}">

@endpush

@section('content')




<div class="cases row justify-content-center align-items-center"
    style="min-height: 50vh;background: linear-gradient(to top,rgb(17 17 17 / 17%) 50%,rgb(17 17 17 / 67%) 100%),url({{ url('/storage/cases/' . $case->imagem) }}) bottom center no-repeat;background-size: cover;background-position: center;">
    <div class="col-12 text-center">

    </div>
</div>


<section class="bg-white py-5">


    <!--/.bg-holder-->
    <div class="container">
        <div class="text-center ">
            <h2 class="fw-medium fs-lg-5 text-dark">
                {{ $case->titulo }}
            </h2>
        </div>

    </div>
</section>
<section class="bg-white py-5">

    <div class="container">
        <div class="div-em-colunas">
            {!! $case->descricao !!}
        </div>
    </div>
</section>



</section>



<section class="py-5 bg-light">

    @if ($case->galeria)

    <div class="container mb-sm-8">
        <div class="row justify-content-center justify-content-center">

            <div class="col-12 col-sm-6 text-center">

                <h4 class="text-dark text-uppercase fw-light mt-3 py-3">Confira as fotos</h4>


                <div class="photos owl-photos owl-carousel d-flex border-bottom">

                    @foreach ($case->galeria as $img)
                    <a class="item" data-lightbox="photos">
                        <div
                            style="width: 100%;height: 40vh;background-image: url({{ url('/storage/cases/' . $img) }});background-size: cover;background-position: center;">
                        </div>
                    </a>
                    @endforeach
                </div>


            </div>


        </div>
    </div>
    @endif

    <div class="container py-5">
        <div class="row align-items-center justify-content-center">

            @foreach ($cases as $case)
            <div class="col-12 col-lg-3 mb-4 cases-list"  style="max-height: 800px;">
                <a href="{{ route('cases.show', $case->id) }}" class="row mb-5 text-center justify-content-center align-items-center cases-link">
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



    </div>

</section>
@endsection


@push('scripts')

<script src="{{ url('assets/js/jquery-3.6.0.slim.min.js') }}"></script>
<script src="{{ url('vendors/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/js/index.js') }}"></script>



<script>
    $('.owl-photos').owlCarousel({
    center: true,
    loop: true,
    items: 1,
    margin: 30,
    stagePadding: 0,
    nav: true,
    dots: true,
});

</script>
@endpush
