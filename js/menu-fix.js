jQuery(document).ready(
	function(){
	
		jQuery("li.sub-menu")
			.click(
				function(){
				
					console.log("here");
				
					elem =  jQuery(this)
								.children()
								.last();
				
					if(!jQuery(elem).is(":visible")){
					
						console.log("here in submenu show");
					
						jQuery(elem)
							.css("display","block");
										
					}else{
					
						console.log("sub-menu-hide");
					
						if(jQuery(event.currentTarget).hasClass("menu-item-has-children")){
						
							console.log("here i am");
						
							jQuery(elem)
								.css("display","none");
								
						}
						
					}
					
					event.stopPropagation();
					
				}
				
			);
			
		jQuery("li.parent-menu")
			.click(
				function(event){
					
					console.log("here");
					
					elem =  jQuery(this)
								.children()
								.last();
				
					if(!jQuery(elem).is(":visible")){
							
						jQuery("ul.dropdown-menu")
							.each(
								function(index,value){
									
									if(jQuery(value).is(":visible")){
									
										jQuery(value)
											.css("display","none");
									
									}
								
								}
							);
							
						jQuery(elem)
							.css("display","block");
										
					}else{
					
						if(jQuery(event.currentTarget).hasClass("sub-menu")){
						
							console.log("here first");
						
							jQuery(elem)
								.css("display","none");
							
						}else{
							
							if(jQuery(event.currentTarget).hasClass("parent-menu")){
								
								if(jQuery(event.currentTarget).hasClass("menu-item-has-children")){
								
									jQuery(elem)
										.css("display","none");
										
								}
								
							}
							
						}
					
					}
					
				}
					
					
			);
	
		
		jQuery(document)
			.click(
				function(event){
					if(!jQuery(event.currentTarget.activeElement).hasClass("dropdown-toggle")){
						jQuery(".dropdown-menu")
							.each(
								function(index,value){
									jQuery(value)
										.css("display","none");
								}
							);
					}
				
				}
			);
	}
);