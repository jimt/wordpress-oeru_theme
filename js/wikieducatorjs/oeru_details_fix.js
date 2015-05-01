jQuery(document).ready(
	function(){
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
			)
	}
);