jQuery(document).ready(function($) {
	"use strict";

	if ($(".xswpph-post:checked").length == $(".xswpph-post").length) {
        $(".xswpph-posts").prop('checked', true);
    }

	$('.xswpph-post').change(function(){
		var xswpph_value = "#" + $(this).val();
		if($(this).prop("checked") == true){
			$(xswpph_value).show();
		}else{
			$(xswpph_value).hide();
		}
		if ($(".xswpph-post:checked").length == $(".xswpph-post").length) {
        	$(".xswpph-posts").prop('checked', true);
    	}else{
    		$(".xswpph-posts").prop('checked', false);
    	}
	});
    
	$(".xswpph-form").find('.xswpph-post').each(function(){
		if($(this).is(":checked")){
			var xswpph_value = "#" + $(this).val();
			$(xswpph_value).show();
		}
	});
	
	$(".xswpph-posts").change(function() {
        $(".xswpph-post").prop("checked", $(this).prop("checked"));
        if($(this).prop("checked") == true){
        	$('.xswpph-enables').show();
        }else{
        	$('.xswpph-enables').hide();
        }
    });

});