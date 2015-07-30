<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
		$favicon_url = get_theme_mod('fav_icon_url');
		if (trim($favicon_url) == false) {
			$favicon_url = get_template_directory_uri() . '/favicon.ico';
		}
	?>
	<link rel="icon" href="<?PHP echo $favicon_url; ?>">
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
				<h1><a href="<?PHP echo home_url("/"); ?>"><?PHP echo get_bloginfo ( 'name' ); ?></a></h1>
			  </div>
		  </div>
		</div>
		<div class="container">
			<nav id="primary-navigation" class="site-navigation primary-navigation navbar">
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
						
							if(get_theme_mod("menu_depth")=="two"){
								$menu_obj = new Walker_OERU_Menu_Depth();
							}else{
								$menu_obj = new Walker_OERU_Menu();
							}
						
							wp_nav_menu( 
									array( 
										'theme_location' => 'primary', 
										'menu_class' => 'nav navbar-nav' ,
										'walker'  => $menu_obj 
									)
								); 
								
						}
					?>
						<ul class="nav navbar-nav navbar-right">
							<?PHP
							
								if(get_theme_mod("scan_page")=="on" || get_option("oeru_theme_scan_page")=="on"):
							
									?><li><a data-toggle="modal" data-target="#siteMapmodal"><span class="glyphicon glyphicon-tree-conifer"></span></a></li><?PHP
							
								endif;
							
							?>
							<?PHP
							
								if(get_theme_mod("log_on_page")=="on"):
							
									?><li><a href="<?PHP echo wp_login_url(); ?>"><span class="glyphicon glyphicon-user"></span></a></li><?PHP
							
								endif;
							
							?>							
						</ul>
				</div>
			</nav>
		</div>
    </header>
	<div id="scroller">Scroll to the top</div>
	<div id="main" class="site-main">
