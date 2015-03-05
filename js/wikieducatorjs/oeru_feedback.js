jQuery(document).ready(
	function(){
		$( ".oeru_feedback" )
			.on( "click",
				function(event){
				
					if(jQuery(event.currentTarget)
						.parent()
						.children()
						.last().is(":visible")){
				
						jQuery(event.currentTarget)
							.parent()
							.children()
							.last()
							.css("display","none");

					
					}else{
					
						jQuery(event.currentTarget)
							.parent()
							.children()
							.last()
							.css("display","block");
							
					}
					
				}
			)
			.on( "keyup",
				function(event){
				
					if(jQuery(event.currentTarget)
						.parent()
						.children()
						.last().is(":visible")){
				
						jQuery(event.currentTarget)
							.parent()
							.children()
							.last()
							.css("display","none");

					
					}else{
					
						jQuery(event.currentTarget)
							.parent()
							.children()
							.last()
							.css("display","block");
							
					}
					
				}
			)
	}
);