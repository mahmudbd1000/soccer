/* ========================================================================= */
/*	Preloader
 /* ========================================================================= */

jQuery(window).load(function() {

    $("#preloader").fadeOut("slow");

});

/* ========================================================================= */
/*  Welcome Section Slider
 /* ========================================================================= */

$(function() {

    var Page = (function() {

        var $navArrows = $('#nav-arrows'),
                $nav = $('#nav-dots > span'),
                slitslider = $('#slider').slitslider({
            onBeforeChange: function(slide, pos) {

                $nav.removeClass('nav-dot-current');
                $nav.eq(pos).addClass('nav-dot-current');

            }
        }),
        init = function() {

            initEvents();

        },
                initEvents = function() {

                    // add navigation events
                    $navArrows.children(':last').on('click', function() {

                        slitslider.next();
                        return false;

                    });

                    $navArrows.children(':first').on('click', function() {

                        slitslider.previous();
                        return false;

                    });

                    $nav.each(function(i) {

                        $(this).on('click', function(event) {

                            var $dot = $(this);

                            if (!slitslider.isActive()) {

                                $nav.removeClass('nav-dot-current');
                                $dot.addClass('nav-dot-current');

                            }

                            slitslider.jump(i + 1);
                            return false;

                        });

                    });

                };

        return {init: init};

    })();

    Page.init();

});



$(document).ready(function() {

    /* ========================================================================= */
    /*	Menu item highlighting
     /* ========================================================================= */

  

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            $(".navbar-brand a").css("color", "#fff");
            $("#navigation").removeClass("animated-header");
        } else {
            $(".navbar-brand a").css("color", "inherit");
            $("#navigation").addClass("animated-header");
        }
    });

    /* ========================================================================= */
    /*	Fix Slider Height
     /* ========================================================================= */

    // Slider Height
    var slideHeight = $(window).height();

    $('#home-slider, #slider, .sl-slider, .sl-content-wrapper').css('height', slideHeight);

    $(window).resize(function() {
        'use strict',
                $('#home-slider, #slider, .sl-slider, .sl-content-wrapper').css('height', slideHeight);
    });



    $("#works, #testimonial").owlCarousel({
        navigation: true,
        pagination: false,
        slideSpeed: 700,
        paginationSpeed: 400,
        items: 4,
        autoPlay: 3000,
        stopOnHover: true,
        navigationText: ["<i class='fa fa-angle-left fa-lg'></i>", "<i class='fa fa-angle-right fa-lg'></i>"],
        itemsDesktop: [1000, 3], // 2 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 601px
        itemsTablet: [700, 1], // 2 items between 600 and 480
        itemsMobile: [479, 1], // 1 item between 479 and 0
    });


});


/* ==========  START GOOGLE MAP ========== */

// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

    var myLatLng = new google.maps.LatLng(33.812206, -116.49434);

    var mapOptions = {
        zoom: 15,
        center: myLatLng,
        disableDefaultUI: true,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{
                featureType: 'water',
                stylers: [{
                        color: '#46bcec'
                    }, {
                        visibility: 'on'
                    }]
            }, {
                featureType: 'landscape',
                stylers: [{
                        color: '#f2f2f2'
                    }]
            }, {
                featureType: 'road',
                stylers: [{
                        saturation: -100
                    }, {
                        lightness: 45
                    }]
            }, {
                featureType: 'road.highway',
                stylers: [{
                        visibility: 'simplified'
                    }]
            }, {
                featureType: 'road.arterial',
                elementType: 'labels.icon',
                stylers: [{
                        visibility: 'off'
                    }]
            }, {
                featureType: 'administrative',
                elementType: 'labels.text.fill',
                stylers: [{
                        color: '#444444'
                    }]
            }, {
                featureType: 'transit',
                stylers: [{
                        visibility: 'off'
                    }]
            }, {
                featureType: 'poi',
                stylers: [{
                        visibility: 'off'
                    }]
            }]
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map-canvas');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(33.812206, -116.49434),
        map: map,
        icon: 'img/icons/map-marker.png',
    });
}

// ========== END GOOGLE MAP ========== //



