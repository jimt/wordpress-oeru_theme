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
	<?php oeru_theme_extra_style(); ?>
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
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
							
									?><li><a data-toggle="modal" data-target="#userModal"><span class="glyphicon glyphicon-user"></span></a></li><?PHP
							
								endif;
							
							?>							
						</ul>
				</div>
			</nav>
		</div>
		<?PHP if (get_theme_mod("log_on_page") == "on"):
		?><div id="userModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logintitle">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	<?php if (is_user_logged_in()):
		        ?><h4 class="modal-title" id="logintitle">Update / Logout</h4>
		      </div>
		      <div class="modal-body">
		      	<?php
		      	global $current_user, $user_ID, $user_email;
		      	get_currentuserinfo();
		      	?>
		      	<form>
		      		<div class="form-group">
		      			<label for="name">Name</label>
		      			<input type="text" class="form-control update-field" id="name" value="<?php echo $current_user->display_name; ?>">
		      		</div>
		      		<div class="form-group">
		      			<label for="useremail">Email</label>
		      			<input type="text" class="form-control update-field" id="useremail" value="<?php echo $user_email; ?>">
		      		</div>
		      		<div class="form-group">
		      			<label for="courseblog">Course blog</label>
		      			<input type="text" class="form-control update-field" id="courseblog" value="<?php echo get_user_meta($user_ID, 'url_' . get_current_blog_id(), true); ?>">
		      		</div>
		      		<?php wp_nonce_field('oeru_user_nonce', 'security'); ?>
		      	</form>
		      	<?php else:
		        ?><h4 class="modal-title" id="logintitle">Login / Register</h4>
		      	<form>
		      		<div class="form-group">
		      			<label for="username">Username</label>
		      			<input type="text" class="form-control" id="username" placeholder="user">
		      		</div>
		      		<div class="form-group regodiv" style="display: none;">
		      			<label for="name">Name</label>
		      			<input type="text" class="form-control" id="name" placeholder="Sue Smith">
		      		</div>
		      		<div class="form-group">
		      			<label for="password">Password</label>
		      			<input type="password" class="form-control" id="password">
		      		</div>
		      		<div class="form-group regodiv" style="display: none;">
		      			<label for="confirmpassword">Confirm password</label>
		      			<input type="password" class="form-control" id="confirmpassword">
		      		</div>
		      		<div class="form-group regodiv" style="display: none;">
		      			<label for="useremail">Email</label>
		      			<input type="text" class="form-control" id="useremail" placeholder="me@example.com">
		      		</div>
		      		<div class="form-group regodiv" style="display: none;">
		      			<label for="courseblog">Course blog</label>
		      			<input type="text" class="form-control" id="courseblog" placeholder="http://example.com/feed.rss">
		      		</div>
		      		<?php wp_nonce_field('oeru_user_nonce', 'security'); ?>
	      		</form>
		      	<?php endif;
	      		?><p id="userstatus" style="color: red;">&nbsp;</p>
		      	</a>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	<?php if (is_user_logged_in()):
		        ?><a href="<?php echo wp_logout_url(get_permalink());?>" class="btn btn-default oeru-user-login-button" id="logoutbutton">Logout</a>
		        <button type="button" class="btn btn-primary oeru-user-login-button" id="updatebutton">Update</button>
		      	<?php else:
		        ?><button type="button" class="btn btn-default oeru-user-login-button" id="goregisterbutton">Register</button>
		        <a class="btn btn-default oeru-user-login-button" id="goforgotbutton" href="<?php echo wp_lostpassword_url(get_permalink()); ?>">Forgot password</a>
		        <button type="button" class="btn btn-primary oeru-user-login-button" id="loginbutton">Login</button>
		        <button type="button" class="btn btn-primary oeru-user-login-button" style="display: none;" id="registerbutton">Register</button>
		        <button type="button" class="btn btn-default oeru-user-login-button" style="display: none;" id="gologinbutton">Login</button>
		      	<?php endif;
		      ?></div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?PHP endif;
		?>
    </header>
	<div id="scroller">Scroll to the top</div>
	<div id="main" class="site-main">
