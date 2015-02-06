<?PHP

	query_posts( array( 'post_type' => 'page', 'posts_per_page' => 100 ) );

	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();
		
			$post = get_post(get_the_ID());
			
			if($post->post_parent==0){
		
				get_template_part( 'content', get_post_format() );
				
			}
			
		endwhile;

	else :
	
		get_template_part( 'content', 'none' );
		
	endif;