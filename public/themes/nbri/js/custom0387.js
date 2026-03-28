/* preloader */
function handlePreloader() {
	if ($('.preloader').length) {
		$('body').removeClass('active-preloader-ovh');
		$('.preloader').fadeOut();
	}
}
jQuery(window).on('load', function () {
	(function ($) {
		handlePreloader()
	})(jQuery);
});

jQuery(document).ready(function() {
    // Add required attributes to inputs
    jQuery('#edit-title').attr('required', true);
    jQuery('#edit-field-date-of-issue-value').attr('required', true);
    jQuery('#edit-field-select-scheme-target-id').attr('required', true);

    // Handle form submission
    jQuery('#views-exposed-form-verify-your-certificate-page-1').on('submit', function(e) {
      let isValid = true;

      // Check if all required fields are filled
      jQuery(this).find('[required]').each(function() {
        if ($(this).is(':visible') && !$(this).val()) {
          isValid = false;
          return false; // Exit the loop on first empty field
        }
      });

      if (!isValid) {
        e.preventDefault(); // Prevent form submission
        alert('Please fill out all fields.');
      }
    });
	jQuery('#views-exposed-form-verify-your-certificate-page-1 option[value="All"]').prop('disabled', true);
  });
jQuery(document).ready(function() {
      // Open PDF In New Window
      jQuery('a[href$=".pdf"]').attr('target', '_blank');
  });
/* preloader */
/* Gov Bottom Slider Section JS Start */
jQuery(document).ready(function () {
	jQuery('#views-exposed-form-laboratories-and-centres-block-2 option[value="All"]').prop('disabled', true);
	/* jQuery('#user-pass #edit-submit').attr('value', 'Submit');  */ 
	jQuery('#webform-submission-online-query-feedback-add-form #edit-name').bind('keyup paste', function(){
        this.value = this.value.replace(/[^a-z]/g, '');  }); 
		jQuery('#webform-submission-online-query-feedback-add-form #edit-mobile-telephone').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9+]/g, '');  }); 
	/* jQuery('#views-exposed-form-training-course-schedule-page-1 #edit-field-post-date-value').attr('type', 'date'); */
	jQuery('#block-stqc-exposedformverify-test-report-certificateblock-1 #edit-field-date-of-issue-value').attr('type', 'date');
jQuery('#views-exposed-form-duplicate-of-online-job-status-page-1 #edit-field-date-of-issue-of-test-repo-value').attr('type', 'date');
	// jQuery("#views-exposed-form-laboratories-and-centres-block-2 option[value='All']").remove();
	 
	var owl = jQuery('#gov_bottom_slider');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 2
			},
			600: {
				items: 3
			},
			1199: {
				items: 6
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* Gov Bottom Slider Section JS End */
// Whats New Ticeker 
$(document).ready(function () {
	var dd = $('.whatsnew-ticker').easyTicker({
		direction: 'left',
		easing: 'swing',
		speed: 'slow',
		interval: 2000,
		height: '210',
		visible: 1,
		mousePause: 1,
		controls: {
			up: '.btnUp',
			down: '.btnDown',
			toggle: '.btnToggle3'
		}
	}).data('easyTicker');
	$('.btnToggle3').click(function() {
        $('.toggle-cls3').toggleClass('fa-pause fa-play');
    });
});
/* gallery Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#gallery_slider');
	owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 0,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1199: {
				items: 3
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* gallery Bottom Slider Section JS End */

/* Gov Bottom Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#gov_bottom_slider2');
	owl.owlCarousel({
		items: 5,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 2
			},
			600: {
				items: 3
			},
			1199: {
				items: 5
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* Gov Bottom Slider Section JS End */

/* Gov Bottom Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#button_tab3');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 0,
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* Gov Bottom Slider Section JS End */


/* video Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#video_slider');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 0,
		autoplay: false,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* gallery Bottom Slider Section JS End */




/* circular Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#circular');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* circular Slider Section JS End */


/* circular Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#services_div');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 6000,
		autoplayHoverPause: true,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/* circular Slider Section JS End */

$(function () {
	new WOW().init();
});
/* Item Section Counter JS Start */
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend(
				{},
				$.fn.countTo.defaults,
				{
					from: $(this).data("from"),
					to: $(this).data("to"),
					speed: $(this).data("speed"),
					refreshInterval: $(this).data("refresh-interval"),
					decimals: $(this).data("decimals")
				},
				options
			);
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data("countTo") || {};
			$self.data("countTo", data);
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			// initialize the element with the starting value
			render(value);
			function updateTimer() {
				value += increment;
				loopCount++;
				render(value);
				if (typeof settings.onUpdate == "function") {
					settings.onUpdate.call(self, value);
				}
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData("countTo");
					clearInterval(data.interval);
					value = settings.to;

					if (typeof settings.onComplete == "function") {
						settings.onComplete.call(self, value);
					}
				}
			}
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	$.fn.countTo.defaults = {
		from: 0, // the number the element should start at
		to: 0, // the number the element should end at
		speed: 1000, // how long it should take to count between the target numbers
		refreshInterval: 100, // how often the element should be updated
		decimals: 0, // the number of decimal places to show
		formatter: formatter, // handler for formatting the value before rendering
		onUpdate: null, // callback method for every time the element is updated
		onComplete: null // callback method for when the element finishes updating
	};

	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
})(jQuery);
jQuery(function ($) {
	// custom formatting example
	$(".count-number").data("countToOptions", {
		formatter: function (value, options) {
			return value
				.toFixed(options.decimals)
				.replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
		}
	});
	// start all the timers
	$(".timer").each(count);
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data("countToOptions") || {});
		$this.countTo(options);
	}
});
/* Item Section Counter JS End */

