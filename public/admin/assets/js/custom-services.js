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
                margin: 15
            }
        }
    })
	

	//Video Popup
    var url = $("#cartoonVideo").attr('src');
    
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });
	
})



$(document).ready(function(){
'use strict';

//===== Owl Carousel =====//
if ($.isFunction($.fn.owlCarousel)) {
//=== Choose Plan Carousel ===//
$('.choose-car').owlCarousel({
      autoplay: true,
      smartSpeed: 600,
      loop: true,
      items: 2,
      dots: false,
      slideSpeed: 2000,
      autoplayHoverPause: true,
      nav: true,
      margin: 30,
      navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
      responsive:{
        0:{items: 1},
        480:{items: 1,margin: 30},
        768:{items: 2,margin: 30},
        980:{items: 2, margin: 30},
        1024:{items: 2,margin: 30},
        1200:{items: 2}
    }
});

//=== Sponsors Carousel ===//
$('.spnsr-car2').owlCarousel({
      autoplay: true,
      smartSpeed: 300,
      loop: true,
      items: 2,
      dots: false,
      slideSpeed: 1000,
      autoplayHoverPause: true,
      nav: false,
      margin: 30,
      responsive:{
        0:{items: 2},
        480:{items: 2,margin: 30},
        768:{items: 2,margin: 30},
        980:{items: 2, margin: 30},
        1024:{items: 2,margin: 30},
        1200:{items: 2}
      }
    });
  }
});
//===== Window onScroll Ends =====//