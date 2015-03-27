jQuery(document).ready(
	function(){
		$(function() {
			var icons = {
			  header: "ui-icon-circle-arrow-e",
			  activeHeader: "ui-icon-circle-arrow-s"
			};
			
			jQuery( ".accordion" )
				.each(
					function(index,value){
					
						if(isNaN(jQuery(value).attr("active"))){
							active = false;
						}else{
							active = parseInt(jQuery(value).attr("active")) - 1;
						}
					
						jQuery(value).accordion({
						  icons: icons,
						  active: active,
						  collapsible: true
						});
					
					}
				);
			jQuery( "#toggle" ).click(function() {
			  if ( jQuery( ".accordion" ).accordion( "option", "icons" ) ) {
				jQuery( ".accordion" ).accordion( "option", "icons", null );
			  } else {
				jQuery( ".accordion" ).accordion( "option", "icons", icons );
			  }
			});
		  });
	}
);