$(document).ready(function () {
    //$('.table').DataTable();
});

Circles.create({
    id: 'task-complete',
    radius: 75,
    value: 80,
    maxValue: 100,
    width: 8,
    text: function (value) {
        return value + '%';
    },
    colors: ['#eee', '#1D62F0'],
    duration: 400,
    wrpClass: 'circles-wrp',
    textClass: 'circles-text',
    styleWrapper: true,
    styleText: true
})

$('.count').each(function () {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


window.onscroll = function () {
    myFunction()
};

var header = document.getElementById("headertop");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}