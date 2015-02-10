<?php

function oeru_theme_admin_page(){
	add_menu_page('OERu Theme', 'OERU Theme', 'manage_options', 'oeru-theme-admin', 'oeru_theme_options');
	add_submenu_page('oeru-theme-admin', 'Menu Creation', 'Menu Creation', 'manage_options', 'oeru-theme-menu', 'oeru_theme_menu');
	add_submenu_page('oeru-theme-admin', 'Shortcodes', 'Shortcodes', 'manage_options', 'oeru-theme-shortcodes', 'oeru_theme_shortcodes');
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

function oeru_theme_shortcodes(){
	?><h1>OERu Theme Shortcodes</h1>
	<h2>[oeru_remove_next]</h2>
	<p>Use this short code to remove the next button from a page</p>
	<h2>[oeru_remove_prev]</h2>
	<p>Use this short code to remove the previous button from a page</p>
	<h2>[oeru_remove_third]</h2>
	<p>Use this short code to remove the third level navigation from a page</p>
	<h2>[oeru_button]</h2>
	<p>Use this short code to place a button on a page</p>
	<p>Example [oeru_button target="_blank" href="http://www.google.com" label="google"] - will display a button labelled google which will open google in a new window</p>
	<h2>[oeru_feedback_button]</h2>
	<p>Use this short code to place a button on a page which when clicked on reveals feedback</p>
	<p>Example [oer_feedback_button label="Explain this" feedback="it is easy"] - will display a button labelled Explain this which when clicked on will reveal the feedback</p>
	<h2>[oeru_faq]</h2>
	<p>Use this short code to place a clickable, expandable option on a page</p>
	<p>Example [oer_faq question="What is this?" feedback="It is a FAQ"] - will display a the text in question which when clicked on will reveal the feedback</p>
	<h2>[oeru_hint]</h2>
	<p>Use this short code to place a clickable, expandable option on a page (as above but with an information symbol)</p>
	<p>Example [oer_hint hint="What is this?" reveal="It is a FAQ"] - will display a the text in hint which when clicked on will reveal the text in revea</p>
	<h2>[oeru_accordion]</h2>
	<p>Use this short code to place a clickable, expandable option on a page (as above but with an information symbol)</p>
	<p>Example [oer_accordion science="What is Science?" science_data="Lots of things"] - will display an accordion. The clickable label can be called whatever you want, but the content for that click must be the same name but with _data amended</p>
	<h2>[oeru_basic_footer]</h2>
	<p>Use this short code to place an additional widget</p>
	<p>Example [oer_basic_footer title="Our University" content="Our address"] - will add a widget with title as the title and content as the content</p>
	<h2>[oeru_advanced_footer]</h2>
	<p>Use this short code to place additional content in the footer</p>
	<p>Example [oer_advanced_footer content="Our address"] - will add the content to the footer</p>
	<h2>[oeru_table]</h2>
	<p>Use this to add a table</p>
	<p>Example [oer_table headings="this|that|there" level_1="maybe" level_2="perhaps" level_3="almost"]</p>
	<p>The headings value is the top row of the table, with each | separating a column heading</p>
	<p>Then each value in order from the first is a cell in the table</p>
	<h2>[oeru_idevice]</h2>
	<p>Use this to add a table</p>
	<p>Example [oer_idevice type="Question" content="What is the best way to do this"]</p>
	<p>The type value sets the title on the page and the associated image. Content sets what appears below this</p>
	<p>The types are as follows</p>
	<ul>
		<li>Activity</li>
		<li>Portfolio</li>
		<li>Extension exercise</li>
		<li>Assignment</li>
		<li>Question</li>
		<li>Questions</li>
		<li>Did you know?</li>
		<li>Did you notice?</li>
		<li>Definition</li>
		<li>Definitions</li>
		<li>Discussion</li>
		<li>Tell us a story</li>
		<li>Case study</li>
		<li>Example</li>
		<li>Objective</li>
		<li>Objectives</li>
		<li>Outcomes</li>
		<li>Key points</li>
		<li>Media required</li>
		<li>Media</li>
		<li>Reading</li>
		<li>Competency</li>
		<li>Competencies</li>
		<li>Summary</li>
		<li>Self assessment</li>
		<li>Assessment</li>
		<li>Reflection</li>
		<li>Preknowledge</li>
		<li>Web Resources</li>
	</ul>
	<h2>[oeru_fitb]</h2>
	<p>Use this to create a fill in the blank area</p>
	<p>Example [oer_fitb answer="lima"] to create an area which will the learner will need to enter lima to have it accepted as an answer</p>
	<h2>[oeru_true_false]</h2>
	<p>Use this to create a true or false question</p>
	<p>Example [oeru_true_false question="which way is up?" option_1_answer="up" option_1="true" option_1_text="Well done!" option_1_feedback="yes that is up" option_2_answer="down" option_2="false" option_2_text="Wrong!" option_2_feedback="No, up was the correct aswer"] </p>
	<p>This will create two options, "up" and "down". Use option_1 to say whether it is true or false - option_2 for question 2. Option_1_text is the text after the tick or cross, and the feedback is what appears after that</p>
	<h2>[oeru_mcq]</h2>
	<p>Use this to create a multiple choice question. Only one answer can be correct</p>
	<p>Example [oeru_mcq question="which is biggest?" option_1="The Sun" option_1_feedback_response="correct" option_1_feedback="Well done!" option_2="The Moon" option_2_feedback_response="incorrect" option_2_feedback="Wrong" option_3="The Earth" option_3_feedback_response="incorrect" option_3_feedback="Wrong"]   </p>
	<p>This will create three clickable options, with these being set by option_ and then a number. Each option has a _feedback_response to say it correct or incorrect, and then a _feedback for the text which is displayed on screen</p>
	<h2>[oer_mtq]</h2>
	<p>Creates a quiz in which a series of answers need to be marked as correct to achieve success</p>
	<p>Example [oeru_mtq question="Which is what?" success=""ell done amazing work let's move on" failure="oh dear, why did you do that" question_1="is this true" question_1_status="correct" question_2="is this not true" question_2_status="incorrect" question_2="is this not true" question_2_status="incorrect" question_3="correct" question_3_status="correct" question_4="incorrect" question_4_status="incorrect" label="check your answers"] </p>
	<p>So question sets the question text. Success sets the positive feedback, failure the next feedback. Question_ and then a number creates a possible, with _status setting that question as correct or incorrect. Label is the text on the button</p>
	<h2>[oer_column]</h2>
	<p>Creates columns</p>
	<p>Example [oeru_column per_row="2" column1="hello" column2="goodbye" column3="amazing"]</p>
	<p>"Per row" is how many columns in a line acorss the page. The other variables are the content for each column</p>
	<?PHP
}

function oeru_theme_create_menu(){

	$menu_exists = wp_get_nav_menu_object("OERu Import Menu");

	if( ! $menu_exists ){

		$menu_id = wp_create_nav_menu("OERu Import Menu");	
		return $menu_id;
	
	}else{
		
		return false;
	
	}
	
}

function oeru_theme_menu_hierarchy($menu_id, $post_parent, $menu_parent){

	$the_query = new WP_Query( 'posts_per_page=9999&post_type=page&post_parent=' . $post_parent . "&orderby=ID&order=ASC" );
	
	if ( $the_query->have_posts() ) {
				
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id();			
			$title = get_the_title();
			
			$last_page = wp_update_nav_menu_item($menu_id, 0, 
				array(
					'menu-item-title' =>  __($title),
					'menu-item-classes' => $title,
					'menu-item-url' => get_the_permalink($id), 
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $menu_parent,
				)
			);
			
			oeru_theme_menu_hierarchy($menu_id, $id, $last_page);
			
		}
		
	}

}

function oeru_theme_menu(){
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

function oeru_theme_get_pages_no_parent($post_parent){
	
	$the_query = new WP_Query( 'posts_per_page=9999&post_type=page&post_parent=' . $post_parent . "&orderby=ID&order=ASC" );
				
	if ( $the_query->have_posts() ) {
				
		echo "<ul>";
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id();
			$title = get_the_title();
			echo "<li><a target='_blank' href='post.php?post=" . $id . "&action=edit'>" . $title . "</a>";
			oeru_theme_get_pages_no_parent($id);
			echo "</li>";
		}
		
		echo "</ul>";
		
	}
	
}