var opened=0;

function nav_menu_icon() {
	if (opened) {
		opened=0;
		$('#top-nav').slideUp(500).removeClass('nav-hover');
		$('#top-nav #nav1').removeClass('no-display');
		$('#top-nav #nav2').addClass('no-display');
		$('#top-nav ul').hide();
	}
	else {
		opened=1;
		$('#top-nav').slideDown(80);
		$('#top-nav').addClass('nav-hover');
		$('#top-nav #nav2').removeClass('no-display');
		$('#top-nav #nav1').addClass('no-display');
		$('#top-nav ul').css('display','inline-block');
	}
	
	$('.nav-menu-icon').toggleClass('open');
}

function show_map() {
	$('#map-schedule #schedule').hide();
	$('#map-schedule #map').show();
	$('#map-schedule #map-nav').addClass('active');
	$('#map-schedule #schedule-nav').removeClass('active');
}
function show_schedule() {
	$('#map-schedule #map').hide();
	$('#map-schedule #schedule').show();
	$('#map-schedule #schedule-nav').addClass('active');
	$('#map-schedule #map-nav').removeClass('active');
	$('html,body').animate({scrollTop:$('#map-schedule').offset().top},500);
}

function show_galery() {
	$('#photos-galery').css('z-index','1');
	$('.image-slide').hide();
	$('#slider-opened-buttons').show();
}

function hide_galery() {
	$('#photos-galery').css('z-index','');
	$('.image-slide').show();
	$('#slider-opened-buttons').hide();
}

function isScrolledIntoView(elem)
{
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();
	var elemTop = $('#main-bottom').offset().top;
	var elemBottom = elemTop + $('#main-bottom').height();
	return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom) && (elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

function fadable_content() {
	$('.fadable-content').each(function() {
		a = $(this).offset().top + $(this).height()/3;
		b = $(window).scrollTop() + $(window).height();
		if (a < b) $(this).fadeTo(600,1);
	});
}

$(window).ready(function() {
	$('.fadable-content').fadeTo(0,0);
	fadable_content();
	
	$('a').on('click touchend', function(e) {
		var link = $(this).attr('href');
		window.location = link;
	});
});

$(window).scroll(function() {
	
	
	fadable_content();
	
	
	//if(isScrolledIntoView($('#main-bottom')))
	//{
		/*var height = $('#main-scroll-effect').innerHeight();
		$('#main-scroll-effect').css('height', height+'px');
		$('#main-scroll-effect div').hide().delay(1000).fadeIn(500);
		$(window).unbind('scroll');*/
	//}    
});

$(function(){
	
	"use strict";
	
	var lastScrollTop = 0;
	var targetBlock = $('#popular-cruises');
	var heroHeight = $('.hero').height();
	var allowToScrollDown = true;
	var allowToScrollUp = true;
	var preventWholePageScroll = false;
	
	$(window).on('resize', function(){
		heroHeight = $('.hero').height();
	});
	
	$(window).on('mousewheel', function(e){
		if (preventWholePageScroll) {
			e.preventDefault();
			e.stopPropagation();
		}
	});
	
	$(window).scroll(function(){
		if(!$('.book-top').is(':visible')){
		var st = $(window).scrollTop();

		if (st > lastScrollTop && st < heroHeight && allowToScrollDown){
			
			allowToScrollDown = false;
			allowToScrollUp = false;
			preventWholePageScroll = true;
			
			$('html, body').animate({
				scrollTop: targetBlock.offset().top 
			}, 500, function(){
				allowToScrollDown = true;
				allowToScrollUp = true;
				preventWholePageScroll = false;
			});

		} else if (st < lastScrollTop && st <= heroHeight && allowToScrollUp) {
		
			allowToScrollUp = false;
			allowToScrollDown = false;
			preventWholePageScroll = true;

			$('html, body').animate({
				scrollTop: 0
			}, 500, function(){
				allowToScrollUp = true;
				allowToScrollDown = true;
				preventWholePageScroll = false;
			});
		}
		lastScrollTop = st;
		}
	});
});


