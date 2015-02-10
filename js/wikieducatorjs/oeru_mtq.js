function mtq_parse(obj){

	correct = 0;
	total = 0;

	jQuery(obj)
		.parent()
		.parent()
		.children()
		.each(
			function(index,value){
				
				status = jQuery(value)
					.children()
					.first()
					.attr("status");
					
				if(status!="undefined"){
					
					checked = jQuery(value)
						.children()
						.first()
						.is(":checked");
					
					console.log(status + " " + checked);
	
					if(status == "correct"){
						total+=1;
						if(checked == true){
							correct+=1;
						}else{
							correct-=1;
						}
					}
					
					if(status == "incorrect"){ 
						total+=1;
						if(checked == true){
							correct-=1;
						}else{
							correct+=1;
						}
					}
				
				}
				
			}
		);
		
	if(correct == total){
		jQuery(obj)
			.parent()
			.parent()
			.children()
			.last()
			.html('<span class="correct"><span class="glyphicon glyphicon-ok"></span></span>' + jQuery(obj).parent().parent().attr("success"));
	}else{
		jQuery(obj)
			.parent()
			.parent()
			.children()
			.last()
			.html('<span class="incorrect"><span class="glyphicon glyphicon-remove"></span></span>' + jQuery(obj).parent().parent().attr("failure"));
	}

}

jQuery(document).ready(
	function(){
		$( ".mtq_submit" )
			.keydown(
				function(event){
					mtq_parse(this);
				}
			)
			.click(
				function(event){
					mtq_parse(this);
				}
			)
	}
);