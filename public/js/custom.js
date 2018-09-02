$(document).ready(function(){
	"use strict";
	
//	$('#datetimepicker4').datetimepicker();
	$('.menu-button').click(function(){
		
		$('body').toggleClass('menu-open');
	});

	$('.dashboard-collapse').click(function(){
		$(".dashboard-menu").toggleClass('dashboard-expand');
	});

	$('.dashboard-close').click(function(){
		$(".dashboard-menu").removeClass('dashboard-expand');
	});

	
	
	$(window).resize(function(){
		
		if( $(window).width() > 767 )
			{
				$('body').removeAttr('class');
			}
		
	});

  
	
	
});