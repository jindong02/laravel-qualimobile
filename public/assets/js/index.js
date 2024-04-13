window.addEventListener('load', function () {
    ajustarMenu();

    window.addEventListener('scroll', function () {
        ajustarMenu();
    });
});

function ajustarMenu() {

    var mobile = document.getElementById("containerMobile");
    var desktop = document.getElementById("navbar_main");

    var scroll = window.pageYOffset;

    if (scroll >= 50) {
        mobile.classList.remove('mt-lg-4');
        mobile.classList.add("mt-lg-0");

        desktop.classList.add('bg-primary');
        desktop.classList.add('shadow-lg');
    } else {
        mobile.classList.remove("mt-lg-0");

        mobile.classList.add('mt-lg-4');

        desktop.classList.remove('bg-primary');
        desktop.classList.remove('shadow-lg');
    }
}

$(document).ready(function () {
    $("#owl-principal").owlCarousel({
        lazyLoad: true,
        center: true,
        stagePadding: -11,
        loop: true,
        margin: -3,
        nav: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    });
});