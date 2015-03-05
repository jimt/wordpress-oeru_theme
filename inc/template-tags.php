<?php

function oeru_third_level_menu(){

	global $post;
	
	if(strpos($post->post_content, "[oeru_remove_third]") == FALSE){

		if(isset($post->post_parent)){
		
			$parent = get_post($post->post_parent);
			
			if($parent->post_parent!=0){
			
				$the_query = new WP_Query( 'posts_per_page=9999&post_type=page&post_parent=' . $post->post_parent . "&orderby=ID&order=ASC" );
		
				if ( $the_query->have_posts() ) {
				
					?>
					<div class="container third-level-nav">
					<div class="row">
						<div class="col-md-12">
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="nomargin panel-heading">
										<h2 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">
												<span class="glyphicon glyphicon-th-list"></span>Orientation
											</a>
										</h2>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in">
										<div id="pagenav" class="panel-body">
											<div class="row"><?PHP
			   
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$id = get_the_id();			
						$title = get_the_title();
						
						?><div class="col-md-4">
							<a href="<?PHP echo get_the_permalink($id); ?>">
								<div class="pagenav"><?PHP echo $title; ?></div>
							</a>
						</div><?PHP
						
					}
					
					?></div>
		  </div>
		</div>
	  </div>
	</div>
	</div>
	</div>
	</div><?PHP
				
				}
			
			}
			
		}
	
	}

	wp_reset_query();

}

function oeru_theme_extra_style(){

	?><style>
	
		html,
		section,
		.not-home header.container,
		.home article header
		{
			/*#FBFAF6*/
			background-color: <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>;
			/* 000 */
			color: <?PHP echo get_theme_mod('site_allsite_colour'); ?>;
		}
		
		footer
		{
			/* #868A8D; */
			color: <?PHP echo get_theme_mod('site_footer_colour'); ?>;
			/* #42484D; */
			background-color: <?PHP echo get_theme_mod('site_footer_background_colour'); ?>;
		}
		
		.nav > li > a:hover, .nav > li > a:focus {
			/*#004d92*/
			text-decoration: none;
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>; 
			color: <? echo get_theme_mod('site_menu_text_hover_colour'); ?>;
		}
		
		.button, input[type=submit] {
			/*#004d92*/
			border-bottom: 3px solid <?PHP echo get_theme_mod('site_menu_background_colour'); ?>; 
		}
		
		@media only screen and (max-width: 992px) .navbar-collapse {
			/*#004d92*/
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>; 
		}
		
		.greenbg {
			/*#004d92*/
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>;
		}

		nav a,
		#main .panel-heading h2{
			/* #c2cddd */
			color :  <?PHP echo get_theme_mod('site_menu_text_colour'); ?>;
		}
		
		.breadcrumb a {
			/* #c2cddd */
			color :  <?PHP echo get_theme_mod('site_menu_text_colour'); ?>;
		}
		
		.breadcrumb a:hover, a:focus {
			color: <? echo get_theme_mod('site_menu_text_hover_colour'); ?>;
		}

		.breadcrumb > li + li:before {
			/* #c2cddd */
			color :  <?PHP echo get_theme_mod('site_menu_text_colour'); ?>; 
		}
		
		.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
			color: <?PHP echo get_theme_mod('site_menu_text_hover_colour'); ?>;
			background-color: <?PHP echo get_theme_mod('site_menu_background_hover_colour'); ?>;
		}
		
		body .accordion .ui-state-active,
		body .nav > li > a:hover, 
		body .nav > li > a:focus, 
		body .nav .current a,
		.oeru_idevice{
			/* #00417A; #003564 */
			background-color: <?PHP echo get_theme_mod('site_menu_background_hover_colour'); ?>;  
			color: <?PHP echo get_theme_mod('site_menu_text_hover_colour'); ?>;  
		}
		
		body .ui-state-active, 
		body .ui-accordion-header{
			/* #00417A; #003564 */
			background: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>;  
			color: <?PHP echo get_theme_mod('site_menu_text_hover_colour'); ?>;  
		}

		nav .dropdown-menu {
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?> !important; 
		}

		nav {
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>; 
		}
		
		.brandtext > h1 a:hover, a:focus, .brandtext > h1 a {
			color: <?PHP echo get_theme_mod('site_header_colour'); ?>; 
		}
		
		.pager li > a, .pager li > span {
			border: 1px solid <?PHP echo get_theme_mod('site_header_colour'); ?>; 
			color: <?PHP echo get_theme_mod('site_header_colour'); ?>; !important; 
		}
	
		header, 
		.panel-heading,
		.faqnav .nav > .active > a,
		.faqnav .nav > li >a:hover,
		.navbar-toggle,
		.panel-default > .panel-heading,
		.button{
			/*#005aab*/
			background-color: <?PHP echo get_theme_mod('site_header_colour'); ?>; 
		}
		
		.not-home header div h1 a,
		article header .row h1 a{
			color: <?PHP echo get_theme_mod('site_header_colour'); ?>; 
		}
		
		h1, h2, h3, h4, h5, h6, summary,
		#bodyContent h1,
		#bodyContent h2,
		#bodyContent h3,
		#bodyContent h4,
		#bodyContent h5,
		#bodyContent h6{
			/*#005aab*/
			color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>;
		}
		
		.navbar-toggle .icon-bar
		{
			background-color: <?PHP echo get_theme_mod('site_menu_text_colour'); ?>; 
		}

		header .row a
		{
			background-color: #FFF;
			color: <?PHP echo get_theme_mod('site_alllink_colour'); ?>;
		}

		a{
			/*#6FA92E;*/
			color: <?PHP echo get_theme_mod('site_alllink_colour'); ?>;
		}
		
		a:hover,
		a:focus{
			/* #6FA92E; */
			color: <?PHP echo get_theme_mod('site_alllink_hover_colour'); ?>;
		}
				
		header#masthead > div:first-child {
			background-color: <?PHP echo get_theme_mod('site_top_background_colour'); ?>;
		}		
		
		.mini-submenu{
			/* #428bca; */
			background-color: <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>;
			border: 1px solid <?PHP echo get_theme_mod('site_submenu_colour'); ?>;
		}
		
		.mini-submenu .icon-bar {
			background-color: <?PHP echo get_theme_mod('site_submenu_colour'); ?>;
		}

		.sidemenu {
			background-color: <?PHP echo get_theme_mod('site_submenu_colour'); ?>;
		}
		
		.course-register-button {
			/* #6EA72D */
			background-color:  <?PHP echo get_theme_mod('site_button_colour'); ?> !important; 
			/* #fff */
			color: <?PHP echo get_theme_mod('site_button_text_colour'); ?>;
		}
		
		body .pager li > a, body .pager li > span{
			border: 1px solid <?PHP echo get_theme_mod('site_button_background_colour'); ?>;
			color: <?PHP echo get_theme_mod('site_button_colour'); ?> !important;
			background-color: <?PHP echo get_theme_mod('site_button_text_colour'); ?> !important;
		}
		
		.course-content .row span:first-child h4 {
			color: <?PHP echo get_theme_mod('site_button_colour'); ?>;
		}  
		
		body .button, body input[type=submit] {
			background-color: <?PHP echo get_theme_mod('site_button_colour'); ?> !important; 
			color: <?PHP echo get_theme_mod('site_button_text_colour'); ?>;
			border-bottom: none;
		}
		
		.body button a{
			color: <?PHP echo get_theme_mod('site_button_text_colour'); ?>;
		}
		
		.subscribe-button a { 
			background-color: <?PHP echo get_theme_mod('site_button_colour'); ?> !important; 
			color: <?PHP echo get_theme_mod('site_button_text_colour'); ?>;
		}
		
		.pagenav {
			/* #D0E9FF; */
			background-color: <?PHP echo get_theme_mod('site_pagenav_colour'); ?>; 
		}
		
		#pagenav .current {
			/* #98D6F6; */
			background-color: <?PHP echo get_theme_mod('site_pagenav_current_colour'); ?>;   
		}
		
		article .container .row .panel,
		article header .row,
		.home article .entry-content{
			/* #98D6F6; */
			background-color: <?PHP echo get_theme_mod('site_content_background_colour'); ?>;   
		}
		
		.accordion .ui-widget-content{
			background: <?PHP echo get_theme_mod('site_content_background_colour'); ?>;   
			color: <?PHP echo get_theme_mod('site_allsite_colour'); ?>;
		}
		
		nav ul li .current-menu-item a{
			background: <?PHP echo get_theme_mod('site_menu_background_current_colour'); ?>;  
			background-color: <?PHP echo get_theme_mod('site_menu_background_current_colour'); ?>;  
		}
		
	</style><?PHP

}

