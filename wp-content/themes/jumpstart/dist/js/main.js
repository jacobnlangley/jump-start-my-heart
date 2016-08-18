$(function() { // document.ready

	// fastclick
	FastClick.attach(document.body);

	$('.cities-trigger').click(function(e) {
		e.preventDefault();
		$(this).parents('.full-width').siblings('.mega-menu').toggleClass('active hidden');
		$(this).parents('.full-width').siblings('.mega-menu').find('.cities').toggleClass('active hidden');
		$(this).parents('.full-width').siblings('.mega-menu').find('.agents').removeClass('active hidden');
	});

	$('.agents-trigger').click(function(e) {
		e.preventDefault();
		$(this).parents('.full-width').siblings('.mega-menu').toggleClass('active');
		$(this).parents('.full-width').siblings('.mega-menu').find('.agents').toggleClass('active');
		$(this).parents('.full-width').siblings('.mega-menu').find('.cities').removeClass('active');
	});

	$('.menu-icon').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).siblings('.mobile-city-menu').toggleClass('active');
		$(this).siblings('.mobile-neighborhood-menu').removeClass('active');
	});

	$('.mobile-cities-trigger').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parents('.mobile-city-menu').siblings('.mobile-neighborhood-menu').toggleClass('active');
	});

	$('.mobile-neighborhoods-trigger').click(function(e) {
		e.preventDefault();
		$(this).siblings('.neighborhoods').toggleClass('active');
		$(this).children('.fa-angle-right').toggleClass('hidden');
		//$(this).parents('.mobile-city-menu').siblings('.mobile-neighborhood-menu').toggleClass('active');
	});

	//Sticky header
	$(window).scroll(function() {

		if($(this).scrollTop() > 50 && $(this).width() > 1024){
			$('header nav.mobile-menu').removeClass('sticky');
			$('header > nav.hide-for-medium-down').addClass('sticky');
		} else if($(this).scrollTop() > 50 && $(this).width() <= 1024){
			$('header > nav.show-for-medium-down').removeClass('sticky');
			$('header nav.mobile-menu').addClass('sticky');
		} else {
			//
		}
	});

	//Filtering
	if ($('body').hasClass('citylist')) {
		//Amenities Sorting
		$('.neighborhoods-list li').addClass('active');
		$('.filter-by li').click(function() {
			updateView($(this).data('category'));
		});

		//Price Filtering
		$('.neighborhoods-list li').addClass('active');
		$('.filter-by-price li').click(function() {
			updateView($(this).data('category'));
		});

		$('[name="mobile-filterby"]').change(function() {
			updateView($(this).val());
		});

	}

	function updateView(neighborhoods) {

		$('.neighborhoods-list li').removeClass('active');
		$('.neighborhoods-list > li').each(function(){
			var filterVal = $(this).data('neighborhoods');
			if(filterVal.indexOf(neighborhoods) > -1) {
				$(this).addClass('active');
			}
		});
	}

	//Input via classie.js
	function onInputFocus( ev ) {
		classie.add( ev.target.parentNode, 'filled' );
	}

	function onInputBlur( ev ) {
		if( ev.target.value.trim() === '' ) {
			classie.remove( ev.target.parentNode, 'filled' );
		}
	}

	// scoped to /agents/[neighborhood]
	if ($('body').hasClass('agent') ) {

		// var isMobile = {
		// 	Android: function() { return navigator.userAgent.match(/Android/i); },
		// 	BlackBerry: function() { return navigator.userAgent.match(/BlackBerry/i); },
		// 	iOS: function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
		// 	Opera: function() { return navigator.userAgent.match(/Opera Mini/i); },
		// 	Windows: function() { return navigator.userAgent.match(/IEMobile/i); },
		// 	any: function() { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); }
		// };

		// whether object is empty or not
		// if (isMobile) {

		// }

		$.fn.inView = function() {

			// set context of this to be element
			var el = $(this),

			// get element height
			elHeight = el.height(),

			// get element height from top of window
			elVertPosition = el.offset().top,

			// get height of window
			windowHeight = $(window).height(),

			// get current vertical scroll position
			scrollVertPosition = $(window).scrollTop();

			// when element is the same as scroll position minus half of window then visible is true
			if ( elVertPosition <= ( windowHeight / 2 ) + scrollVertPosition && elVertPosition + elHeight >= ( windowHeight / 2 ) + scrollVertPosition ) {

				// return value for this function
				return true;

			} else {

				// return value for this function
				return false;

			}

		};

		if ( $(window).width() < 1024 ) {

			var allElements = $(".ll-agents-single");

			allElements.each(function(i, element) {

				if ( $(element).inView() ) {

					$(element).addClass('inView');

				} else {

					$(element).removeClass('inView');

				}

			});

			$(window).scroll(function(event) {

				allElements.each(function(i, element) {

					if ( $(element).inView() ) {

						$(element).addClass('inView');

					} else {

						$(element).removeClass('inView');

					}

				});

			});

		}

	}

});
