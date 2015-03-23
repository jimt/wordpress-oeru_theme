<?php

function oeru_theme_admin_page(){
	add_submenu_page('oeru-theme-admin', 'Colour Scheme', 'Colour Scheme', 'manage_options', 'oeru-theme-colour', 'oeru_theme_colour');
}
add_action('admin_menu', 'oeru_theme_admin_page');

function oeru_theme_colour(){
	if(isset($_POST['menu_create'])){
	
		if(wp_verify_nonce($_POST["oeru_theme_menu_create"], "oeru_theme_menu_create")){
		
			?><h2>Menu Creation</h2><?PHP
			
				$menu_id = oeru_theme_create_menu();
				
				if($menu_id!=false){
					?><p>Menu being created....</p><?PHP
					oeru_theme_menu_hierarchy($menu_id, 0, 0);	
					?><p>Menu Created</p>
					<p>Menu can be changed on the <a href='nav-menus.php'>Menu Admin</a> page</p>
					<?PHP
				}else{
					?><p>Error - Menu already exists. Please delete "OERu Import Menu" on the <a href='nav-menus.php'>Menu Admin</a> page</p><?PHP
				}
		
		}else{
		
			?><p>Sorry, the nonce did not verify, please refresh the page</p><?PHP

		}
	
	}else{
		?><h2>Menu Creation</h2>
		<p>If you have ran the script to create the menu, then use this page to create the site menu</p>
		<p>The menu at present will look as such. </p>
		<p>You can delete pages or alter their parents (where it sits in the menu by editing a page) by clicking on the post name to edit it</p>
		<p>If you edit a page, this display won't refresh until you do so, but the menu created will reflect your changes.</p>
		<div class="half-width"><?PHP oeru_theme_get_pages_no_parent(0); ?></div>
		<div class="half-width">
			<form action="" method="POST">
				<?PHP
					 wp_nonce_field( "oeru_theme_menu_create", "oeru_theme_menu_create" );
				?>
				<input type="hidden" name="menu_create" value="go" />
				<input type="submit" value="Create Menu" />
			</form>
		</div><?PHP
	}
}