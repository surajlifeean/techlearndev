$(document).ready(function(){
	"use strict";
	
//	$('#datetimepicker4').datetimepicker();
	$('.menu-button').click(function(){
		
		$('body').toggleClass('menu-open');
	});
	
	$(window).resize(function(){
		
		if( $(window).width() > 767 )
			{
				$('body').removeAttr('class');
			}
		
	});
	
	
});