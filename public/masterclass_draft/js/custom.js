$(document).ready(function() {
    initOwl();
});

function initOwl() {
    //owl carousel
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
                loop:false
            }
        }
    });

    function resizeImageOwl() {
        // resize image Owl
        var height = $(window).height() - 120;

        if($(window).width() <= 599){
            $(".slide-image").css("height", height);
            $(".slide-image img").attr("src", "uploads/posteri.jpg");
        } else {
            $(".slide-image img").attr("src", "uploads/unnamed.jpg");
            
        }
    }
    resizeImageOwl();
    

    $(window).resize(function() {
        resizeImageOwl();
    });
}

$(".nav-link").on("click", function() {
    $('#nav-check').prop('checked', false);
});

$("#apply_1").on("click", function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: $("#apply_form").offset().top - 100 }, 500);
    $("#price").val("active");
});

$("#apply_2").on("click", function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: $("#apply_form").offset().top - 100 }, 500);
    $("#price").val("passive");
});

