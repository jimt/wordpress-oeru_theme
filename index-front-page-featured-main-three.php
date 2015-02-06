<?PHP

	query_posts( array( 'post_type' => 'post', 'posts_per_page' => 4, 'category_name' => "Front Page" ) );

	$first_post = TRUE;

	if ( have_posts() ) :
		
		while ( have_posts() ) : the_post();
		
			if($first_post){
			
				get_template_part( 'content-main', get_post_format() );
				$first_post = FALSE;
				?><div id="featured_three"><?PHP
				
			}else{
				
				get_template_part( 'content-columns-3-main', get_post_format() );
				
			}
			
		endwhile;
		
		?></div><?PHP

	else :
	
		get_template_part( 'content', 'none' );
		
	endif;