$('.whitetheme').on('click', function () {
	$('body').addClass('whitetheme');
	$('body').removeClass('blacktheme');
});

$('.blacktheme').on('click', function () {
	$('body').addClass('blacktheme');
	$('body').removeClass('whitetheme');
});

/* Fonts Decrease, Increase & Normal  JS Start */
function fontNormal() {
	jQuery('body').css('font-size', 14);
}
function fontDecrease() {
	curSize = parseInt(jQuery('body').css('font-size')) - 1;
	if (curSize < 12) {
		return false;
	}
	jQuery('body').css('font-size', curSize);
}
function fontIncrease() {
	curSize = parseInt(jQuery('body').css('font-size')) + 1;
	if (curSize > 28) {
		return false;
	}
	jQuery('body').css('font-size', curSize);
}

/* Main Menu Toggle JS Start */
$(document).ready(function () {
	$("button.navbar-toggler").click(function () {
		$(".navbar-toggler").toggleClass("close-icon");
	});
});
$(document).ready(function() {
    let mybutton = document.getElementById("top-scroll");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (mybutton) {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 50) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    // Bind the topFunction to the button click event
    if (mybutton) {
        mybutton.addEventListener("click", topFunction);
    }
});

/*nav active*/
var selector = '.custom-menu li';
$(selector).on('click', function () {
	$(selector).removeClass('active');
	$(this).addClass('active');
});
/* Fonts Decrease, Increase & Normal JS End */
/* photo Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#photo_gallery');
	owl.owlCarousel({
		items: 2,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 2
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*Slider Section JS End */
/* photo Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#news_section');
	owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1199: {
				items: 3
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*MHI Slider Section JS End */

/* Admission Notice Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#admission_notice');
	owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1199: {
				items: 3
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*Admission Notice Section JS End */
jQuery(document).ready(function(){
    jQuery(".search-btn a").click(function(){
        jQuery('#search-block-form').toggleClass("search-block-form-ShowBox");
    });
	
	 jQuery("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    jQuery("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
/* MHI Slider Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#mhi_gallery');
	owl.owlCarousel({
		items: 4,
		loop: true,
		margin: 15,
		autoplay: false,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1199: {
				items: 4
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*MHI Slider Section JS End */

/* Sucess Stories Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#sucess_stories');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*Sucess Stories Section JS End */

/* Sucess Stories Section JS Start */
jQuery(document).ready(function () {
	var owl = jQuery('#news2');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 0,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1199: {
				items: 1
			}
		}
	});
	$('.prev').click(function () {
		owl.trigger('owl.prev')
	})
	$('.next').click(function () {
		owl.trigger('owl.next')
	})
})
/*Sucess Stories Section JS End */
/*query form*/
jQuery(document).ready(function () { jQuery(".floatedFormBtn").prop("href", "javascript:void(0);"); jQuery(".floatedFormBtn").click(function () { jQuery('.floatedFormBtn').toggleClass("active"); jQuery('.floatedForm').toggleClass("visiable"); }); });

/* Notification JS Start */
var slideIndex = 1;
var playPause = true;
var timerVar;
var scrubberVar;
var intervalDuration = 3000;
var i = 0;
const presentationSize = document.getElementsByClassName("mySlides").length;
const playPauseButtonIcon = document.getElementById("play-pause-icon");
showSlides(slideIndex);
// Next/previous controls
function plusSlides(n) {
	clearTimeout(timerVar);
	clearInterval(scrubberVar);
	showSlides((slideIndex += n));
}
function playPauseHandler() {
	playPause = !playPause;
	if (playPause) {
		playPauseButtonIcon.className = "fa fa-pause";
		showSlides(slideIndex);
	} else {
		playPauseButtonIcon.className = "fa fa-play";
		clearTimeout(timerVar);
		clearInterval(scrubberVar);
		document.getElementById("myBar").style.width = "0%";
	}
}
function autoplay() {
	showSlides((slideIndex += 1));
}
function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var slideNumber = document.getElementById("slide-number");
	if (n > slides.length) {
		slideIndex = 1;
	}
	if (n < 1) {
		slideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}

	slideNumber.innerHTML = slideIndex + " / " + presentationSize;
	slides[slideIndex - 1].style.display = "block"; 

	if (playPause) {
		timerVar = setTimeout(autoplay, intervalDuration);
	}
}
/* Notification JS End */
/* Top Header Search Box JS Start */

/* jQuery('#edit-title-0-value').bind('input', function() {
  var c = this.selectionStart,
      r = /[^a-z0-9 .]/gi,
      v = jQuery(this).val();
  if(r.test(v)) {
    jQuery(this).val(v.replace(r, ''));
    c--;
  }
  this.setSelectionRange(c, c);
}); */

/* jQuery(document).ready(function() { 
  jQuery('#edit-title-0-value').on('input paste', function(e) {
    var inputElement = e.target;
    var originalValue = inputElement.value;   
    setTimeout(function() {
      var sanitizedValue = originalValue.replace(/[^\u0900-\u097F a-z0-9.]/gi, '');
      
      if (sanitizedValue !== originalValue) {
        inputElement.value = sanitizedValue;
      }
    }, 0);
  });
}); */

jQuery(document).on('keypress','#webform-submission-online-query-feedback-add-form #edit-mobile-telephone',function(e){
if(jQuery(e.target).prop('value').length>=13){
if(e.keyCode!=32)
{return false} 
}})

/* jQuery('#user-pass #edit-submit').attr('value', 'Submit'); */