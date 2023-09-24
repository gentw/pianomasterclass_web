; (function ($) {
    "use strict";

    $(document).ready(function () {
        // loader 
        var loader1 = $('.loader1');
        if(loader1.length) {
            loader1.ClassyLoader({
                percentage: 90,
                speed: 30,
                diameter: 80,
                fontSize: '20px',
                showText: true,
                roundedLine: true,
                fontColor: '#043381',
                lineColor: '#043381',
                remainingLineColor: '#E5EAF2',
                lineWidth: 10,
                start: 'top',
            });
        }
        // loader 
        var loader2 = $('.loader2');
        if(loader2.length) {
            loader2.ClassyLoader({
                percentage: 90,
                speed: 30,
                diameter: 80,
                fontSize: '20px',
                showText: true,
                roundedLine: true,
                fontColor: '#fff',
                lineColor: '#fff',
                remainingLineColor: '#043381',
                lineWidth: 10,
                start: 'top',
            });
        }
        
        // loader 
        var loader3 = $('.loader3');
        if(loader3.length) {
            loader3.ClassyLoader({
                percentage: 90,
                speed: 30,
                diameter: 80,
                fontSize: '20px',
                showText: true,
                roundedLine: true,
                fontColor: '#fff',
                lineColor: '#fff',
                remainingLineColor: '#043381',
                lineWidth: 10,
                start: 'top',
            });
        }
        
        // loader 
        var loader4 = $('.loader4');
        if(loader4.length) {
            loader4.ClassyLoader({
                percentage: 90,
                speed: 30,
                diameter: 80,
                fontSize: '20px',
                showText: true,
                roundedLine: true,
                fontColor: '#fff',
                lineColor: '#fff',
                remainingLineColor: '#043381',
                lineWidth: 10,
                start: 'top',
            });
        }
        
        // loader 
        var loader5 = $('.loader5');
        if(loader5.length) {
            loader5.ClassyLoader({
                percentage: 90,
                speed: 30,
                diameter: 80,
                fontSize: '20px',
                showText: true,
                roundedLine: true,
                fontColor: '#fff',
                lineColor: '#fff',
                remainingLineColor: '#043381',
                lineWidth: 10,
                start: 'top',
            });
        }
        
        // donate price slider 
        var dnt = $("#dnt");
        if(dnt.length) {
            dnt.slider();
            dnt.on("slide", function(slideEvt) {
                $("#dntSliderVal").text(slideEvt.value);
                var valu = slideEvt.value;
                var max = slideEvt.target.dataset.sliderMax;
                var needval = max - valu;
                $("#needVal").text(needval);
            });
        }

        // datepicker
        var datepicker = $( "#datepicker" );
        if(datepicker.length) {
            datepicker.datepicker();
        }

        /*-------------------------------------
            magnific popup video activation
        -------------------------------------*/
        

  /*-------------------------------------
            magnific popup video activation
        -------------------------------------*/
        $(".video-btn-style-01").magnificPopup({
            items: {
                src: "https://www.youtube.com/watch?v="+$("#youtubev").attr("url")
            },
            type: "iframe",
            iframe: {
                markup:
                    '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    "</div>",
                patterns: {
                    youtube: {
                        index: "youtube.com/",
                        id: "v=",
                        src: "//www.youtube.com/embed/"+$("#youtubev").attr("url")
                    }
                },
                srcAction: "iframe_src"
            }
        });

        $(".video-btn-style-02").magnificPopup({
            items: {
                src: "https://www.youtube.com/watch?v="+$("#youtubev").attr("url")
            },
            type: "iframe",
            iframe: {
                markup:
                    '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    "</div>",
                patterns: {
                    youtube: {
                        index: "youtube.com/",
                        id: "v=",
                        src: "//www.youtube.com/embed/"+$("#youtubev").attr("url")
                    }
                },
                srcAction: "iframe_src"
            }
        });

        $(".video-btn-style-03").magnificPopup({
            items: {
                src: "https://www.youtube.com/watch?v="+$("#youtubev").attr("url")
            },
            type: "iframe",
            iframe: {
                markup:
                    '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    "</div>",
                patterns: {
                    youtube: {
                        index: "youtube.com/",
                        id: "v=",
                        src: "//www.youtube.com/embed/"+$("#youtubev").attr("url")
                    }
                },
                srcAction: "iframe_src"
            }
        });

        $(".video-btn-style-04").magnificPopup({
            items: {
                src: "https://www.youtube.com/watch?v=AOXl0Ll_t9s"
            },
            type: "iframe",
            iframe: {
                markup:
                    '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    "</div>",
                patterns: {
                    youtube: {
                        index: "youtube.com/",
                        id: "v=",
                        src: "//www.youtube.com/embed/AOXl0Ll_t9s"
                    }
                },
                srcAction: "iframe_src"
            }
        });

        $(".video-btn-style-05").magnificPopup({
              items: {
                src: "https://www.youtube.com/watch?v="+$("#youtubev").attr("url")
            },
            type: "iframe",
            iframe: {
                markup:
                    '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    "</div>",
                patterns: {
                    youtube: {
                        index: "youtube.com/",
                        id: "v=",
                        src: "//www.youtube.com/embed/"+$("#youtubev").attr("url")
                    }
                },
                srcAction: "iframe_src"
            }
        });



        /*----------------------
            Search Popup
        -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');
        var sidebarMenu = $('#sidebar-menu');

        $(document).on('click', '#body-overlay', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click', '#search', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });

        // counter up
        var countdown = $(".countdown");
        if(countdown.length) {
            countdown.counterUp({
                delay: 10,
                time: 1000
            });
        }

        /*--------------------
           Nice select
        ---------------------*/
        $('.donate').niceSelect();
        $('.eventLocation').niceSelect();


        // sidebar menu 
        $(document).on('click', '.sidebar-menu-close', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click', '#navigation-button', function (e) {
            e.preventDefault();
            sidebarMenu.addClass('active');
            bodyOvrelay.addClass('active');
        });
    
        // mobile menu
        if ($(window).width() < 992) {
            $(".in-mobile").clone().appendTo(".sidebar-inner");
            $(".in-mobile ul li.menu-item-has-children").append('<i class="fas fa-chevron-right"></i>');
            $('<i class="fas fa-chevron-right"></i>').insertAfter("");
        }

        // donate amount 
        var donateAmount = $('.donate-ul li');
        donateAmount.click(function(){
            $('#custom').val($(this).data('amount'));
            donateAmount.removeClass('active');
            $(this).addClass('active');
        });


        /*-------------------------------------
            slick sliders
        -------------------------------------*/

        // banner slider one
        var banners1 = $('.banner-asnavfor-text-01');
        banners1.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            asNavFor: '.small-slider',
            fade: true,
            infinite: true,
            // autoplay: true
        });
        banners1.slickAnimation();
        banners1.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var totalSlide = slick.slideCount;
            var currentSlideindex = ++slick.currentSlide;
            
            if ( $(window).width() > 768 ) {
                var progress = 400 / totalSlide;
            } else {
                var progress = 200 / totalSlide;
            }
            
            var progressWidth = progress * currentSlideindex;
            $('.controler-wrapper-style-01 .total-controler').text(check_number(totalSlide));
            $('.controler-wrapper-style-01 .active-controler').text(check_number(currentSlideindex));
            $('.controler-wrapper-style-01 .home-slider-progress-active').css({ 'width': progressWidth + 'px' });
        });
        
        $('.small-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.banner-asnavfor-text-01',
            dots: false,
            arrows: false,
            focusOnSelect: true,
            centerPadding: 0,
            fade: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        fade: false
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        fade: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        fade: false
                    }
                }
            ]
        });

        

        // banner sliider 2
        var slider2 = $('.banner-slider-2');
        slider2.slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        dots: false,
                    }
                }
            ]
        });
        
        slider2.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var totalSlide = slick.slideCount;
            var currentSlideindex = ++slick.currentSlide;
            
            if ( $(window).width() > 768 ) {
                var progress = 400 / totalSlide;
            } else {
                var progress = 200 / totalSlide;
            }
            
            var progressWidth = progress * currentSlideindex;
            $('.controler-wrapper-style-03 .total-controler').text(check_number(totalSlide));
            $('.controler-wrapper-style-03 .active-controler').text(check_number(currentSlideindex));
            $('.controler-wrapper-style-03 .home-slider-progress-active').css({ 'width': progressWidth + 'px' });

        });

        // banner slider three
         var slider3 = $('.banner-slider-3');
         slider3.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            infinite: true,
            // autoplay: true
        });
        slider3.slickAnimation();

        // banner slider four
        var slider4 = $('.banner-slider-4');
        slider4.slick({
           slidesToShow: 1,
           slidesToScroll: 1,
           dots: false,
           arrows: false,
           infinite: true,
           autoplay: true
       });
       slider4.slickAnimation();

        // banner slider five
        var slider5 = $('.banner-slider-5');
        slider5.slick({
           slidesToShow: 1,
           slidesToScroll: 1,
           dots: false,
           arrows: true,
           infinite: true,
           asNavFor: '.banner5-sm-slider',
           // autoplay: true
       });
       slider5.slickAnimation();

       slider5.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var totalSlide = slick.slideCount;
            var currentSlideindex = ++slick.currentSlide;
            
            if ( $(window).width() > 768 ) {
                var progress = 300 / totalSlide;
            } else {
                var progress = 150 / totalSlide;
            }
            
            var progressWidth = progress * currentSlideindex;
            $('.controler-wrapper-style-04 .total-controler').text(check_number(totalSlide));
            $('.controler-wrapper-style-04 .active-controler').text(check_number(currentSlideindex));
            $('.controler-wrapper-style-04 .home-slider-progress-active').css({ 'width': progressWidth + 'px' });
        });

        $('.banner5-sm-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.banner-slider-5',
            dots: false,
            arrows: false,
            focusOnSelect: true,
            centerPadding: 0,
            fade: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        fade: false
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        fade: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        fade: false
                    }
                }
            ]
        });


        // candidate slider 1
        var candidate1 = $('.candidate-slider');
        candidate1.slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // candidate slider 2
        var candidate2 = $('.candidate-slider2');
        candidate2.slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 850,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        function ProgressbarStart(bannerprogress) {
            $('.controler-wrapper-style-02 .slider-progress-active').css({ 'height': bannerprogress + 'px' });
        }
        candidate2.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var totalSlide = slick.slideCount;
            var currentSlideindex = ++slick.currentSlide;
            var progress = 280 / totalSlide;
            var progressWidth = progress * currentSlideindex;
            ProgressbarStart(progressWidth)
            $('.controler-wrapper-style-02 .total-controler').text(check_number(totalSlide));
            $('.controler-wrapper-style-02 .active-controler').text(check_number(currentSlideindex));

        });


        

        /*-------------------------------------
            Swiper sliders
        -------------------------------------*/
        var swiper = new Swiper('.swiper-container.two', {
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
            },
            speed: 1000,
            effect: 'coverflow',
            loop: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            slidesPerView: 3,
            initialSlide: 3,
            paginationClickable: true,
            observer: true,
            observeParents: true,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
            coverflowEffect: {
                rotate: 0,
                stretch: 50,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            }
        });


        /*--------------------------------------
            news-slider1
        ---------------------------------------*/
        var newsslider = $("#news-slider1")
        if(newsslider.length) {
            newsslider.AnimatedSlider( { 
                prevButton: "#btn_prev", 
                nextButton: "#btn_next",
                visibleItems: 4,
                infiniteScroll: true,
                willChangeCallback: function(obj, item) { $("#statusText").text("Will change to " + item); },
                changedCallback: function(obj, item) { $("#statusText").text("Changed to " + item); }
            });
        }

        // brand slider
        $('.brand-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // testimonial slider
        $('.testimonial-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });


        /*-------------------------------------
            owl-carousel
        -------------------------------------*/

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1200: {
                    items: 3,
                    stagePadding: 250
                }
            }
        })

        // check_number function
        function check_number(num) {
            var IsInteger = /^[0-9]+$/.test(num);
            return IsInteger ? "0" + num : null;
        }

        

    });
})(jQuery);



