<?PHP

	query_posts( array( 'post_type' => 'post', 'posts_per_page' => 4, 'category_name' => "Front Page" ) );

	$first_post = TRUE;
	
	echo "HELLO";

	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();
		
			if($first_post){
			
				get_template_part( 'content', get_post_format() );
				$first_post = FALSE;
			
			}else{
		
				get_template_part( 'content-columns-3', get_post_format() );
				
			}
			
		endwhile;

	else :
	
		get_template_part( 'content', 'none' );
		
	endif;