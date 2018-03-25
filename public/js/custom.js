$(document).ready(function(){
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