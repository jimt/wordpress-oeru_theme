<?PHP

set_theme_mod('layout_style', 'all_pages_no_parent');
set_theme_mod('third_level_menu','on');
set_theme_mod('next_button','on');
set_theme_mod('prev_button','on');
set_theme_mod('menu_depth','two');
set_theme_mod('scan_page','off');
set_theme_mod('log_on_page','off');
set_theme_mod( 'swipe', 'off' );
set_theme_mod( 'icon_set', 'Line' );

/* set initial colours to the green set */
require_once 'colour_scheme.php';
oeru_theme_set_colours( 'green' );

