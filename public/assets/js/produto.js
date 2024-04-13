$('#vertical').lightSlider({
    gallery: true,
    item: 1,
    vertical: true,
    verticalHeight: 450,
    thumbItem: 3,
    slideMargin: 0,
    speed: 600,
    addClass: '',
    mode: "slide",
    useCSS: true,
    cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
    easing: 'linear', //'for jquery animation',////
    autoplay: false,
    slideMargin: 100,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                item: 1,

            }
        },
        {
            breakpoint: 576,
            settings: {
                item: 1,
                slideMove: 1,
                verticalHeight: 400,
                gallery: false,
                adaptiveHeight: true,

            }
        }
    ]
});

$('#owl-produtos').owlCarousel({
    margin: 10,
    loop: false,
    autoWidth: true,
    items: 4,
    dots: false,
    responsive: {
        0: {
            items: 2,

        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        }
    }
});