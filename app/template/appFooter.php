<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="<?=JS?>ajaxlibspopper.js1.14.7umdpopper.min.js"></script>
<script src="<?=JS?>jquery.min.js"></script>
<script src="<?=JS?>sharetastic.js"></script>
<script src="<?=JS?>slick.min.js" charset="utf-8"></script>
<script src="<?=JS?>bootstrap.min.js"></script>
<script src="<?=JS?>bootstrap-datepicker.js"></script>
<script src="<?=JS?>jquery.timepicker.min.js"></script>
<script src="<?=JS?>getImgWithajax.js"></script>
<script type="text/javascript">
    $('#active-container').css('min-height',$('#active-img').css('height'));
    /*navbar*/
    $('.header').prepend('<div class="menu-toggle"><div class="one"></div> <div class="two"></div><div class="three"></div> </div>');
    $(".menu-toggle").on("click", function() {
        $(this).toggleClass("on");
        $('.menu-section').toggleClass("on");
        $(".navbar").slideToggle();
        $(this).toggleClass("active");
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
                        },
                    }, ],
                });
            }

            createSlick();

            $(window).on('resize orientationchange', createSlick);
        });		
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }					
</script>