function oeru_fitb_theme_check(event){

	var data = {
		submission: jQuery(event.currentTarget).val(),
		answer: jQuery(event.currentTarget).attr("answer"),
		nonce : wordpress_oeru_theme_fitb_shortcode.answerNonce,
		action : "oeru_fitb"
	};

	jQuery.post(wordpress_oeru_theme_fitb_shortcode.ajaxurl, data, function(response) {
	
		if(response == "true"){
			jQuery(event.currentTarget)
				.addClass("has-success")
				.removeClass("has-error");
		}else{
			jQuery(event.currentTarget)
				.removeClass("has-success")
				.addClass("has-error");
		}
		
	});

}

jQuery(document).ready(
	function(){
		jQuery( ".oeru_fitb" )
			.blur(
				function(event){				
					oeru_fitb_theme_check(event);					
				}
			)
			.keyup(
				function(event){
					if(event.keyCode==13){
						oeru_fitb_theme_check(event);
					}
				}
			)
	}
);