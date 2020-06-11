$(document).ready(function() {
    $(".learn").click(function() {
        $(".learn-more").show(500);
        $(".learn").remove();
    });

});
$(document).ready(function() {
    $(".learn").click(function() {
        $(".learn-2").show(500);
        $(".learn").remove();
    });

});
$(document).ready(function() {
    $(".learn-2").click(function() {
        $(".learn-more-2,.learn-3").show(500);
        $(".learn-2").remove();
    });

});
$(document).ready(function() {
    $(".learn-3").click(function() {
        $(".learn-more-3").show(500);
        $(".learn-3").remove();
    });

});

// call bootstrap tooltip
$(function() {
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });
});



function myFunction() {
    var x = document.getElementById("Download").download;
    document.getElementById("demo").innerHTML = x;
}
$(".darkmode").click(function() { //1
    $("body").toggleClass("dark") //2
        .css( //3
            $("body").hasClass("dark") ? //4
            { background: "#202225", color: "#f9f9f9" } : { background: "#f9f9f9", color: "#202225" } //5
        );
});
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200); // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
});
$('#return-to-top').click(function() { // When arrow is clicked
    $('body,html').animate({
        scrollTop: 0 // Scroll to top of body
    }, 500);
});

$(() => {
    var createSlick = () => {
        let slider = $(".slider");

        slider.not('.slick-initialized').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    adaptiveHeight: true,
                },
            }, {
                breakpoint: 1008,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                },
            }, ],
        });
    }

    createSlick();

    $(window).on('resize orientationchange', createSlick);
})