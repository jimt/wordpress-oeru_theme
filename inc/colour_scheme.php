<?php

function oeru_theme_colour_page(){
	add_submenu_page('oeru-theme-admin', 'Colour Scheme', 'Colour Scheme', 'manage_options', 'oeru-theme-colour', 'oeru_theme_colour');
}
add_action('admin_menu', 'oeru_theme_colour_page');

function oeru_theme_colour(){
	if(isset($_POST['colour'])){
	
		if(wp_verify_nonce($_POST["oeru_theme_colour"], "oeru_theme_colour")){
		
			?><h2>Colour Scheme</h2><?PHP
			
			if($_POST['colour']=="blue"){
				
				set_theme_mod('site_allsite_background_colour','#efefef');
				set_theme_mod('site_alllink_colour','#180084');
				set_theme_mod('site_content_background_colour','#fefefe');
				set_theme_mod('site_alllink_hover_colour','#6FA92E');
				set_theme_mod('site_footer_colour','#868A8D');
				set_theme_mod('site_footer_background_colour','#42484D');
				set_theme_mod('site_menu_background_colour','#004d92');
				set_theme_mod('site_menu_background_hover_colour','#004d92');
				set_theme_mod('site_menu_background_current_colour','#0b0060');
				set_theme_mod('site_top_background_colour','#ffffff');
				set_theme_mod('site_menu_text_colour','#c2cddd');
				set_theme_mod('site_menu_text_hover_colour','#ffffff');
				set_theme_mod('site_header_colour','#004d92');
				set_theme_mod('site_header_text_colour','#ffffff');
				set_theme_mod('site_top_background_colour','#fdfdfd');
				set_theme_mod('site_button_colour','#004d92');
				set_theme_mod('Button Text Colour','#fff');
				set_theme_mod('site_pagenav_colour','#D0E9FF');
				set_theme_mod('site_pagenav_current_colour','#98D6F6');
			
			}
			
			if($_POST['colour']=="green"){
			
				set_theme_mod('site_allsite_background_colour','#efefef');
				set_theme_mod('site_alllink_colour','#6fa92e');
				set_theme_mod('site_content_background_colour','#fefefe');
				set_theme_mod('site_alllink_hover_colour','#6FA92E');
				set_theme_mod('site_footer_colour','#868A8D');
				set_theme_mod('site_footer_background_colour','#42484D');
				set_theme_mod('site_menu_background_colour','#649d23');
				set_theme_mod('site_menu_background_hover_colour','#75c900');
				set_theme_mod('site_top_background_colour','#ffffff');
				set_theme_mod('site_menu_background_current_colour','#77bc27');
				set_theme_mod('site_menu_text_colour','#dddddd');
				set_theme_mod('site_menu_text_hover_colour','#ffffff');
				set_theme_mod('site_header_colour','#6fa92e');
				set_theme_mod('site_header_text_colour','#ffffff');
				set_theme_mod('site_top_background_colour','#fdfdfd');
				set_theme_mod('site_button_colour','#649d23');
				set_theme_mod('Button Text Colour','#fff');
				set_theme_mod('site_pagenav_colour','#b6f26d');
				set_theme_mod('site_pagenav_current_colour','#8bd62f');
				
			}
		
			?>
			<h3>Colours changed</h3>
			<p>You can use the customiser to change colour scheme, or </p>
			<form action="" method="POST">
				<?PHP
					 wp_nonce_field( "oeru_theme_colour", "oeru_theme_colour" );
				?>
				<input type="radio" name="colour" value="blue">Blue<br>
				<input type="radio" name="colour" value="green">Green	
				<input type="submit" value="Change Colours" />
			</form>
		</div><?PHP
		
		}else{
		
			?><p>Sorry, the nonce did not verify, please refresh the page</p><?PHP

		}
		
	}else{
	
		?><h2>Change Colour Scheme</h2>
		<p>You can use the customiser to change colour scheme, or </p>
			<form action="" method="POST">
				<?PHP
					 wp_nonce_field( "oeru_theme_colour", "oeru_theme_colour" );
				?>
				<input type="radio" name="colour" value="blue">Blue<br>
				<input type="radio" name="colour" value="green">Green	
				<input type="submit" value="Change Colours" />
			</form>
		</div><?PHP
	}
}