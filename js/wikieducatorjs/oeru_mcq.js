jQuery(document).ready(
	function(){
		jQuery( ".oeru_mcq" )
			.keydown(			
				function(event){
				
					if(jQuery(this).is(':checked')){
				
						jQuery(this)
							.next()
							.next()
							.css("display","block");
					
					}else{
					
						jQuery(this)
							.next()
							.next()
							.css("display","none");
					
					}
				}
			)
			.click(
				function(event){
				
					if(jQuery(this).is(':checked')){
					
						jQuery(this)
							.next()
							.next()
							.css("display","block");
					
					}else{
					
						jQuery(this)
							.next()
							.next()
							.css("display","none");
					
					}
					
				}
			)
	}
);