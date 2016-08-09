jQuery.fn.simpleSlide = function(a){

	a				= a || {};
	a.duration		= a.duration || 2500;
	a.transition	= a.transition || 2000;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("slide-active")
			.css('z-index','10');

	setInterval(function(){

			var $active = jQuery("img.slide-active",jQuery(c));

			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			$active
				.addClass("slide-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("slide-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					$active
						.removeClass('slide-active slide-last-active')
						.css('z-index','8');
				});
		}, a.duration);

}


jQuery.fn.simpleSlider = function(a){

	a				= a || {};
	a.duration		= a.duration || 3000;
	a.transition	= a.transition || 2500;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("slider-active")
			.css('z-index','10');

	setInterval(function(){

			var $active = jQuery("img.slider-active",jQuery(c));

			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			$active
				.addClass("slider-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("slider-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					$active
						.removeClass('slider-active slide-last-active')
						.css('z-index','8');
				});
		}, a.duration);

}



jQuery.fn.simpleSlidera = function(a){

	a				= a || {};
	a.duration		= a.duration || 3500;
	a.transition	= a.transition || 3000;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("slidera-active")
			.css('z-index','10');

	setInterval(function(){

			var $active = jQuery("img.slidera-active",jQuery(c));

			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			$active
				.addClass("slidera-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("slidera-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					$active
						.removeClass('slidera-active slide-last-active')
						.css('z-index','8');
				});
		}, a.duration);

}



jQuery.fn.simpleSliderb = function(a){

	a				= a || {};
	a.duration		= a.duration || 4000;
	a.transition	= a.transition || 3500;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("sliderb-active")
			.css('z-index','10');

	setInterval(function(){

			var $active = jQuery("img.sliderb-active",jQuery(c));

			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			$active
				.addClass("sliderb-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("sliderb-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					$active
						.removeClass('sliderb-active sliderb-last-active')
						.css('z-index','8');
				});
		}, a.duration);

}