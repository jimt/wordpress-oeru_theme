<?PHP	

	class oeru_shortcode{

		function __construct(){
		
			add_action( 'wp_ajax_oeru_fitb', array($this, 'fitb_check') );
			add_action( 'wp_ajax_nopriv_oeru_fitb', array($this, 'fitb_check') );
		
		}
		
		function remove_third( $content ) {
			return str_replace("[oeru_remove_third]", "", $content);
		}

		function remove_next( $content ) {
		
			if(strpos($content,"[oeru_remove_next]")!==FALSE){
				
				$dom = new DOMDocument('1.0', 'utf-8');
				@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

				$xpath = new DOMXPath($dom);

				$items = $xpath->evaluate("//*[contains(@class, 'next')]/a");

				foreach($items as $elem){
					$elem->parentNode->removeChild($elem);
				}
				
				$content = $dom->saveHTML();
				
				return str_replace("[oeru_remove_next]","",$content);
				
			}else{
				return $content;
			}
			
		}
		
		function remove_prev( $content ) {
			if(strpos($content,"[oeru_remove_prev]")!==FALSE){
				$dom = new DOMDocument('1.0', 'utf-8');
				@$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

				$xpath = new DOMXPath($dom);

				$items = $xpath->evaluate("//*[contains(@class, 'previous')]/a");

				foreach($items as $elem){
					$elem->parentNode->removeChild($elem);
				}
				
				$content = $dom->saveHTML();
				
				return str_replace("[oeru_remove_prev]","",$content);
			}else{
				return $content;
			}
		}
		
		function button($atts){
		
			return "<div class='button'><a target='" . $atts['target'] . "' title='" . addslashes($atts['title']) . "' href='" . addslashes($atts['href']) . "'>" . $atts['label'] . "</a></div>";
		
		}
		
		function feedback_button($atts){
		
			$id = "button_" . time() . rand(0,time());
		
			return "<div class='oeru_feedback_container'><button class='oeru_feedback'>" . $atts['label'] . "</button><p style='display:none'>" . $atts['feedback'] . "</p></div>";
		
		}
		
		function faq($atts){
		
			return "<details class='oeru_details'>
                <summary><span class='accordion-icon'>+</span>" . $atts['question'] . "</summary>
                <p>" . $atts['feedback'] . "</p>
              </details>";
		
		}
		
		function hint($atts){
		
			return "<details class='oeru_details hint'>	
                  <summary><i class='fa fa-info-circle'></i>" . $atts['hint'] . "</summary>
                  <p>" . $atts['reveal'] . "</p>
                </details>";
		
		}
		
		function accordion_multi($atts){
		
			$output = "";
			
			if(isset($atts['active'])){
				$active = $atts['active'];
			}else{
				$active = false;
			}
			
			unset($atts['active']);
			
			foreach($atts as $key => $value){
				if(strpos($key, "data")===FALSE){
					$output .= "<h3>" . $value . "</h3><div>" . $atts[$key . "_data"] . "</div>";
				}
			}
			
			return "<div class='accordion' active='" . $active . "'>" . $output . "</div>";
		
		}
		
		function accordion($atts){
		
			$id = rand(1, time());
		
			return '<div class="panel-group" id="accordion' . $id . '">
						<div class="panel panel-default">
							<div class="nomargin panel-heading">
								<h2 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse' . $id . '">
										<span></span>' . $atts['title'] . '
									</a>
								</h2>
							</div>
							<div id="collapse' . $id . '" class="panel-collapse collapse">
								<div id="pagenav" class="panel-body">
									<div class="row">'
										. $atts['body'] . 
									'</div>
								</div>
							</div>
						</div>
					</div>';
		
		}
		
		function table($atts){
		
			$output_heading = "";
			$output_content = "<tr>";
			
			$cells = explode("|", $atts['headings']);
			unset($atts['headings']);
			
			foreach($cells as $cell){
				$output_heading .= "<th>" . $cell . "</th>";
			}
			
			$counter = 1;
			
			foreach($atts as $key => $value){
				if($counter==1){
					$output_content .= "<tr>";
				}
				$output_content .= "<td>" . $value  . "</td>";
				if($counter==(count($cells))){
					$output_content .= "</tr>";
				}
				$counter++;
			}
			
			return "<table class='table table-striped'>
                <thead>" . $output_heading . "
                </thead>
                <tbody>"
					. $output_content . 
                "</tbody>
              </table>";
		
		}
		
		function basic_footer_text_record($atts){
		
			global $post;
			
			$post->oer_footer = $atts;
			
			return "";
			
		}
		
		function basic_footer_text_show(){
		
			global $post, $wp_registered_sidebars;
			
			if(isset($post->oer_footer)){				
			
				$footer = $wp_registered_sidebars['sidebar-1'];
				
				printf($footer['before_widget'], $post->oer_footer['title'], $post->oer_footer['title']);
				echo $footer['before_title'];
				echo $post->oer_footer['title'];
				echo $footer['after_title'];
				echo $post->oer_footer['content'];
				echo $footer['after_widget'];
				
			}
			
		}
		
		function advanced_footer_text_record( $atts, $content = null ){
		
			global $post;
			
			if ( !empty( $content ) ) {
				$atts['content'] = $content;
			}
			$post->oer_advanced_footer = $atts;
			
			return "";
			
		}
		
		function advanced_footer_text_show(){
		
			global $post;
			
			if(isset($post->oer_advanced_footer)){
			
				?><div class='advanced_footer entry-header container'><?PHP echo $post->oer_advanced_footer['content']; ?></div><?PHP
			
			}
		
		}
		
		function extended_footer_text_record($atts){
		
			global $post;
			
			$post->oer_extended_footer = $atts;
			
			return "";
			
		}
		
		function extended_footer_text_show(){
		
			global $post, $wp_registered_sidebars;
			
			if(isset($post->oer_extended_footer)){
			
				$footer = $wp_registered_sidebars['sidebar-1'];
				
				foreach($post->oer_extended_footer as $key => $value){
			
					if(strpos($key,"title")!==FALSE){
					
						printf($footer['before_widget'], $key, $key);
						echo $footer['before_title'];
						echo $value;
						echo $footer['after_title'];
						$id = explode("_", $key);
						echo $post->oer_extended_footer['widget_' . $id[1] . '_content'];
						echo $footer['after_widget'];
					
					}
					
				}
				
			}
			
			if(get_option('oeru_theme_footer')){
				$data = json_decode(get_option('oeru_theme_footer'));
				
				foreach($data as $key => $value){
			
					if(strpos($key,"title")!==FALSE){
					
						echo $footer['before_widget'];//, $key, $key);
						echo $footer['before_title'];//, $key, $key);
						echo $value;
						echo $footer['after_title'];
						$id = explode("_", $key);
						echo $post->oer_extended_footer['widget_' . $id[1] . '_content'];
						echo $footer['after_widget'];
					
					}
					
				}
				
			}
		
		}
		
		// assoc array accessor with default value
		function array_get( &$v, $default=null) {
			return isset($v) ? $v : $default;
		}

		function device( $atts, $content = null ){
			// map iDevice type to icon
			// see http://wikieducator.org/Template:IDevice subpages	
			$icon = array(
				'Line' => array(
					'activities' => 'Icon_activity.png',
					'activity' => 'Icon_activity.png',
					'aim' => 'Icon_objectives.png',
					'aims' => 'Icon_objectives.png',
					'portfolio activity' => 'Icon_activity.png',
					'extension exercise' => 'Icon_activity.png',
					'assignment' => 'Icon_assess.png',
					'question' => 'Icon_qmark.png',
					'questions' => 'Icon_qmark.png',
					'did you know' => 'Icon_qmark.png',
					'did you know?' => 'Icon_qmark.png',
					'did you notice' => 'Icon_qmark.png',
					'did you notice?' => 'Icon_qmark.png',
					'definition' => 'Icon_define.png',
					'definitions' => 'Icon_define.png',
					'discussion' => 'Icon_discussion.png',
					'tell us a story' => 'Icon_discussion.png',
					'case study' => 'Icon_casestudy.png',
					'example' => 'Icon_casestudy.png',
					'objective' => 'Icon_objectives.png',
					'objectives' => 'Icon_objectives.png',
					'outcomes' => 'Icon_objectives.png',
					'key point' => 'Icon_key_points.png',
					'key points' => 'Icon_key_points.png',
					'media required' => 'Icon_multimedia.png',
					'media' => 'Icon_multimedia.png',
					'reading' => 'Icon_review.png',
					'competency' => 'Icon_review.png',
					'competencies' => 'Icon_review.png',
					'summary' => 'Icon_summary.png',
					'self assessment' => 'Icon_qmark.png',
					'assessment' => 'Icon_qmark.png',
					'reflection' => 'Icon_reflection.png',
					'preknowledge' => 'Icon_preknowledge.png',
					'web resources' => 'Icon_inter.png',
					'default' => 'Icon_qmark.png'
				),
				'Ind' => array(
					'activities' => 'ind/Icon_learning_activity.png',
					'activity' => 'ind/Icon_learning_activity.png',
					'aim' => 'ind/Icon_learning_objectives.png',
					'aims' => 'ind/Icon_learning_objectives.png',
					'portfolio activity' => 'ind/Icon_learning_activity.png',
					'extension exercise' => 'ind/Icon_learning_activity.png',
					'objective' => 'ind/Icon_learning_objectives.png',
					'objectives' => 'ind/Icon_learning_objectives.png',
					'outcomes' => 'ind/Icon_learning_objectives.png',
					'key point' => 'ind/Icon_key_idea.png',
					'key points' => 'ind/Icon_key_idea.png',
					'reading' => 'ind/Icon_reading_activity.png',
					'reflection' => 'ind/Icon_reflection.png',
					'default' => 'ind/Icon_unknown.png'
				)
			);

			$label = $atts['type'];
			
			$img = get_template_directory_uri() . '/idevices/' . $this->array_get($icon[get_theme_mod('icon_set', 'Line')][strtolower($atts['type'])], $icon[get_theme_mod('icon_set')]['default']);

			if(isset($atts['title'])){
				$title = $atts['title'];
			}else{
				$title = $label;
			}

			// FIXME the WP Codex claimed $content will be null for the self-closing
			// form, but in practice it is an empty string (WordPress 4.x)
			if ( empty( $content ) ) {
				$content = $atts['body'];
			}

			return '<div class="panel">
				<div class="panel-heading idevice-heading">
					<div>
						<img class="pedagogicalicon" alt="' . $label . '" src="' . $img . '">
					</div>
				<div>
					<h2>' . $title . '</h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">'
					. $content .
				'</div>
			</div>
			</div>';
        	
		}
		
		function fitb($atts){
		
			$length = strlen($atts['answer']) * rand(0,3);
		
			return "<span><input class='oeru_fitb' type='text' length='" . $length . "' answer='" . crypt($atts['answer'], CRYPT_SHA512) . "' /></span>";
		
		}
		
		function quotation($atts){
		
			return "<blockquote>
                    <p>" . $atts['quote'] . "</p>
                    <p><small><cite title='Source Title'>" . $atts['name'] . "<sup><a href='" . $atts['link'] . "'>[" . $atts['number'] . "]</a></sup></cite></small></p>
                  </blockquote>";
		
		}
		
		public function fitb_check(){
		
			if(wp_verify_nonce($_POST['nonce'], "oeru_fitb_check")){
				if(crypt($_POST['submission'], CRYPT_SHA512) == $_POST['answer']){
					echo "true";
				}
			}else{
				echo "nonce fail";
			}
			
			die();
		
		}
		
		public function true_false($atts){
	
			if($atts['option_1']=="true"){
				$option_1 = "glyphicon-ok";
				$class_1 = "correct";
			}else{
				$option_1 = "glyphicon-remove";
				$class_1 = "incorrect";
			}
			
			if($atts['option_2']=="true"){
				$option_2 = "glyphicon-ok";
				$class_2 = "correct";
			}else{
				$option_2 = "glyphicon-remove";
				$class_2 = "incorrect";
			}

			return '<p>' . $atts['question'] . 
			'</p>
			<div class="accordian-group oeru_true_false" id="accordion">
                <div class="accordian panel-default">
                      <div class="accordian-heading">
                        <p class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-pencil"></span>' . $atts['option_1_answer'] . '</a>
                        </p>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <span class="' . $class_1 . '"><span class="glyphicon ' . $option_1 . '"></span> 
						  ' . $atts['option_1_text'] . '</span>' . $atts['option_1_feedback'] . '
                        </div>
                      </div>
                    </div>
                    <div class="accordian-heading">
                        <p class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-pencil"></span>' . $atts['option_2_answer'] . '</a>
                        </p>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <span class="' . $class_2 . '"><span class="glyphicon ' . $option_2 . '"></span>' . $atts['option_2_text'] . '</span>' . $atts['option_2_feedback'] . '
                        </div>
                      </div>
                    </div>
                  </div>';
		
		}
		
		public function mcq($atts){
	
			$output = "<div class='oeru_mcq'><h3>" . $atts['question'] . "</h3>";
			
			unset($atts['question']);
			
			foreach($atts as $key => $value){
				if(strpos($key, "feedback")===FALSE){
					$output .= "<div><input type='checkbox' class='oeru_mcq'><label>" . $value . "</label>";
					$output .= "<p class='oeru_mcq_feedback'>";
					if($atts[$key . "_feedback_response"] == "correct"){
						$output .= '<span class="correct"><span class="glyphicon glyphicon-ok"></span></span>';
					}else{
						$output .= '<span class="incorrect"><span class="glyphicon glyphicon-remove"></span></span>';
					}
					$output .= $atts[$key . "_feedback"] . "</p></div>";
				}
			}
			
			return $output . "</div>";
			
		}
		
		public function mtq($atts){
	
			$output = '<div success="' . addslashes($atts['success']) . '" failure="' . addslashes($atts['failure']) . '"  class="oeru_mtq"><h3>' . $atts['question'] . '</h3>';
			
			unset($atts['question']);
			unset($atts['success']);
			unset($atts['failure']);
			
			foreach($atts as $key => $value){
				if(strpos($key, "question")!==FALSE && strpos($key, "status")===FALSE){
					$output .= "<div><input type='checkbox' status='" . $atts[$key . "_status"] . "' class='oeru_mtq'><label>" . $value . "</label>";
					$output .= "</div>";
				}
			}
			
			return $output . "<div><button class='mtq_submit'>" . $atts['label'] . "</button></div><div class='oeru_mtq_response'></div></div>";
			
		}
		
		function column($atts){
		
			$columns_wide = $atts['per_row'];
			$style = 95 / $columns_wide;
			unset($atts['per_row']);
			$output = "";
			$counter = 1;
			foreach($atts as $key){
				$output .= "<div class='oeru_column ";
				if($counter!=1){
					$output .= "oeru_column_border ";
				}
				$output .= "' style='width:" . $style . "%'>" . $key . "</div>";
				$counter++;
				if($counter == ($columns_wide+1)){
					$counter = 1;
				}
			}
			
			return $output;
			
		
		}
	
	}
	
	$shortcode = new oeru_shortcode();

	add_filter( 'the_content', array($shortcode,'remove_next') );
	add_filter( 'the_content', array($shortcode,'remove_prev') );
	add_shortcode( 'oeru_button', array($shortcode,'button') );
	add_shortcode( 'oeru_feedback_button', array($shortcode,'feedback_button') );
	add_shortcode( 'oeru_faq', array($shortcode,'faq') );
	add_shortcode( 'oeru_hint', array($shortcode,'hint') );
	add_shortcode( 'oeru_accordion_multi', array($shortcode,'accordion_multi') );	
	add_shortcode( 'oeru_accordion', array($shortcode,'accordion') );	
	add_shortcode('oeru_basic_footer', array($shortcode,'basic_footer_text_record'));
	add_action('oeru_post_footer', array($shortcode,'basic_footer_text_show'));
	add_shortcode('oeru_advanced_footer', array($shortcode,'advanced_footer_text_record'));
	add_action('oeru_post_footer', array($shortcode,'advanced_footer_text_show'));
	add_shortcode('oeru_extended_footer', array($shortcode,'extended_footer_text_record'));
	add_action('oeru_post_footer', array($shortcode,'extended_footer_text_show'));
	add_shortcode('oeru_table', array($shortcode,'table'));
	add_shortcode('oeru_idevice', array($shortcode,'device'));
	add_shortcode('oeru_fitb', array($shortcode,'fitb'));
	add_shortcode('oeru_true_false', array($shortcode,'true_false'));
	add_shortcode('oeru_mcq', array($shortcode,'mcq'));
	add_shortcode('oeru_mtq', array($shortcode,'mtq'));
	add_shortcode('oeru_quotation', array($shortcode,'quotation'));
	add_filter('the_content', array($shortcode,'remove_third'));
	add_shortcode('oeru_column', array($shortcode,'column'));
	
