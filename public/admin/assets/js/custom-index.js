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






$('.owl-carousel-3').owlCarousel({
        loop: true,
        margin:30,
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







// Scroll to top
function scrollToTop() {
"use strict";
	if ($('.scroll-top').length) {
        //Check to see if the window is top if not then display button
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 200) {
                $('.scroll-top').fadeIn();
            } else {
                $('.scroll-top').fadeOut();
            }
        });
        //Click event to scroll to top
        $('.scroll-top').on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1500);
            return false;
        });
    }
}

// Top slider
// scroll to function
$("#scrollto").on('click', function() {
"use strict";
$('html, body').animate({
        scrollTop: $("#main-content").offset().top
    }, 900);
});

$("#subscribe").on('click', function() {
"use strict";
$('html, body').animate({
        scrollTop: $("#subscribe-main").offset().top
    }, 900);
});

// vertical tabs
var tabsFn = (function() {
"use strict";
function init() {
        setHeight();
    }
    function setHeight() {
        var $tabPane = $('.tab-pane'),
            tabsHeight = $('.nav-tabs').height();

        $tabPane.css({
            height: tabsHeight
        });
    }

    $(init);
})();


// owlcarousel
$(document).on('ready', function() {
"use strict";
// team carousel
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
	
// Logo carousel
    $('.owl-carousel-2').owlCarousel({
        loop: true,
        margin: 40,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
	//Video Popup
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
	
})

// animation
"use strict";
			var wow = new WOW ({
				boxClass:     'wow',       // animated element css class (default is wow)
				animateClass: 'animated',  // animation css class (default is animated)
				offset:       120,         // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true         // act on asynchronously loaded content (default is true)
			  }
			);
wow.init();
