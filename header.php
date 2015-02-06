<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?PHP echo get_theme_mod("fav_icon_url"); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php oeru_theme_extra_style(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(oeru_theme_body_class()); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div>
		  <?PHP
			if(get_header_image()!="") : ?>
		  <div class="container header_image" style="background:url(<?PHP echo get_header_image(); ?>) 0px 0px / cover no-repeat">
		  </div>
		  <?PHP
			endif;
		  ?>
		  <div class="container">
			  <div class="brandtext">
				<h1><a href="<?PHP echo home_url("/"); ?>">OCL4Ed</a></h1>
			  </div>
		  </div>
		</div>
		<div class="container">
			<nav id="primary-navigation" class="site-navigation primary-navigation navbar" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<?php
			
						if ( has_nav_menu( "primary" ) ) {
						
							wp_nav_menu( 
									array( 
										'theme_location' => 'primary', 
										'menu_class' => 'nav navbar-nav' ,
										'walker'  => new Walker_OERU_Menu() 
									)
								); 
								
						}
					?>
						<ul class="nav navbar-nav navbar-right">
							<li><a data-toggle="modal" data-target="#siteMapmodal"><span class="glyphicon glyphicon-tree-conifer"></span></a></li>
							<li><a data-toggle="modal" data-target="#usermodal"><span class="glyphicon glyphicon-user"></span></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
    </header>
	<div id="main" class="site-main">
