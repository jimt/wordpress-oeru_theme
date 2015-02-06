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
	the_excerpt();
	echo oeru_theme_excerpt_more("");
	?>			
	</div> <?PHP
	if ( comments_open() || get_comments_number() ) {
	?><div id="comment_holder"><?PHP
		comments_template();
	?></div><?PHP
	} ?>
	</div>