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
  	<link rel="icon" href="<?php echo $favicon_url; ?>">
  	<?php oeru_theme_extra_style(); ?>
  	<?php wp_head(); ?>
  	<!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  	<![endif]-->
</head>
<body <?php body_class(oeru_theme_body_class()); ?>>
    <script>var dataLayer = window.dataLayer = window.dataLayer || [];</script>
    <!-- Google Tag Manager --> <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WVTG5T" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-WVTG5T');</script> <!-- End Google Tag Manager -->

<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
    		<div>
    		<?php	if (get_header_image()!="") : ?>
    		    <div class="container header_image" style="background:url(<?php echo get_header_image(); ?>) 0px 0px / cover no-repeat">
    		</div>
        <?php endif; ?>
    		<div class="container">
            <div class="brandtext">
                <h1><a href="<?php echo home_url("/"); ?>"><?php echo get_bloginfo ( 'name' ); ?></a></h1>
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
    					  <?php if ( has_nav_menu( "primary" ) ) {
        						if (get_theme_mod("menu_depth")=="two"){
        						    $menu_obj = new Walker_OERU_Menu_Depth();
        						}
                    else{
        						   	$menu_obj = new Walker_OERU_Menu();
        						}
        						wp_nav_menu(array('theme_location' => 'primary',
          							'menu_class' => 'nav navbar-nav' ,
          							'walker'  => $menu_obj)
          							);
        						}
    					  ?>
    					       <ul class="nav navbar-nav navbar-right">
    					  <?php if (get_theme_mod("scan_page")=="on" || get_option("oeru_theme_scan_page")=="on"): ?>
                          <li><a data-toggle="modal" data-target="#siteMapmodal"><span class="glyphicon glyphicon-tree-conifer"></span></a></li>
                <?php endif; ?>
    					  <?php if (get_theme_mod("log_on_page")=="on"): ?>
                          <li><a data-toggle="modal" data-target="#userModal"><span class="glyphicon glyphicon-user"></span></a></li>
                <?php endif; ?>
    					       </ul>
    				    </div>
    			  </nav>
    		</div>
		<?php if (get_theme_mod("log_on_page") == "on"): ?>
        <div id="userModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logintitle">
            <div class="modal-dialog">
    		        <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php if (is_user_logged_in()): ?>
                        <h4 class="modal-title" id="logintitle">Update / Logout</h4>
                    </div>
                    <div class="modal-body">
                        <?php $current_user = wp_get_current_user(); ?>
    		      	    <form>
    		      	  	<div class="form-group">
		      		    	<label for="userpreferences">Change User Settings</label>
  			                <span id="helpPreferences" class="help-block">You can <a href="wp-admin/profile.php">generate a new password or change your display name/nickname</a>. Changes here will affect your details across any OERu courses in which you're participating.</span>
        		      	</div>
                        <?php
                            // get a blog URL if one exists.
                            $blog = '';
                            $blog = get_user_meta($current_user->ID, 'url_' . get_current_blog_id(), true);

                            $country = get_user_meta($current_user->ID, 'usercountry', true);
                            $blog_platform = get_user_meta($current_user->ID, 'blog_platform_' . get_current_blog_id(), true);
                            $blog_info = get_user_meta($current_user->ID, 'blog_info_' . get_current_blog_id(), true);
                            if ($blog) {
                              $blog_info = $blog;
                            }
                        ?>
        			    <div class="form-group">
          		      		<label for="usercountry">Set your Country of Origin</label>
          				    <?php oeru_show_country_field( $country ); ?>
          			      	<span id="helpCountry" class="help-block">The country with which you most closely identify.</span>
        		      	</div>
        		      	<div class="form-group" id="userbloginfo">
                            <?php oeru_show_blog_field($blog_platform, $blog_info); ?>
        		      	</div>
        	      		<?php wp_nonce_field('oeru_user_nonce', 'security'); ?>
        		      	</form>
    		      	<?php else: ?>
                    <h4 class="modal-title" id="logintitle">Login / Register</h4>
                    <p class="modal-info">If you already have login credentials for this site, by logging in now, you will be registered for this course. If you do not yet have a login, please "Register" below.</p>
         		      	<form>
          		      		<div class="form-group">
            		      			<label for="username">Username</label>
            		      			<input type="text" class="form-control" id="username" placeholder="user" aria-describedby="helpUsername">
            		      			<span id="helpUsername" class="help-block">Use lower case letters and numbers, no spaces or special characters.</span>
          		      		</div>
          		      		<div class="form-group regodiv" style="display: none;">
            		      			<label for="name">Display Name</label>
            		      			<input type="text" class="form-control" id="name" placeholder="Sue Smith">
            		      			<span id="helpName" class="help-block">Your publicly visible name/nickname.</span>
          		      		</div>
          		      		<div class="form-group">
            		      			<label for="password">Password</label>
            		      			<input type="password" class="form-control" id="password" aria-describedby="helpPassword">
            		      			<span id="helpPassword" class="help-block">At least 6 characters.</span>
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
                                <label for="usercountry">Country of origin</label>
                                <?php oeru_show_country_field(); ?>
                                <span id="helpUserCountry" class="help-block" style="display: block;">Select the country with which you most closely identify.</span>
        		      	    </div>
        		      		<div class="form-group regodiv" id="userbloginfo" style="display: none;">
                            <!--<div class="form-group regodiv" id="userbloginfo">-->
                                <label for="courseblog">Course blog feed URL</label>
                                <?php oeru_show_blog_field(); ?>
          		      		</div>
         	      	     	<?php wp_nonce_field('oeru_user_nonce', 'security'); ?>
        	      		</form>
    		      	<?php endif; ?>
                    <p id="userstatus" style="color: red;">&nbsp;</p>
                </div>
                <div class="modal-footer">
      		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    		      	<?php if (is_user_logged_in()): ?>
                    <a href="<?php echo wp_logout_url(get_permalink());?>" class="btn btn-default oeru-user-login-button" id="logoutbutton">Logout</a>
        		        <button type="button" class="btn btn-primary oeru-user-login-button" id="updatebutton">Update</button>
    		      	<?php else: ?>
                    <button type="button" class="btn btn-default oeru-user-login-button" id="goregisterbutton">Register</button>
        		        <a class="btn btn-default oeru-user-login-button" id="goforgotbutton" href="<?php echo wp_lostpassword_url(get_permalink()); ?>">Forgot password</a>
        		        <button type="button" class="btn btn-primary oeru-user-login-button" id="loginbutton">Login</button>
        		        <button type="button" class="btn btn-primary oeru-user-login-button" style="display: none;" id="registerbutton">Register</button>
        		        <button type="button" class="btn btn-default oeru-user-login-button" style="display: none;" id="gologinbutton">Login</button>
    		      	<?php endif; ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php endif; ?>
</header>
</div><!-- /.page -->
