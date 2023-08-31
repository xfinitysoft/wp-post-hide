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
	 $('#xswpph_name , #xswpph_email , #xswpph_message').on('change',function(e){
        if(!$(this).val()){
            $(this).addClass("error");
        }else{
            $(this).removeClass("error");
        }
    });
    $('.xswpph_support_form').on('submit' , function(e){ 
    	e.preventDefault();
    	$('.xs-send-email-notice').hide();
        $('.xswpph-mail-spinner').addClass('xswpph_is_active');
        $('#xswpph_name').removeClass("error");
        $('#xswpph_email').removeClass("error");
        $('#xswpph_message').removeClass("error"); 
    	
    	$.ajax({ 
			url:ajaxurl,
			type:'post',
			data:{'action':'xswpph_send_mail','data':$(this).serialize()},
			beforeSend: function(){
				if(!$('#xswpph_name').val()){
                    $('#xswpph_name').addClass("error");
                    $('.xs-send-email-notice').removeClass('notice-success');
                    $('.xs-send-email-notice').addClass('notice');
                    $('.xs-send-email-notice').addClass('error');
                    $('.xs-send-email-notice').addClass('is-dismissible');
                    $('.xs-send-email-notice p').html('Please fill all the fields');
                    $('.xs-send-email-notice').show();
                    $('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    $('.xswpph-mail-spinner').removeClass('xswpph_is_active');
                    return false;
                }
                 if(!$('#xswpph_email').val()){
                    $('#xswpph_email').addClass("error");
                    $('.xs-send-email-notice').removeClass('notice-success');
                    $('.xs-send-email-notice').addClass('notice');
                    $('.xs-send-email-notice').addClass('error');
                    $('.xs-send-email-notice').addClass('is-dismissible');
                    $('.xs-send-email-notice p').html('Please fill all the fields');
                    $('.xs-send-email-notice').show();
                    $('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    $('.xswpph-mail-spinner').removeClass('xswpph_is_active');
                    return false;
                }
                 if(!$('#xswpph_message').val()){
                    $('#xswpph_message').addClass("error");
                    $('.xs-send-email-notice').removeClass('notice-success');
                    $('.xs-send-email-notice').addClass('notice');
                    $('.xs-send-email-notice').addClass('error');
                    $('.xs-send-email-notice').addClass('is-dismissible');
                    $('.xs-send-email-notice p').html('Please fill all the fields');
                    $('.xs-send-email-notice').show();
                    $('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    $('.xswpph-mail-spinner').removeClass('xswpph_is_active');
                    return false;
                }
                $(".xswpph_support_form :input").prop("disabled", true);
                $("#xswpph_message").prop("disabled", true);
                $('.xswpph-send-mail').prop('disabled',true);
			},
			success: function(res){
				 $('.xs-send-email-notice').find('.xs-notice-dismiss').show();
                $('.xswpph-send-mail').prop('disabled',false);
                $(".xswpph_support_form :input").prop("disabled", false);
                $("#xswpph_message").prop("disabled", false);
                if(res.status == true){
                    $('.xs-send-email-notice').removeClass('error');
                    $('.xs-send-email-notice').addClass('notice');
                    $('.xs-send-email-notice').addClass('notice-success');
                    $('.xs-send-email-notice').addClass('is-dismissible');
                    $('.xs-send-email-notice p').html('Successfully sent');
                    $('.xs-send-email-notice').show();
                    $('.xs-notice-dismiss').show();
                    $('.xswpph_support_form')[0].reset();
                }else{
                    $('.xs-send-email-notice').removeClass('notice-success');
                    $('.xs-send-email-notice').addClass('notice');
                    $('.xs-send-email-notice').addClass('error');
                    $('.xs-send-email-notice').addClass('is-dismissible');
                    $('.xs-send-email-notice p').html('Sent Failed');
                    $('.xs-send-email-notice').show();
                    $('.xs-notice-dismiss').show();
                }
                $('.xswpph-mail-spinner').removeClass('xswpph_is_active');
			}

		});
    });
    $('.xs-notice-dismiss').on('click',function(e){
		e.preventDefault();
		$(this).parent().hide();
		$(this).hide();
	});

});