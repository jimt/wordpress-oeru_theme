<?php

function oeru_theme_customize_register_modify( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->get_section( 'header_image' )->title = __( 'Site Image', 'oeru_theme' );
	$wp_customize->remove_section( 'colors' );
	
}

function oeru_theme_customize_register_front_page_layout( $wp_customize ){

	$wp_customize->add_section( 'front_page_layout' , array(
		'title'      => __( 'Front Page Layout', 'oeru_theme' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'layout_style',
		array(
			'default' => 'standard',
		)
	);
	 
	$wp_customize->add_control(
		'layout_style',
		array(
			'type' => 'radio',
			'label' => 'Front page layout - you can use the settings page to fix one page as the home page',
			'section' => 'front_page_layout',
			'choices' => array(
				'front_page_featured_main_three' => 'Front Page Category One Wide then three',
				'front_page_featured_rows' => 'Front Page Category (rows) Only',
				'front_page_featured_columns' => 'Front Page Category (columns) Only',
				'standard' => 'Recent Posts (standard)',
				'all_pages' => 'All Pages',
				'all_pages_no_parent' => 'All Pages (without a parent)',
				'all_pages_no_parent_excerpt_2' => 'All Pages (without a parent) in a 2 abreast column',
				'all_pages_no_parent_excerpt_3' => 'All Pages (without a parent) in a 3 abreast column',
				'all_pages_no_parent_excerpt_4' => 'All Pages (without a parent) in a 4 abreast column',				
				'custom_html' => 'Custom HTML',				
			),
		)
	);
	
	$wp_customize->add_section( 'front_page_custom_html' , array(
		'title'      => __( 'Front Page Custom HTML', 'oeru_theme' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'custom_html',
		array(
			'default' => 'enter html here',
		)
	);
	 
	$wp_customize->add_control(
		'custom_html',
		array(
			'type' => 'textarea',
			'label' => 'Front page layout - you can enter custom HTML here',
			'section' => 'front_page_custom_html'		
		)
	);
	
}

function oeru_theme_customize_navigation( $wp_customize ){

	$wp_customize->add_section( 'site_navigation' , array(
		'title'      => __( 'Site Navigation', 'oeru_theme' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'third_level_menu',
		array(
			'default' => 'on',
		)
	);
	 
	$wp_customize->add_control(
		'third_level_menu',
		array(
			'type' => 'radio',
			'label' => 'Show third level menu (ignoring page shortcodes)',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "On",			
				'off' => "Off",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'next_button',
		array(
			'default' => 'on',
		)
	);
	 
	$wp_customize->add_control(
		'next_button',
		array(
			'type' => 'radio',
			'label' => 'Show next button (ignoring page shortcodes)',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "On",			
				'off' => "Off",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'prev_button',
		array(
			'default' => 'on',
		)
	);
	 
	$wp_customize->add_control(
		'prev_button',
		array(
			'type' => 'radio',
			'label' => 'Show previous button (ignoring page shortcodes)',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "On",			
				'off' => "Off",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'menu_depth',
		array(
			'default' => 'all',
		)
	);
	 
	$wp_customize->add_control(
		'menu_depth',
		array(
			'type' => 'radio',
			'label' => 'How deep should the main navigation go?',
			'section' => 'site_navigation',
			'choices' => array(
				'two' => "1st level only",			
				'all' => "As deep as menu",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'scan_page',
		array(
			'default' => 'off',
		)
	);
	 
	$wp_customize->add_control(
		'scan_page',
		array(
			'type' => 'radio',
			'label' => 'Show the scan page?',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "Yes",			
				'off' => "No",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'log_on_page',
		array(
			'default' => 'off',
		)
	);
	 
	$wp_customize->add_control(
		'log_on_page',
		array(
			'type' => 'radio',
			'label' => 'Show the login option?',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "Yes",			
				'off' => "No",			
			),
		)
	);
	
	$wp_customize->add_setting(
		'swipe',
		array(
			'default' => 'off',
		)
	);

	$wp_customize->add_control(
		'swipe',
		array(
			'type' => 'radio',
			'label' => 'Enable swipe navigation for previous/next page?',
			'section' => 'site_navigation',
			'choices' => array(
				'on' => "Yes",
				'off' => "No",
			),
		)
	);

}

function oeru_theme_customize_register_fav_icon( $wp_customize ){
	
	$wp_customize->add_section( 'fav_icon' , array(
		'title'      => __( 'Fav Icon', 'oeru_theme' ),
		'priority'   => 2,
	) );

	$wp_customize->add_setting(
		'fav_icon_url'
	);
	 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'fav_icon_url',
			array(
				'label' => 'Fav Icon',
				'section' => 'fav_icon',
				'settings' => 'fav_icon_url'
			)
		)
	);
	
}

function oeru_theme_customize_register_add_site_colours( $wp_customize ) {
	
	// map setting name to human readable customizer label
	$c_colors = array(
		'site_allsite_background_colour' =>
			'Site background colour',
		'site_alllink_colour' =>
			'Site Link Colour',
		'site_alllink_hover_colour' =>
			'Site Link hover Colour',
		'site_content_background_colour' =>
			'Site Content Background Colour',
		'site_alltext_colour' =>
			'Site Text Colour',
		'site_footer_colour' =>
			'Site Footer Text Colour',
		'site_footer_background_colour' =>
			'Site Footer Background Colour',
		'site_menu_background_colour' =>
			'Site Menu Background Colour',
		'site_menu_background_hover_colour' =>
			'Site Menu Background Hover Colour',
		'site_menu_dropdown_background_colour' =>
			'Site Menu Dropdown Background Colour',
		'site_menu_dropdown_background_hover_colour' =>
			'Site Menu Dropdown Background Hover Colour',
		'site_menu_background_current_colour' =>
			'Site Menu Current Page Colour',
		'site_menu_text_colour' =>
			'Site Menu Text Colour',
		'site_menu_text_hover_colour' =>
			'Site Menu Text Hover Colour',
		'site_header_colour' =>
			'Site Header Background Colour',
		'site_header_text_colour' =>
			'Site Header Text Colour',
		'site_idevice_colour' =>
			'iDevice Header Text Colour',
		'site_idevice_background_colour' =>
			'iDevice Header Background Colour',
		'site_top_background_colour' =>
			'Top Background Colour',
		'site_button_colour' =>
			'Button Colour',
		'site_button_text_colour' =>
			'Button Text Colour',
		'site_pager_colour' =>
			'Previous/Next Colour',
		'site_pager_text_colour' =>
			'Previous/Next Text/Border Colour',
		'site_pagenav_colour' =>
			'Page Navigation Colour',
		'site_pagenav_current_colour' =>
			'Page Navigation Current Item Colour',
		'site_pagenav_bottom' =>
			'Page Navigation Bottom Border',
	);

	$wp_customize->add_section( 'site_colours' , array(
		'title'      => __( 'Site Colours', 'oeru_theme' ),
		'priority'   => 30,
	) );
	
	foreach ( $c_colors as $k => $v ) {
		$wp_customize->add_setting(
			$k,
			array(
				'default' => '',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$k,
				array(
					'label' => $v,
					'section' => 'site_colours',
					'settings' => $k
				)
			)
		);
	}
}

function oeru_theme_customize_register_modify_static_page( $wp_customize ) {
	
	$wp_customize->add_setting(
		'front_page_options',
		array(
			'default' => '',
			'transport' => 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'front_page_options',
			array(
				'label' => 'Extra front page options',
				'section' => 'static_front_page',
				'settings' => 'front_page_options'
			)
		)
	);
	
}

function oeru_theme_customize_register( $wp_customize ) {

	oeru_theme_customize_register_modify( $wp_customize );
	oeru_theme_customize_register_add_site_colours( $wp_customize );
	oeru_theme_customize_register_modify_static_page( $wp_customize );
	oeru_theme_customize_register_front_page_layout( $wp_customize );
	oeru_theme_customize_register_fav_icon( $wp_customize );
	oeru_theme_customize_navigation( $wp_customize );
	
}
add_action( 'customize_register', 'oeru_theme_customize_register' );


function oeru_theme_customize_preview_js() {
	wp_enqueue_script( 'oeru_theme_customizer', get_template_directory_uri() . '/js/oeru_theme_customiser.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'oeru_theme_customize_preview_js' );

