function scrollToMovie_details () {
	$.scrollTo( $('#movie-details'), {
		duration: 1600,
		offset: { 'left':0, 'top': -45 },
		easing: 'easeInOutExpo',
		onAfter: function(){
			$('#movie-details .loading').hide().animate('opacity', 0);
			$.waypoints('refresh');
			$.waypoints('enable');
		}
	});
}

function resize_images() {
	$('.movies-list .list img.p').each(function(){
		var _image = $(this)
		$.ajax({
		type: "POST",
		url: "/resize.php",
		data: "width="+$(window).width()+"&image="+_image.attr('data-src'),
		success: function(msg) {
			_image.attr('src','/'+msg)
			//_image.removeClass('loading_image')
		}
		})
	})
	$('#theatres .map-canvas img').each(function(){
		var _image = $(this)
		$.ajax({
		type: "POST",
		url: "/resize.php",
		data: "width="+$(window).width()+"&image="+_image.attr('data-src'),
		success: function(msg) {
			_image.attr('src','/'+msg)
			//_image.removeClass('loading_image')
		}
		})
	})
}

$(document).ready(function() {
	resize_images();
});


$(function() {

	$('#sticky-bar .running')
	.hide()
		.ajaxStart(function() {
			$(this).show();
		})
			.ajaxStop(function() {
				$(this).hide();
			});

	var load_movie_details = function(url) {
	  $.ajax({
	    headers : { 'X-Content-Only':'true' },
	    type: "GET",
	    url: url,
	    cache: true,
		success:function(data)
		{
			//$('title').html(title);
			$('#movie-details').html(data);
			$.waypoints('disable');
		}
	  }).done(function() {
			$('#movie-details').slideDown(800);
			scrollToMovie_details ();
	  });
	};

	$('.movies-list .btn').on('click', function() {
		var self = $(this);
		var url = self.attr('href');
		load_movie_details(url);
		$('#movie-details .loading').show().animate('opacity', 1);
		history.pushState(null, null, url);
		return false;
	}); //onclick
});


$(window).setBreakpoints({
    distinct: true, 
    breakpoints: [
        480,
        768,
        980,
        1200
    ] 
});

$(function() {
	var nav_container = $('.sticky-container');
	var nav = $('#sticky-bar');
	nav_container.waypoint(
		function(direction){
			if (direction=='down') {
				nav.addClass('sticky');
			} else {
				nav.removeClass('sticky');
			}
		},
		{ offset: 50 }
	);
	var sections = $('section');
	var navigation_links = $('#sticky-bar nav a');
	sections.waypoint(function(direction){
		var active_section;
		active_section = $(this);
		if (direction === 'up') active_section = active_section.prev();
		var active_link = $('nav a[data-id="#' + active_section.attr('id') + '"]');
		navigation_links.parent().removeClass('active');
		active_link.parent().addClass('active');
		shash_active = '/'+active_section.attr('id');
	},
	{ offset: '13%' }
	);

});

$(function() {
	$('.sticky-container #sticky-bar nav a').click( function(event) {
		event.preventDefault();
		$.scrollTo( $(this).attr("data-id"), {
			duration: 1600,
			offset: { 'left':0, 'top': 0 },
			easing: 'easeInOutExpo'
		});
	});
});

$(document).ready(function(){

	$("<select />").appendTo('#sticky-bar .container');
	$("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
	}).appendTo('#sticky-bar .container select');

	$('#sticky-bar ul.nav li a').each(function() {
		var el = $(this);
		$("<option />", {
		"value"   : el.attr("href"),
		"text"    : el.text()
		}).appendTo('#sticky-bar .container select');
	});
	$('#sticky-bar .container select').change(function() {
		window.location = $(this).find("option:selected").val();
	});
});

 

$(document).ready(function(){

	function movies_list_img_scale () {
		$('.movies-list .list').each(function(){
			$(this).find('img.p').cjObjectScaler({
				method: "fill",
				fade: 800
			});
		});
	}
	movies_list_img_scale ();

	$(window).bind('enterBreakpoint1200',function() {
	    movies_list_img_scale ();
	    resize_images();
	});

	$(window).bind('enterBreakpoint768',function() {
	    movies_list_img_scale ();
	    resize_images();
	});

	$(window).bind('enterBreakpoint980',function() {
	    movies_list_img_scale ();
	    resize_images();
	});

	$(window).bind('enterBreakpoint480',function() {
	    movies_list_img_scale ();
	    resize_images();
	});
 
});

$(function() {
	$('.movies-list .list').hover(function(){
        $(".cover", this).stop().animate({bottom:'0'},{queue:false,duration:160});
        $(".cover", this).find('h2').stop().animate({'margin-top':'25px'},{queue:false,duration:160});
    }, function() {  
        $(".cover", this).stop().animate({bottom:'-175px'},{queue:false,duration:160});
        $(".cover", this).find('h2').stop().animate({'margin-top':'7px'},{queue:false,duration:160});
    });

	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
    // $('#aboutus .para').parallax("50%", 0.3);

	$('#theatres-accordion').on('shown', function () {
		$.waypoints('refresh');
	}).on('hidden', function () {
		$.waypoints('refresh');
	});
});

$(window).bind('load', function() {
	var cur_loc_moviedetails = document.location.search.split("movieid=")[1];
	if (cur_loc_moviedetails && cur_loc_moviedetails.length > 0) {
		$('#movie-details').show(function(){
			scrollToMovie_details ();
		});
	}
	$.waypoints('refresh');
});

$(function(){
	function camera () {
		$('#camera_wrap').camera({
			alignment: 'topCenter',
			height: '35%',
			loader: 'none',
			pagination: false,
			thumbnails: false,
			easing: 'easeInOutExpo',
			fx: 'scrollHorz',
			hover: false,
			time: 3000
		});
	};
	var l = $('#camera_wrap .slide').length;
	$('#camera_wrap .slide').each(function(){
		var _image = $(this)
		$.ajax({
		type: "POST",
		url: "/resize.php",
		data: "width="+$(window).width()+"&image="+_image.attr('data-rel'),
		success: function(msg) {
			_image.attr('data-src','/'+msg)
		}
		})

		l--;
		if( l == 0) {
			$(window).bind("load", function() {
			    camera();
			});
			return false;
		}
	})

});

$(document).ready(function() {

	$(".various-iframe").fancybox({
		fitToView	: true,
		width		: '90%',
		height		: '90%',
		helpers: {
			overlay: {
				locked: false
			}
		}
	});
	$(".various-map").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers: {
			overlay: {
				locked: false
			}
		}
	});

	$(".various-gal").fancybox({
		fitToView	: true,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers: {
			overlay: {
				locked: false
			}
		}
	});
});


$(document).ready(function (){
  $("#newsticker").marquee();
});


$(document).ready(function() {
	$(".nav .booknow a").click(function(e) {
	   e.preventDefault();
	   window.open($(this).attr("href"), this.target);
	});
});