jQuery(document).ready(
	function(){
		$( ".oeru_fitb" )
			.keyup(
				function(event){
				
					var data = {
						submission: jQuery(event.currentTarget).val(),
						answer: jQuery(event.currentTarget).attr("answer"),
						nonce : wordpress_oeru_theme_fitb_shortcode.answerNonce,
						action : "oeru_fitb"
					};
		
					jQuery.post(wordpress_oeru_theme_fitb_shortcode.ajaxurl, data, function(response) {
						if(response == "true"){
							jQuery(event.currentTarget)
								.parent()
								.html(jQuery(event.currentTarget).val())
								.css("color","#0f0")
								.css("font-weight","bold");
						}
					});
					
				}
			)
	}
);