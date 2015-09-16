<?php

function oeru_theme_colour_page(){
	add_submenu_page('oeru-theme-admin', 'Colour Scheme', 'Colour Scheme', 'manage_options', 'oeru-theme-colour', 'oeru_theme_colour');
}
add_action('admin_menu', 'oeru_theme_colour_page');

function oeru_theme_colour_menu($colours, $header=null) {
	echo "<h2>Colour Scheme</h2>";
	if ($header) {
		echo "<h3>$header</h3>";
	}
	echo <<<EOL
<form action="" method="POST">
<p>You can use the customiser to change colour scheme or select a standard one here.</p>
EOL;
	foreach ($colours as $colour => $v) {
		echo <<<EOL
<input type="radio" name="colour" value="$colour">$colour<br>
EOL;
	}
	wp_nonce_field( "oeru_theme_colour", "oeru_theme_colour" );
	echo <<<EOL
		<br>
		<input type="submit" value="Change colours" />
	</form>
	</div>
EOL;
}

function oeru_theme_colour(){
	$colours = array(
		'blue' => array(
				'site_allsite_background_colour' => '#efefef',
				'site_alllink_colour' => '#180084',
				'site_content_background_colour' => '#fefefe',
				'site_alllink_hover_colour' =>  '#544a84',
				'site_footer_colour' => '#868A8D',
				'site_footer_background_colour' => '#42484D',
				'site_menu_background_colour' => '#003882',
				'site_menu_background_hover_colour' => '#002566',
				'site_menu_background_current_colour' => '#0b0060',
				'site_menu_dropdown_background_colour' => '#002566',
				'site_menu_dropdown_background_hover_colour' => '#001944',
				'site_top_background_colour' => '#ffffff',
				'site_menu_text_colour' => '#c2cddd',
				'site_menu_text_hover_colour' => '#ffffff',
				'site_header_colour' => '#004d92',
				'site_header_text_colour' => '#ffffff',
				'site_idevice_colour' => '#004d92',
				'site_idevice_background_colour' => '#ffffff',
				'site_button_colour' => '#004d92',
				'Button Text Colour' => '#fff',
				'site_button_background_colour' => '#004d92',
				'site_pagenav_colour' => '#D0E9FF',
				'site_pagenav_current_colour' => '#98D6F6',
			),
		'green' => array(
				'site_allsite_background_colour' => '#efefef',
				'site_alllink_colour' => '#6fa92e',
				'site_alllink_hover_colour' =>  '#89a866',
				'site_content_background_colour' => '#fefefe',
				'site_footer_colour' => '#868A8D',
				'site_footer_background_colour' => '#42484D',
				'site_menu_background_colour' => '#649d23',
				'site_menu_background_hover_colour' => '#5a9319',
				'site_menu_dropdown_background_colour' => '#5a9319',
				'site_menu_dropdown_background_hover_colour' => '#0f8200',
				'site_top_background_colour' => '#ffffff',
				'site_menu_background_current_colour' => '#77bc27',
				'site_menu_text_colour' => '#dddddd',
				'site_menu_text_hover_colour' => '#ffffff',
				'site_header_colour' => '#6fa92e',
				'site_header_text_colour' => '#ffffff',
				'site_idevice_colour' => '#ffffff',
				'site_idevice_background_colour' => '#6fa92e',
				'site_button_colour' => '#649d23',
				'Button Text Colour' => '#fff',
				'site_button_background_colour' => '#649d23',
				'site_pagenav_colour' => '#b6f26d',
				'site_pagenav_current_colour' => '#8bd62f',
			),
		'red' => array(
				'site_allsite_background_colour' => '#efefef',
				'site_alllink_colour' => '#0900b5',
				'site_alllink_hover_colour' =>  '#fcc572',
				'site_content_background_colour' => '#fefefe',
				'site_footer_colour' => '#868a8d',
				'site_footer_background_colour' => '#42484D',
				'site_menu_background_colour' => '#662620',
				'site_menu_background_hover_colour' => '#662620',
				'site_menu_dropdown_background_colour' => '#662620',
				'site_menu_dropdown_background_hover_colour' => '#662620',
				'site_top_background_colour' => '#ffffff',
				'site_menu_background_current_colour' => '#662620',
				'site_menu_text_colour' => '#ffffff',
				'site_menu_text_hover_colour' => '#ffffff',
				'site_header_colour' => '#662620',
				'site_header_text_colour' => '#ffffff',
				'site_idevice_colour' => '#000000',
				'site_idevice_background_colour' => '#fcc572',
				'site_button_colour' => '#fcc572',
				'Button Text Colour' => '#fff',
				'site_button_background_colour' => '#fcc572',
				'site_pagenav_colour' => '#ffffff',
				'site_pagenav_current_colour' => '#fcc572',
			)
	);

	if(isset($_POST['colour'])){
		if(wp_verify_nonce($_POST["oeru_theme_colour"], "oeru_theme_colour")){
			if (isset($colours[$_POST['colour']])) {
				$c = $_POST['colour'];
				foreach ($colours[$c] as $k => $v) {
					set_theme_mod($k, $v);
				}
				oeru_theme_colour_menu($colours,
							"Colours changed: $c");
			} else {
				oeru_theme_colour_menu($colours, 'Unrecognized colour');
			}
		}else{
			echo "<p>Sorry, the nonce did not verify, please refresh the page</p>";
		}
	}else{
		oeru_theme_colour_menu($colours);
	}
}
