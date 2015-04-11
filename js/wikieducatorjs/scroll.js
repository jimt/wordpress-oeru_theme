jQuery( document ).ready( function( $ ) {

	jQuery(document)
		.scroll(
			function(){

				if(jQuery(document).scrollTop() > 800){
					jQuery("#scroller").fadeIn(400);
				}else{
					jQuery("#scroller").fadeOut(400);
				}

			}
		);

	jQuery("#scroller")
		.on("click", function(){
				jQuery('html, body').animate({scrollTop: 0}, 2000);
			}
		);

	
} );