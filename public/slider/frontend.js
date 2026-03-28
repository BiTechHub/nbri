(function ($) {
	'use strict';

	var grd = grd || {};
	grd.init = function () {
		grd.$body = $(document.body),
			grd.$window = $(window),
			grd.$header = $('#masthead');

		//Counter
		this.counter();

		//Images carousel
		this.imagesCarousel();
		this.timelineCarousel();
		this.portfolio_shortcode();
		// Team carousel
		this.teamCarousel();
		this.videoLightBox();
		//Testi carousel
		this.testimorialCarousel();
		this.awardCarousel();
		//Map google
        this.gmaps();

	};

	grd.imagesCarousel = function () {
		$.each(grdShortCode.imagesCarousel, function (id, imagesData) {
			var $sliders = $(document.getElementById(id));
			$sliders.not('.slick-initialized').slick({
				slidesToShow  : imagesData.slide,
				slidesToScroll: imagesData.scroll,
				infinite      : true,
				arrows        : imagesData.nav,
				autoplay      : imagesData.autoplay,
				autoplaySpeed : imagesData.speed,
				dots          : imagesData.dot,
				prevArrow     : '<div class="grd-left-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-left"></i></span></div>',
				nextArrow     : '<div class="grd-right-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-right"></i></span></div>',
				//appendArrows  : $container,
				responsive    : [
					{
						breakpoint: 1200,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 768,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 480,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 2
						}
					}
				]
			});
		});
	};

	grd.timelineCarousel = function () {
		$.each(grdShortCode.timelineCarousel, function (id, imagesData) {
			var $sliders = $(document.getElementById(id));
			$sliders.not('.slick-initialized').slick({
				slidesToShow  : imagesData.slide,
				slidesToScroll: 1,
				infinite      : true,
				arrows        : imagesData.nav,
				autoplay      : imagesData.autoplay,
				autoplaySpeed : imagesData.speed,
				dots          : false,
				prevArrow     : '<div class="grd-left-arrow"><span class="dl-icon-next svg-icon"><svg><use xlink:href="#arrow-left"></use></svg></span></div>',
				nextArrow     : '<div class="grd-right-arrow"><span class="dl-icon-next svg-icon"><svg><use xlink:href="#arrow-right"></use></svg></span></div>',
				//appendArrows  : $container,
				responsive    : [
					{
						breakpoint: 1200,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 2
						}
					},
					{
						breakpoint: 768,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 1
						}
					}
				]
			});
		});
	};

	grd.counter = function () {

		var $counter = $(".counter-value .counter-number");
		if ($counter.length < 1) {
			return;
		}

		var duration = parseFloat($counter.data('duration'));
		duration = duration * 1000;
		$counter.counterUp({
			delay: 10,
			time : duration,
		});


	}

	grd.portfolio_shortcode = function () {


		var $portfolioList = $('.grd_portfolio_grid'),
			options = {
				itemSelector: '.portfolio-wrapper',
				layoutMode  : 'fitRows',
			};

		if ($('.grd-portfolio-shortcode').hasClass('grd-masonry')) {
			options = {
				itemSelector: '.portfolio-wrapper',
				layoutMode  : 'masonry',
				masonry     : {
					columnWidth: '.portfolio-sizer',
					gutter     : '.gutter-sizer'
				}
			};
		}
		$portfolioList.imagesLoaded(function () {
			$portfolioList.isotope(options);
		});


		$('.portfolio-cats-filters').on('click', '.button', function () {
			var filterValue = $(this).attr('data-filter');

			$portfolioList.isotope({filter: filterValue});
		});

		$('.button-group').each(function (i, buttonGroup) {
			var $buttonGroup = $(buttonGroup);
			$buttonGroup.on('click', 'span', function () {
				$buttonGroup.find('.active').removeClass('active');
				$(this).addClass('active');
			});
		});

		if (grd.$body.hasClass('portfolio_full-width')) {
			$('#filters').addClass('container');
		}

		// Blog page
		grd.$body.on('click', '.grd-portfolio-shortcode .numeric-navigation .next', function (e) {
			e.preventDefault();

			if ($(this).data('requestRunning')) {
				return;
			}

			$(this).data('requestRunning', true);

			var $postList = $('.grd-portfolio-shortcode .grd_portfolio_grid'),
				$pagination = $(this).parents('.navigation'),
				$parent = $(this).parent();

			$parent.addClass('loader');

			$.get(
				$(this).attr('href'),
				function (response) {
					var $content = $(response).find('#grd_portfolio_grid').children('.portfolio-wrapper'),
						pagination_html = $(response).find('.navigation').html();

					$pagination.html(pagination_html);

					$postList.append($content);

					$content.imagesLoaded(function () {
						$postList.isotope('appended', $content);
						$pagination.find('.next').data('requestRunning', false);
						$parent.removeClass('loader');
					});
				}
			);
		});

	};

	/*
	 * Toggle video banner play button
	 */
	grd.videoLightBox = function () {
		var $images = $('.mf-video-banner');

		if (!$images.length) {
			return;
		}

		var $links = $images.find('a.photoswipe'),
			items = [];

		$links.each(function () {
			var $a = $(this);

			items.push({
				html: $a.data('href')
			});

		});

		$images.on('click', 'a.photoswipe', function (e) {
			e.preventDefault();

			var index = $links.index($(this)),
				options = {
					index              : index,
					bgOpacity          : 0.85,
					showHideOpacity    : true,
					mainClass          : 'pswp--minimal-dark',
					barsSize           : {top: 0, bottom: 0},
					captionEl          : false,
					fullscreenEl       : false,
					shareEl            : false,
					tapToClose         : true,
					tapToToggleControls: false
				};

			var lightBox = new PhotoSwipe(document.getElementById('pswp'), window.PhotoSwipeUI_Default, items, options);
			lightBox.init();

			lightBox.listen('close', function () {
				$('.mf-video-wrapper').find('iframe').each(function () {
					$(this).attr('src', $(this).attr('src'));
				});
			});
		});
	};


	grd.teamCarousel = function () {
		$.each(grdShortCode.teamCarousel, function (id, imagesData) {
			var $sliders = $(document.getElementById(id));
			$sliders.not('.slick-initialized').slick({
				slidesToShow  : imagesData.slide,
				slidesToScroll: 1,
				infinite      : true,
				arrows        : imagesData.nav,
				autoplay      : imagesData.autoplay,
				autoplaySpeed : imagesData.speed,
				dots          : imagesData.dot,
				prevArrow     : '<div class="grd-left-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-left"></i></span></div>',
				nextArrow     : '<div class="grd-right-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-right"></i></span></div>',
				//appendArrows  : $container,
				responsive    : [
					{
						breakpoint: 1200,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 768,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 1
						}
					}
				]
			});
		});
	};

	grd.testimorialCarousel = function () {
		$.each(grdShortCode.testimorialCarousel, function (id, imagesData) {
			var $sliders = $(document.getElementById(id));
			$sliders.not('.slick-initialized').slick({
				slidesToShow  : imagesData.slide,
				slidesToScroll: 1,
				infinite      : false,
				arrows        : imagesData.nav,
				autoplay      : imagesData.autoplay,
				autoplaySpeed : imagesData.speed,
				dots          : imagesData.dot,
				prevArrow     : '<div class="grd-left-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-left"></i></span></div>',
				nextArrow     : '<div class="grd-right-arrow"><span class="dl-icon-next svg-icon"><i class="fa fa-angle-right"></i></span></div>',
				//appendArrows  : $container,
				responsive    : [
					{
						breakpoint: 1200,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 768,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 1
						}
					},
					{
						breakpoint: 480,
						settings  : {
							arrows: false,
							dots  : true,
                            slidesToShow: 1
						}
					}
				]
			});
		});
	};

	grd.awardCarousel = function () {

		$.each(grdShortCode.awardCarousel, function (id, imagesData) {
			var $sliders = $(document.getElementById(id));

			$sliders.find('.carousel-wrapper').not('.slick-initialized').slick({
				slidesToShow  : imagesData.slide,
				slidesToScroll: 1,
				infinite      : imagesData.infinite,
				arrows        : imagesData.nav,
				autoplay      : imagesData.autoplay,
				autoplaySpeed : imagesData.speed,
				dots          : imagesData.dot,
				prevArrow     : '<span class="svg-icon arrow-left"><svg><use xlink:href="#arrow-left"></use></svg></span>',
				nextArrow     : '<span class="svg-icon arrow-right"><svg><use xlink:href="#right-arrow"></use></svg></span>',
				responsive    : [
					{
						breakpoint: 1200,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 768,
						settings  : {
							arrows: false,
							dots  : true
						}
					},
					{
						breakpoint: 480,
						settings  : {
							arrows: false,
							dots  : false,
                            slidesToShow: 1
						}
					}
				]
			});
		});
	};

    // Google Maps
    grd.gmaps = function () {

        if (grdShortCode.length === 0 || typeof grdShortCode.map === 'undefined') {
            return;
        }

        var mapOptions = {
                scrollwheel       : false,
                draggable         : true,
                zoom              : 10,
                mapTypeId         : google.maps.MapTypeId.ROADMAP,
                panControl        : false,
                zoomControl       : true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL
                },
                scaleControl      : false,
                streetViewControl : false

            },
            customMap;

        var bounds = new google.maps.LatLngBounds();
        var infoWindow = new google.maps.InfoWindow();

        var style1 = [
            {
                'featureType': 'water',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#e9e9e9'
                    },
                    {
                        'lightness': 17
                    }
                ]
            },
            {
                'featureType': 'landscape',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#f5f5f5'
                    },
                    {
                        'lightness': 20
                    }
                ]
            },
            {
                'featureType': 'road.highway',
                'elementType': 'geometry.fill',
                'stylers': [
                    {
                        'color': '#ffffff'
                    },
                    {
                        'lightness': 17
                    }
                ]
            },
            {
                'featureType': 'road.highway',
                'elementType': 'geometry.stroke',
                'stylers': [
                    {
                        'color': '#ffffff'
                    },
                    {
                        'lightness': 29
                    },
                    {
                        'weight': 0.2
                    }
                ]
            },
            {
                'featureType': 'road.arterial',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#ffffff'
                    },
                    {
                        'lightness': 18
                    }
                ]
            },
            {
                'featureType': 'road.local',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#ffffff'
                    },
                    {
                        'lightness': 16
                    }
                ]
            },
            {
                'featureType': 'poi',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#f5f5f5'
                    },
                    {
                        'lightness': 21
                    }
                ]
            },
            {
                'featureType': 'poi.park',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#dedede'
                    },
                    {
                        'lightness': 21
                    }
                ]
            },
            {
                'elementType': 'labels.text.stroke',
                'stylers': [
                    {
                        'visibility': 'on'
                    },
                    {
                        'color': '#ffffff'
                    },
                    {
                        'lightness': 16
                    }
                ]
            },
            {
                'elementType': 'labels.text.fill',
                'stylers': [
                    {
                        'saturation': 36
                    },
                    {
                        'color': '#333333'
                    },
                    {
                        'lightness': 40
                    }
                ]
            },
            {
                'elementType': 'labels.icon',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit',
                'elementType': 'geometry',
                'stylers': [
                    {
                        'color': '#f2f2f2'
                    },
                    {
                        'lightness': 19
                    }
                ]
            },
            {
                'featureType': 'administrative',
                'elementType': 'geometry.fill',
                'stylers': [
                    {
                        'color': '#fefefe'
                    },
                    {
                        'lightness': 20
                    }
                ]
            },
            {
                'featureType': 'administrative',
                'elementType': 'geometry.stroke',
                'stylers': [
                    {
                        'color': '#fefefe'
                    },
                    {
                        'lightness': 17
                    },
                    {
                        'weight': 1.2
                    }
                ]
            }
        ];
        var style2 = [
            {
                'featureType': 'poi',
                'elementType': 'all',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'poi.attraction',
                'elementType': 'all',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'poi.business',
                'elementType': 'all',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'poi.medical',
                'elementType': 'all',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit',
                'elementType': 'labels',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit',
                'elementType': 'labels.text',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.line',
                'elementType': 'geometry.fill',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.line',
                'elementType': 'geometry.stroke',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.line',
                'elementType': 'labels.text.fill',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.line',
                'elementType': 'labels.text.stroke',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.line',
                'elementType': 'labels.icon',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            },
            {
                'featureType': 'transit.station.bus',
                'elementType': 'all',
                'stylers': [
                    {
                        'visibility': 'off'
                    }
                ]
            }
        ];

        $.each(grdShortCode.map, function (id, mapData) {
            var map_color = mapData.map_color;

            if ( mapData.style == 1 ) {
                var styles = style1;
            } else {
                var styles = style2;
            }

            customMap = new google.maps.StyledMapType(styles,
                {name: 'Styled Map'});

            if (mapData.number > 1) {
                mutiMaps(infoWindow, bounds, mapOptions, mapData, id, styles, customMap);
            } else {
                singleMap(mapOptions, mapData, id, styles, customMap);
            }

        });
    };

    function singleMap(mapOptions, mapData, id, styles, customMap) {
        var map,
            marker,
            location = new google.maps.LatLng(mapData.lat, mapData.lng);

        // Update map options
        mapOptions.zoom = parseInt(mapData.zoom, 10);
        mapOptions.center = location;
        mapOptions.mapTypeControlOptions = {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
        };

        // Init map
        map = new google.maps.Map(document.getElementById(id), mapOptions);

        // Create marker options
        var markerOptions = {
            map     : map,
            position: location
        };
        if (mapData.marker) {
            markerOptions.icon = {
                url: mapData.marker
            };
        }

        map.mapTypes.set('map_style', customMap);
        map.setMapTypeId('map_style');

        // Init marker
        marker = new google.maps.Marker(markerOptions);

        if (mapData.info) {
            var infoWindow = new google.maps.InfoWindow({
                content : '<div class="info-box mf-map">' + mapData.info + '</div>',
                maxWidth: 600
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
            });
        }
    }

    function mutiMaps(infoWindow, bounds, mapOptions, mapData, id, styles, customMap) {

        // Display a map on the page
        mapOptions.zoom = parseInt(mapData.zoom, 10);
        mapOptions.mapTypeControlOptions = {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
        };

        var map = new google.maps.Map(document.getElementById(id), mapOptions);
        map.mapTypes.set('map_style', customMap);
        map.setMapTypeId('map_style');
        for (var i = 0; i < mapData.number; i++) {
            var lats = mapData.lat,
                lng = mapData.lng,
                info = mapData.info;

            var position = new google.maps.LatLng(lats[i], lng[i]);
            bounds.extend(position);

            // Create marker options
            var markerOptions = {
                map     : map,
                position: position
            };
            if (mapData.marker) {
                markerOptions.icon = {
                    url: mapData.marker
                };
            }

            // Init marker
            var marker = new google.maps.Marker(markerOptions);

            // Allow each marker to have an info window
            googleMaps(infoWindow, map, marker, info[i]);

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }
    }

    function googleMaps(infoWindow, map, marker, info) {
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(info);
            infoWindow.open(map, marker);
        });
    }

	/**
	 * Document ready
	 */
	$(function () {
		grd.init();
	});

})(jQuery);