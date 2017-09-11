(function($){
	
	$(document).ready(function(){

		// Mobile menu toggle
		$('#hamburger-menu').click(function(){
			$(this).toggleClass('open');
			$('.nav-menu-container').toggleClass('open');
		});

		// Desktop opening hours toggle
		$('.opening-hours-section').click(function(){
			$('#opening-hours-pull-out').toggleClass('open');
		});

		$('#opening-hours-close').click(function(){
			$('#opening-hours-pull-out').removeClass('open');
		});

		// Home Page Slider
		$('.slider-section').unslider({
			arrows: false,
			autoplay: true,
			infinite: true,
			delay: 9000
		});

		// Content Accordian
		$('#accordion').find('.accordion-toggle').click(function(){

	      	//Expand or collapse this panel
	      	$(this).next().slideToggle('fast');

		    //Hide the other panels
		    $(".accordion-content").not($(this).next()).slideUp('fast');

	    });

	});
})(jQuery);