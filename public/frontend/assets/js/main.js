(function($){
	"use strict";
	jQuery(document).on('ready', function () {
		/* Header Sticky
		========================================================*/
        $(window).on('scroll',function() {
            if ($(this).scrollTop() >170){  
                $('.header-sticky').addClass("is-sticky");
            }
            else{
                $('.header-sticky').removeClass("is-sticky");
            }
        });

		// Nav Active Code
		/*==============================================================*/
		if ($.fn.classyNav) {
			$('#travelNav').classyNav({
				theme: 'light'
			});
		}
        
        // Search Popup Js
        /*==============================================================*/
        $(function() {
            $('a[href="#search"]').on("click", function(event) {
                event.preventDefault();
                $("#search").addClass("open");
                $('#search > form > input[type="search"]').focus();
            });

            $("#search, #search button.close").on("click keyup", function(event) {
                if (
                event.target == this ||
                event.target.className == "close" ||
                event.keyCode == 27
                ) {
                    $(this).removeClass("open");
                }
            });

            $("form").on("submit",function(event) {
                event.preventDefault();
                return false;
            });
        });
        
        
        /* Home Slides
        ========================================================*/
        $('.home-slides').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            nav:true,
            responsiveClass:true,
            dots:false,
            autoplayHoverPause:true,
            mouseDrag:true,
            animateOut: 'fadeOut',
            navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
            ],
        });
        $(".home-slides").on("translate.owl.carousel", function(){
            $(".main-banner h4").removeClass("animated fadeInDown").css("opacity", "0");
            $(".main-banner h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".main-banner p").removeClass("animated zoomIn").css("opacity", "0");
            $(".main-banner .read-more").removeClass("animated fadeInDown").css("opacity", "0");
        });
        $(".home-slides").on("translated.owl.carousel", function(){
            $(".main-banner h4").addClass("animated fadeInDown").css("opacity", "1");
            $(".main-banner h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".main-banner p").addClass("animated zoomIn").css("opacity", "1");
            $(".main-banner .read-more").addClass("animated fadeInDown").css("opacity", "1");
        });
        
        /* Popup Video
        ========================================================*/
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        
        
        // Partner Slides
        /*==============================================================*/
        $(".partner-slider").owlCarousel({
            nav: false,
            dots: false,
            center: false,
            touchDrag: false,
            margin: 30,
            mouseDrag: true,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:2,
                },
                768:{
                    items:4,
                },
                992:{
                    items:5,
                },
                1200:{
                    items:6,
                }
            }
        });
        
        // Testimonial Slides
        /*==============================================================*/
        $(".testimonial-slider").owlCarousel({
            nav: false,
            dots: true,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            margin: 30,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:1,
                },
                1200:{
                    items:1,
                }
            }
        });
        
        // Sidebar Testimonial Slides
        /*==============================================================*/
        $(".sidebar-testimonial-slider").owlCarousel({
            nav: true,
            dots: false,
            center: false,
            touchDrag: false,
            mouseDrag: true,
            margin: 30,
            autoplay: true,
            smartSpeed: 750,
			autoplayHoverPause: true,
            loop: true,
            navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"],
            responsive:{
                0:{
                    items:1,
                },
                768:{
                    items:1,
                },
                1200:{
                    items:1,
                }
            }
        });
        
        // Shorting
        /*==============================================================*/
        $(function(){
            $('.shorting').mixItUp();
        })
        
        // Counter
        /*==============================================================*/
        $(".count").counterUp({
            delay: 20,
            time: 1500
        });
        
        /* Go To Top
        ========================================================*/
        $(function(){
            //Scroll event
            $(window).on("scroll",function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 200) $('.go-top').fadeIn('slow');
                if (scrolled < 200) $('.go-top').fadeOut('slow');
            });  
            //Click event
            $('.go-top').on('click', function () {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
        });
    });

	// Page Loader
	/*==============================================================*/
	jQuery(window).on('load', function() {
		$('.preloader-area').fadeOut(0);
	});
    
}(jQuery));