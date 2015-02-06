<?php
	get_header(); 
?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content home-content" role="main">
		<?php
		
		if (is_home()) :
		
			$layout = get_theme_mod('layout_style');
		
			switch($layout){
				case "standard" : get_template_part("index-standard"); break;
				case "front_page_featured_main_three" : get_template_part("index-front-page-featured-main-three"); break;
				case "front_page_featured_rows" : get_template_part("index-front-page-featured-rows"); break;
				case 'front_page_featured_columns' : get_template_part("index-front-page-featured-columns"); break;
				case 'all_pages' : get_template_part("index-all-pages"); break;
				case 'all_pages_no_parent' : get_template_part("index-all-pages-no-parent"); break;
				case 'all_pages_no_parent_excerpt_2' : get_template_part("index-all-pages-no-parent_excerpt_2"); break;
				case 'all_pages_no_parent_excerpt_3' : get_template_part("index-all-pages-no-parent_excerpt_3"); break;
				case 'all_pages_no_parent_excerpt_4' : get_template_part("index-all-pages-no-parent_excerpt_4"); break;
				case 'custom_html' : get_template_part("index-custom-html"); break;
				case "default" : get_template_part("index-standard"); break;
			}
		
		else :
		
			get_template_part("index-standard");
		
		endif; 
		
		?>
		</div>
	</div>	
</div>

<?php

get_footer();
