jQuery(document).ready(
	function(){
	
		jQuery("li.sub-menu")
			.click(
				function(){
				
					elem =  jQuery(this)
								.children()
								.last();
				
					if(!jQuery(elem).is(":visible")){
					
						console.log("here in submenu show");
					
						jQuery(elem)
							.css("display","block");
										
					}else{
					
						console.log("here in submenu hide");
					
						jQuery(elem)
								.css("display","none");
						
					}
					
					event.stopPropagation();
					
				}
				
			);
			
		jQuery("li.parent-menu")
			.click(
				function(event){
					
					console.log("OH NO");
				
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
	
		/*
		jQuery(document)
			.click(
				function(event){
				
					console.log(event.target);
				
					if(jQuery(event.target).hasClass("dropdown")){
					
						console.log("here");
						
						elem = jQuery(event.target)
									.children()
									.last()
									
								if(jQuery(elem).is(":visible")){ 
									jQuery(elem)
										.css("display", "none");
								}else{
									jQuery(elem)
										.css("display", "block");
								}
								
					}else if(jQuery(event.target).hasClass("icon-bar")){
						
						
					}else{
					
						console.log("BOOM");
					
						jQuery(".dropdown ul")
							.each(
								function(index,value){
									if(jQuery(value).is(":visible")){
									
										console.log("hello");
									
										jQuery(value)
											.css("display","none");
									}
								}
							);
					
					}
				}
			);*/
			
			/*.each(
				function(index,value){
				
					console.log("here");
				
					jQuery(this)
						.click(
							function(){
								elem = jQuery(this)
									.children()
									.last()
								if(jQuery(elem).is(":visible")){ 
									jQuery(elem)
										.css("display", "none");
								}else{
									jQuery(elem)
										.css("display", "block");
								}
							}
						);
				}
			);*/
	}
);