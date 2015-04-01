<?php

function oeru_theme_menu_default() {

	if(!get_option("oeru_theme_menu_create")){
	
		require_once("inc/theme_guidance.php");
		$menu_id = oeru_theme_create_menu();
		if($menu_id == false){
			wp_delete_nav_menu("OERu Import Menu");
			$menu_id = oeru_theme_create_menu();
		}
		oeru_theme_menu_hierarchy($menu_id, 0, 0);
		$locations = get_theme_mod('nav_menu_locations');
		$locations['primary'] = $menu_id;
		set_theme_mod('nav_menu_locations', $locations);
		add_option("oeru_theme_menu_create", "true");
		
	}

}
add_action( 'admin_head', 'oeru_theme_menu_default' );

function oeru_theme_setup() {

	if(!get_option("oeru_course_colour_profile_setup")){
	
		require_once("inc/install_profile.php");
		add_option("oeru_course_colour_profile_setup", "true");
		
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

function oeru_theme_add_category(){
	$catarr = array(
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
	wp_enqueue_style( 'wordpress-oeru-theme-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-layout', get_template_directory_uri() . '/css/layout.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-typography', get_template_directory_uri() . '/css/typography.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-colours', get_template_directory_uri() . '/css/colours.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-core-alter', get_template_directory_uri() . '/css/oeru_theme_core_alter.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-open-sans-font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600&subset=latin,greek-ext,greek,cyrillic,latin-ext,vietnamese,cyrillic-ext', array(), '1' );
	
	wp_enqueue_script( 'wordpress-oeru_theme-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-menu-fix', get_template_directory_uri() . '/js/wikieducatorjs/menu-fix.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-feedback', get_template_directory_uri() . '/js/wikieducatorjs/oeru_feedback.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-details-fix', get_template_directory_uri() . '/js/wikieducatorjs/oeru_details_fix.js', array('wordpress-oeru_theme-jquery'), '20131205', true );
	wp_enqueue_script( 'jquery-ui-accordion');
	wp_enqueue_script( 'wordpress-oeru_theme-accordion', get_template_directory_uri() . '/js/wikieducatorjs/oeru_accordion.js', array('jquery-ui-accordion'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-mcq', get_template_directory_uri() . '/js/wikieducatorjs/oeru_mcq.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-mtq', get_template_directory_uri() . '/js/wikieducatorjs/oeru_mtq.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-fitb_shortcode', get_template_directory_uri() . '/js/wikieducatorjs/oeru_fitb.js', array('jquery'), '20131205', true );
	wp_localize_script( 'wordpress-oeru_theme-fitb_shortcode', 'wordpress_oeru_theme_fitb_shortcode', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'answerNonce' => wp_create_nonce( 'oeru_fitb_check' ) ) );

}
add_action( 'wp_enqueue_scripts', 'oeru_theme_scripts_and_styles' );

function oeru_admin_theme_scripts_and_styles() {
	wp_enqueue_style( 'wordpress-oeru-theme-admin', get_template_directory_uri() . '/css/oeru_theme_admin.css', array(), '1' );
}

add_action( 'admin_enqueue_scripts', 'oeru_admin_theme_scripts_and_styles' );


// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

// Add shortcodes.
require get_template_directory() . '/inc/shortcode.php';

// Add image attribution.
require get_template_directory() . '/inc/image_attribution.php';

// Add theme guidance.
require get_template_directory() . '/inc/theme_guidance.php';

//Add basic menu
require_once("inc/Walker_OERU_Menu.php");

//Add reduced menu
require_once("inc/Walker_OERU_Menu_Depth.php");

//Add scan page menu
require_once("inc/scanpage_settings.php");

//Add colour choice options
require_once("inc/colour_scheme.php");



