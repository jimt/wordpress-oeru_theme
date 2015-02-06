<?PHP

	query_posts( array( 'post_type' => 'post', 'posts_per_page' => 1000, 'category_name' => "Front Page" ) );

	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();
		
			get_template_part( 'content-columns-2', get_post_format() );
			
		endwhile;

	else :
	
		get_template_part( 'content', 'none' );
		
	endif;