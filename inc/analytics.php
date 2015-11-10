<?php

function oeru_theme_analytics_page(){
	add_submenu_page('oeru-theme-admin', 'Analytics', 'Analytics', 'manage_options', 'oeru-theme-analytics', 'oeru_theme_analytics');
}
add_action('admin_menu', 'oeru_theme_analytics_page');

function oeru_theme_analytics_form( &$icon_sets, $header = Null ) {
	$current_set = get_theme_mod( 'icon_set', 'Line' );
	echo '<div class="wrap"><h2>Web Analytics</h2>';
	if ( $header ) {
		echo "<h3>$header</h3>";
	}
	echo <<<EOL
<form action="" method="POST">
EOL;
	wp_nonce_field( "oeru_theme_analytics", "oeru_theme_analytics" );
	$piwiksiteid = get_theme_mod( 'piwiksiteid', '' );
	$piwikurl = get_theme_mod( 'piwikurl', '//stats.oeru.org' );
	$ganalytics = get_theme_mod( 'ganalytics', '' );
	echo <<<EOL
<br><br>
<h3>Piwik</h3>
<table class="form-table">
  <tr class="form-field">
    <th scope="row"><label for="piwiksiteid">Siteid</label></th>
    <td><input type="text" id="piwiksiteid" name="piwiksiteid" value="$piwiksiteid" style="width: 25em;"><br>
        <small>Leave blank for no Piwik web analytics</small>
    </td>
  </tr>
  <tr class="form-field">
    <th scope="row"><label for="piwikurl">Piwik URL</label></th>
    <td><input type="text" id="piwikurl" name="piwikurl" value="$piwikurl" style="width: 25em;"></td><br>
  </tr>
</table>
<br><br>
<h3>Google Analytics</h3>
<table class="form-table">
  <tr class="form-field">
    <th scope="row"><label for="ganalytics" class="col-sm-2 control-label">Google Analytics Id</label></th>
    <td><input type="text" id="ganalytics" name="ganalytics" value="$ganalytics" style="width: 25em;"><br>
	<small>Enter Google Analytics property ID <tt>UA-nnnnnnnn-n</tt><br>
               Leave blank for no Google Analytics tracking</small>
    </td>
  </tr>
</table>
<input type="submit" class="button-primary" value="Save">
</form>
</div>
EOL;
}

function oeru_theme_analytics(){
	$r = NULL;
	if(isset($_POST['piwiksiteid'])){
		if( wp_verify_nonce($_POST["oeru_theme_analytics"], "oeru_theme_analytics" )){
			set_theme_mod( 'piwiksiteid', trim( $_POST['piwiksiteid'] ) );
			set_theme_mod( 'piwikurl', trim( $_POST['piwikurl'] ) );
			set_theme_mod( 'ganalytics', trim( $_POST['ganalytics'] ) );
			$r = 'Analytics tracking updated.';
		}else{
			$r = 'Sorry, there was a session error. Please refresh the page.';
		}
	}
	oeru_theme_analytics_form( $oeru_theme_analytics, $r );
}

add_action( 'wp_footer', 'oeru_theme_analytics_js' );
// actually put the tracking scripts at the bottom of the page
function oeru_theme_analytics_js() {
	$analytics = array(
		'piwiksiteid' => get_theme_mod( 'piwiksiteid' ),
		'piwikurl' => get_theme_mod( 'piwikurl' ),
		'ganalytics' => get_theme_mod( 'ganalytics' )
	);

	if ( $analytics['piwiksiteid'] && $analytics['piwikurl'] ) {
		wp_register_script( 'oeru_piwik', get_template_directory_uri() . '/js/oeru_piwik.js' );
		wp_localize_script( 'oeru_piwik', 'oeru_an', $analytics );
		wp_enqueue_script( 'oeru_piwik' );
	}

	if ( $analytics['ganalytics'] ) {
		wp_register_script( 'oeru_ganalytics', get_template_directory_uri() . '/js/oeru_ganalytics.js' );
		wp_localize_script( 'oeru_ganalytics', 'oeru_an', $analytics );
		wp_enqueue_script( 'oeru_ganalytics' );
	}
}
