/* vim: set noet ts=8 sw=8:  */
jQuery(document).ready(
	function(){
		var $ = jQuery,
		    days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
		    months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		function hour(d) {
			var a = 'AM',
			    h = d.getHours();
			if (h >= 12) {
				h = h - 12;
				a = 'PM';
			}
			if (h === 0) {
				h = 12;
			}
			h = h.toString();
			return {h: h, a: a};
		}

		function minute(d) {
			var r = d.getMinutes().toString();
			if (r.length === 1) {
				r = '0' + r;
			}
			return r;
		}

		jQuery( ".oeru_details" )
			.on( "click",
				function(event){
				
					if(jQuery(event.currentTarget)
						.children()
						.last().is(":visible")){
				
						if(jQuery(event.currentTarget)
							.children()
							.first()
							.children()
							.first()
							.hasClass("accordion-icon")){
				
							jQuery(event.currentTarget)
								.children()
								.first()
								.children()
								.first()
								.html("+");
								
						}
							
						jQuery(event.currentTarget)
							.children()
							.last()
							.css("display","none");

					
					}else{
					
						if(jQuery(event.currentTarget)
							.children()
							.first()
							.children()
							.first()
							.hasClass("accordion-icon")){
						
							jQuery(event.currentTarget)
								.children()
								.first()
								.children()
								.first()
								.html("-");
								
						}
					
						jQuery(event.currentTarget)
							.children()
							.last()
							.css("display","block");
							
					}
					
				}
			);
		jQuery('.weLTime').attr('data-toggle', 'tooltip')
			.each(function() {
				var t = $(this).attr('title'),
				    d = new Date(t),
				    h = hour(d),
				    m = minute(d),
				    ds = days[d.getDay()] + ', ' + months[d.getMonth()] + ' ' + d.getDate() + ' ' + h.h + ':' + m + h.a + ' ' + d.toString().replace(/.*\(([^)]+)\)$/, '$1'),
				    html = $(this).html();
				// replace SPAN with A to get theme styling
				$(this).replaceWith('<a class="weLTime plainlinks" data-toggle="tooltip" title="' + ds + '">' + $(this).html() + '</a>');
			});
		$('.weLTime').tooltip();
	}
);
