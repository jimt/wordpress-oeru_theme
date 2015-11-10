<?php

function oeru_theme_icon_page(){
	add_submenu_page('oeru-theme-admin', 'Icon Set', 'Icon Set', 'manage_options', 'oeru-theme-icons', 'oeru_theme_icons');
}
add_action('admin_menu', 'oeru_theme_icon_page');

$oeru_theme_icon_sets = array(
	"Line" => "",
	"Line (black)" => "/black",
	"Ind" => "/ind"
);

function oeru_theme_icons_form( &$icon_sets, $header = Null ) {
	$current_set = get_theme_mod( 'icon_set', 'Line' );
	echo "<h2>Icon Set</h2>";
	if ( $header ) {
		echo "<h3>$header</h3>";
	}
	echo <<<EOL
<form action="" method="POST">
EOL;
	wp_nonce_field( "oeru_theme_icons", "oeru_theme_icons" );
	foreach ($icon_sets as $k => $v) {
		$maybeselected = ($k == $current_set) ? "checked" : "";
		echo <<<EOL
<input type="radio" name="iconset" value="$k" $maybeselected>$k<br>
EOL;
	}
	echo <<<EOL
		<br>
		<input type="submit" value="Save Selection" class="button button-primary" />
	</form>
	</div>
EOL;
}

function oeru_theme_icons(){
	global $oeru_theme_icon_sets;
	if(isset($_POST['iconset'])){
		if(wp_verify_nonce($_POST["oeru_theme_icons"], "oeru_theme_icons")){
			if( array_key_exists( $_POST['iconset'], $oeru_theme_icon_sets ) ) {
				set_theme_mod( 'icon_set', $_POST['iconset'] );
				oeru_theme_icons_form( $oeru_theme_icon_sets, "Icon set selected: " . $_POST['iconset']);
			} else {
				oeru_theme_icons_form( $oeru_theme_icon_sets, "Unknown icon set ${_POST['iconset']}" );
			}
		}else{
			echo "Sorry, the nonce did not verify, please refresh the page</p>";
		}
	}else{
		oeru_theme_icons_form( $oeru_theme_icon_sets );
	}
}
