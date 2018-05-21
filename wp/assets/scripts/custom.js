jQuery(document).ready(function($) {

// Portfolio category filter

var category = GetURLParameter('category');

 if (category == null) {
 	$('.portfolio').children('div.product-img').show();
 	$('a.all').parent().addClass('active');
 }else{
 	$('.portfolio').children('div.product-img').hide();
 	$('.portfolio').children('div.product-img.' + category).show();
 	$('a.' + category).parent().addClass('active');
 }


$('.filter li a').click(function() {
	var filterClass = $(this).attr('class');

	$('.filter li').removeClass('active');
	$(this).parent().addClass('active');

	if(filterClass == 'all') {
		$('.portfolio').children('div.product-img').show();
	}
	else {
		$('.portfolio').children('div:not(.' + filterClass + ')').hide();
		$('.portfolio').children('div.' + filterClass).show();
	}

	return false;
});


function GetURLParameter(sParam) {
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split('&');
	for (var i = 0; i < sURLVariables.length; i++) {
		var sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] == sParam) {
			return sParameterName[1];
		}
	}
};

// Hover active class

$('.categories li a').click(function(){
	$('li a').removeClass("active");
	$(this).addClass("active");
});


$('.menu li a').click(function(){
	$('li a').removeClass("menu-active");
	$(this).addClass("menu-active");
});

// Lightbox


$(function() {
    $('body').removeClass('fade-out');
});


// Responsive navigation


  $("#toggle").click(function() {
    $(this).toggleClass("on");
    $(".responsive-nav").toggleClass("show");

  });



});

