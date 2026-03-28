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
      items: 4,
      dots: false,
      slideSpeed: 1000,
      autoplayHoverPause: true,
      nav: false,
      margin: 30,
      responsive:{
        0:{items:1},
        480:{items: 2,margin: 30},
        768:{items: 3,margin: 30},
        980:{items: 3, margin: 30},
        1024:{items: 4,margin: 30},
        1200:{items: 4}
      }
    });
  }
});
//===== Window onScroll Ends =====//