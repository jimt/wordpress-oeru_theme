<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-body">
		<?PHP
		
			if ( is_single() ) :
				the_title( '<h1>', '</h1>' );
			else :
				the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
				
		?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="entry-and-comments container">	
		<div class="entry-content">
		<?php
		the_content( sprintf(
			__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arte_et_industria' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'arte_et_industria' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) ); ?>		
		</div> <?PHP
	if ( comments_open() || get_comments_number() ) {
		?><div id="comment_holder"><?PHP
			comments_template();
		?></div><?PHP
	} ?>
	</div>
	<?PHP

?></article>
