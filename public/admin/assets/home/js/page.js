// Preloader
// makes sure the whole site is loaded
jQuery(window).on('load', function() {
"use strict";
    // will first fade out the loading animation
    jQuery("#status").fadeOut();
    // will fade out the whole DIV that covers the website.
jQuery("#preloader").delay(1000).fadeOut("slow");
  $("#preloader").fadeOut(1000, function() {
      $('body').removeClass('loading');
  });

})



    $('.owl-carousel-2').owlCarousel({
        loop: true,
        margin: 40,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
				dots: false, 
                nav: true
            },
            600: {
                items: 3,
				dots: false, 
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
				dots: false, 
                margin: 20
            }
        }
    })



$('.services').owlCarousel({
    dots: true,
    loop: true,
    margin: 5,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        320: {
            items: 1,
            nav: false
        },
        360: {
            items: 2,
            nav: false
        },
        480: {
            items: 2,
            nav: false
        },
        580: {
            items: 3,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: false,
            loop: false
        }
    }
})

$('.projects').owlCarousel({
    dots: false,
    loop: true,
    margin: 0,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        320: {
            items: 1,
            nav: false
        },
        360: {
            items: 1,
            nav: false
        },
        480: {
            items: 2,
            nav: false
        },
        580: {
            items: 3,
            nav: true,
        },
        600: {
            items: 3,
            nav: true,
        },
        1024: {
            items: 4,
            nav: true,
            loop: false
        }

    }
})

$('.logo-sec').owlCarousel({
    dots: true,
    loop: true,
    margin: 7,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        320: {
            items: 1,
            nav: false
        },
        360: {
            items: 2,
            nav: false
        },
        480: {
            items: 2,
            nav: false
        },
        580: {
            items: 3,
            nav: false
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: false,
            loop: false
        }
    }
})

$('.customers').owlCarousel({
    dots: true,
    loop: true,
    margin: 15,
    autoplay: true,
    responsiveClass: true,
    responsive: {
		 320: {
            items: 1,
            nav: false
        },
	  
        360: {
            items: 1,
            nav: false
        },
        480: {
            items: 2,
            nav: false
        },
        600: {
            items: 2,
            nav: false,
        },
        767: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
            nav: false,
            loop: false
        }
    }
})

$('.our-happy-customers').owlCarousel({
    dots: true,
    loop: true,
    margin: 15,
    autoplay: true,
    responsiveClass: true,
    responsive: {
       320: {
            items: 1,
            nav: false
        },
	  
	  360: {
            items: 1,
            nav: false
        },
        480: {
            items: 2,
            nav: false
        },
        600: {
            items: 2,
            nav: false,
            dots: false
        },
        767: {
            items: 1,
            nav: true,
            dots: false
        },
        991: {
            items: 2,
            nav: true,
            dots: false
        },
        1000: {
            items: 3,
            nav: true,
            dots: false,
        }
    }
})

$('.our-latest-news').owlCarousel({
    dots: true,
    loop: true,
    margin: 15,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        320: {
            items: 1,
            nav: false,
            dots: true
			
        },

	  360: {
            items: 1,
           	nav: false,
            dots: true
        },
        480: {
            items: 2,
            nav: true,
            dots: false
        },
        600: {
            items: 2,
            nav: true,
            dots: false
        },
        767: {
            items: 1,
            nav: true,
            dots: false
        },
        991: {
            items: 2,
            nav: true,
            dots: false
        },
        1000: {
            items: 3,
            nav: true,
            dots: false
        }
    }
})

