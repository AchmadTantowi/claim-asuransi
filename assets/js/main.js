jQuery(function ($) {
    "use strict";
	
	/*	Table OF Contents
	==========================
	1-Navigation
	2-Accordain
	3-TABS
	4-Tweets
	5-Flexslider
	6-Carouselfredsel Slider
	7-Portfolio
	8-Contact
	
	*/
	
	 /*==================================
		1-Navigation
	====================================*/
	/*mobilemenu*/
    $('ul.navbar-nav').mobileMenu({
        defaultText: 'GoTo',
        className: 'mobile-menu',
        subMenuDash: '&ndash;'
    });
	$('.scrollto').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000);
        return false;
    });
	
	
	$('ul.nav li.dropdown').click(
        function () {

            var state = $(this).data('toggleState');
            if (state) {
                $(this).children('ul.dropdown-menu').slideUp();
            } else {
                $(this).children('ul.dropdown-menu').slideDown();
            }
            $(this).data('toggleState', !state);
        });
	
	
	 /*==================================
		2-Accordain
	====================================*/
    $("#accordion").collapse();
    $('.panel-title > a').click(function () {
        $('.active .accordain-icon').addClass('icon-plus', 200).removeClass('icon-minus', 200);
        $('.panel-title > a').removeClass('active');
        $(this).addClass('active');
        $('.active .accordain-icon').removeClass('icon-plus', 200).addClass('icon-minus', 200);
    });
	
	 /*==================================
		3-TABS
	====================================*/
	$('.nav-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});
	
	/*==================================
		4-Tweets
	====================================*/

    $('.tweets-widget').tweetable({
        username: 'envato',
        time: true,
        rotate: false,
        limit: 3,
        replies: false,
        position: 'append',
        loading: 'Loading Tweets...',
        failed: "Sorry, twitter is currently unavailable for this user.",
        html5: true,
        onComplete: function () {
            $("<span class='icon-twitter tweet-ico'></span>").insertBefore(".tweetList li p");
        }
    });
	
	
	/*================================
	5-Flexslider
	================================*/
	
	
	
	$('#showcase-flex,#team-slider').flexslider({
	  animation: "slide",
	  directionNav: true,
	  controlNav: false,
	  pauseOnHover: true, 
	  slideshowSpeed: 17000, 
	  direction: "horizontal" //Direction of slides
	});
	$('.testi-flex').flexslider({
	  animation: "slide",
	  directionNav: false,
	  controlNav: false,
	  pauseOnHover: true, 
	  slideshowSpeed: 10000, 
	  direction: "horizontal" //Direction of slides
	});
	
	$('#project-slider').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav: true,
        pauseOnHover: true,
        slideshowSpeed: 4000,
        direction: "horizontal" //Direction of slides
    });
	
	
	
	
	$('#homeFlex').flexslider({
	  animation: "slide",
	  directionNav: false,
	  controlNav: false,
	  pauseOnHover: true, 
	  slideshowSpeed: 17000, 
	  direction: "horizontal" //Direction of slides
	});
	
	$('#promoslide').flexslider({
	  animation: "slide",
	  directionNav: false,
	  controlNav: true,
	  pauseOnHover: true, 
	  slideshowSpeed: 6000, 
	  direction: "horizontal" //Direction of slides
	});
	
	$('#testi-flex').flexslider({
	  animation: "slide",
	  directionNav: false,
	  controlNav: true,
	  pauseOnHover: true, 
	  slideshowSpeed: 6000, 
	  direction: "horizontal" //Direction of slides
	});
	
	/*================================
	6-Carouselfredsel Slider
	================================*/
	
	
	$(window).on("resize", function () {
		
		$('.portfolio-wrapper').carouFredSel({
            width: "100%",
            circular: false,
			infinite: false,
            auto: false,
            scroll: {
                items: 1,
                easing: "linear"

            },
            prev: {
                button: "#project-prev",
                key: "left"
            },
            next: {
                button: "#project-next",
                key: "right"
            },
        });
	
	 }).resize();
	/*================================
	7-Portfolio
	================================*/
	
	$("a[data-rel^='prettyPhoto']").prettyPhoto({social_tools:false});
	
    var $containerfolio = $('.showcase');
    if($containerfolio.length) {
        $containerfolio.isotope({
            layoutMode: 'fitRows',
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    }
    $('.filter-out li a').click(function () {
        $('.filter-out li').removeClass("active");
        $(this).parent().addClass("active");
        var selector = $(this).attr('data-filter');
        $containerfolio.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });
	
	/*================================
	8-Contact
	================================*/	
	if($('#contact-map').length)
	{
	 	var contact_map = 'contact-map',
        mapAddress = $('#contact-map').data('address'),
        mapType = $('#contact-map').data('maptype'),
        zoomLvl = $('#contact-map').data('zoomlvl');
		xv_contactemaps(contact_map, mapAddress, mapType, zoomLvl);
	}
	
    function xv_contactemaps(selector, address, type, zoom_lvl) {
        var map = new google.maps.Map(document.getElementById(selector), {
            mapTypeId: google.maps.MapTypeId.type,
            scrollwheel: false,
            draggable: false,
            zoom: zoom_lvl
        });
       
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
                'address': address
            },
            function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                    });
                    map.setCenter(results[0].geometry.location);
                }
            });
    }
	

});