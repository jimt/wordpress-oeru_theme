function setSwipeable(a, dir) {
        var $ = jQuery,
            $a = $(a),
            dst;
        if ($a.length) {
                dst = $a.attr('href');
                if (dir == 'left') {
                  $('body').swipe({
                    swipeLeft:function(event, direction, distance, duration, fingercount) {
                      // feedback that we are responding
                      $('#content').css('visibility', 'hidden');
                      window.location.href = dst;
                    },
                    threshold: 100
                  });
                } else {
                  $('body').swipe({
                    swipeRight:function(event, direction, distance, duration, fingercount) {
                      $('#content').css('visibility', 'hidden');
                      window.location.href = dst;
                    },
                    threshold: 100
                  });
                }
        }
}

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

	
        setSwipeable('.previous>a', 'right');
        setSwipeable('.next>a', 'left');
} );

