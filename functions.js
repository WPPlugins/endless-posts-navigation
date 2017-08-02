jQuery(document).ready(function(){
	jQuery('div.epn_settings_div code').click(function(){
		
		jQuery(this).animate({opacity:0.6},100,"linear",function(){
		  jQuery(this).animate({opacity:1},100);
		});

	});
	
	});