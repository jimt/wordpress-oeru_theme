<?PHP

	query_posts( array( 'post_type' => 'page', 'posts_per_page' => 1000 ) );

	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();
		
			get_template_part( 'content', get_post_format() );
			
		endwhile;

	else :
	
		get_template_part( 'content', 'none' );
		
	endif;