function oeru_theme_body_class() {

	if( ! is_home() ){
		return array("not-home");
	}
	
	if( is_home() ){
	
		$layout = get_theme_mod('layout_style');
		
		switch($layout){
			case 'front_page_featured_columns' : 
			case 'all_pages_no_parent_excerpt_2' : 
			case 'all_pages_no_parent_excerpt_3' : 
			case 'all_pages_no_parent_excerpt_4' : return array("columns"); break;
			case "default" : return ""; break;
		}

	}

}

function oeru_theme_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function oeru_theme_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'oeru_theme' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}

function oeru_theme_remove_next( $content ) {
		
	if(get_theme_mod("next_button")=="off"){
	
		$dom = new DOMDocument('1.0', 'utf-8');
		@$dom->loadHTML($content);

		$xpath = new DOMXPath($dom);

		$items = $xpath->evaluate("//*[contains(@class, 'next')]");

		foreach($items as $elem){
			$elem->parentNode->removeChild($elem);
		}
		
		$content = $dom->saveHTML();
		
		return $content;
		
	}else{
		return $content;
	}
	
}
add_filter("the_content", "oeru_theme_remove_next");

function oeru_theme_remove_prev( $content ) {
	
	if(get_theme_mod("prev_button")=="off"){
		$dom = new DOMDocument('1.0', 'utf-8');
		@$dom->loadHTML($content);

		$xpath = new DOMXPath($dom);

		$items = $xpath->evaluate("//*[contains(@class, 'previous')]");

		foreach($items as $elem){
			$elem->parentNode->removeChild($elem);
		}
		
		$content = $dom->saveHTML();
		
		return $content;
	}else{
		return $content;
	}
}
add_filter("the_content", "oeru_theme_remove_prev");