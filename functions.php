<?php

require_once("inc/Walker_OERU_Menu.php");

function oeru_theme_setup() {

	if(!get_option("oeru_course_config")){
	
		require_once("inc/install_profile.php");
		add_option("oeru_course_config", "true");
		
	}

	load_theme_textdomain( 'oeru_theme', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
	
	$chargs = array(
		'width' => 980,
		'height' => 150,
		'uploads' => true,
	);
	
	add_theme_support( 'custom-header', $chargs );
	
	set_post_thumbnail_size( 672, 372, true );

	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'oeru_theme' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
add_action( 'after_setup_theme', 'oeru_theme_setup' );

function oeru_theme_widgets_init(){
	$args = array(
		'name'          => __( 'Footer', 'oeru_theme' ),
		'id'            => 'footer-sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	);
	
	register_sidebar( $args );
}
add_action( 'widgets_init', 'oeru_theme_widgets_init' );

function oeru_theme_add_category(){
	$cat_defaults = array(
		'cat_name' => "Front Page Featured",
		'category_description' => "Items to feature on the front page",
		'category_nicename' => "front-page",
		'taxonomy' => 'category' 
	);
	wp_insert_term("Front Page", "category", $catarr);
}
add_action( 'after_setup_theme', 'oeru_theme_add_category' );

function oeru_theme_scripts_and_styles() {
	
	wp_enqueue_style( 'wordpress-oeru-theme-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-layout', get_template_directory_uri() . '/css/layout.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-typography', get_template_directory_uri() . '/css/typography.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-colours', get_template_directory_uri() . '/css/colours.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-core-alter', get_template_directory_uri() . '/css/oeru_theme_core_alter.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1' );
	wp_register_style('jquery-custom-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/eggplant/jquery-ui.css', array(), '1', 'screen'); 
	wp_enqueue_style('jquery-custom-style');

	wp_enqueue_script( 'wordpress-oeru_theme-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-quiz', get_template_directory_uri() . '/js/wikieducatorjs/quiz.js', array('wordpress-oeru_theme-jquery'), array(), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-menu-fix', get_template_directory_uri() . '/js/menu-fix.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('wordpress-oeru_theme-accordion', get_stylesheet_directory_uri() . '/js/oeru_accordion.js', array('jquery') );

}
add_action( 'wp_enqueue_scripts', 'oeru_theme_scripts_and_styles' );

function oeru_theme_admin_page(){
	add_menu_page('OERu Theme', 'OERU Theme', 'manage_options', 'oeru-theme-admin', 'oeru_theme_options');
}
add_action('admin_menu', 'oeru_theme_admin_page');

function oeru_theme_options(){
	?><h1>OERu Theme</h1>
	<p>You can use the <a href="<?PHP echo site_url("wp-admin"); ?>/customize.php">Site Customiser</a> to alter page colours and add logos</p>
	<h2>Layout Options</h2>
	<div style="text-align:center">
	<h3>Front Page Category One Wide then three</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/one_three.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/one_three.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings in the 4 most recent, or 4 in total of the posts in the "Front Page" Category</p>
	<h3>Front Page Category (columns) Only and All Pages (without a parent) in a 2 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/two_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/two_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings in the "Front Page" Category posts and displays them 2 abreast, or all pages</p>
	<h3>All Pages (without a parent) in a 3 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/three_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/three_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings all pages and displays them 3 abreast</p>
	<h3>All Pages (without a parent) in a 4 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/four_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/four_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings all pages and displays them 4 abreast</p>
	<h3>Recent Posts</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/recent_posts.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/recent_posts.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>Standard WordPress display of most recent posts</p>
	<h3>Custom HTML</h3>
	<p>You can also use the theme customizer to add custom HTML to the front page</p>
	</div>
	<?PHP
}

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

// Add ShortCodes
require get_template_directory() . '/inc/shortcode.php';
