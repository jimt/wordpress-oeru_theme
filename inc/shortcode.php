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
				@$dom->loadHTML($content);

				$xpath = new DOMXPath($dom);

				$items = $xpath->evaluate("//*[contains(@class, 'next')]");

				foreach($items as $elem){
					$elem->parentNode->removeChild($elem);
				}
				
				$content = $dom->saveHTML();
				
				return str_replace("[remove_next]","",$content);
				
			}else{
				return $content;
			}
			
		}
		
		function remove_prev( $content ) {
			if(strpos($content,"[oeru_remove_prev]")!==FALSE){
				$dom = new DOMDocument('1.0', 'utf-8');
				@$dom->loadHTML($content);

				$xpath = new DOMXPath($dom);

				$items = $xpath->evaluate("//*[contains(@class, 'previous')]");

				foreach($items as $elem){
					$elem->parentNode->removeChild($elem);
				}
				
				$content = $dom->saveHTML();
				
				return str_replace("[remove_prev]","",$content);
			}else{
				return $content;
			}
		}
		
		function button($atts){
		
			return "<button><a target='" . $atts['target'] . "' href='" . addslashes($atts['href']) . "'>" . $atts['label'] . "</a></button>";
		
		}
		
		function feedback_button($atts){
		
			$id = "button_" . time() . rand(0,time());
		
			return "<button onclick=\"javascript:document.getElementById('" . $id . "').style.display='block';\">" . $atts['label'] . "</button><p id=\"" . $id . "\" style='display:none'>" . $atts['feedback'] . "</p>";
		
		}
		
		function faq($atts){
		
			return "<details>
                <summary>" . $atts['question'] . "</summary>
                <p>" . $atts['answer'] . "</p>
              </details>";
		
		}
		
		function hint($atts){
		
			return "<details class='hint'>	
                  <summary><i class='fa fa-info-circle'></i>" . $atts['hint'] . "</summary>
                  <p>" . $atts['reveal'] . "</p>
                </details>";
		
		}
		
		function accordion($atts){
		
			$output = "";
			
			foreach($atts as $key => $value){
				if(strpos($key, "data")===FALSE){
					$output .= "<h3>" . $value . "</h3><div>" . $atts[$key . "_data"] . "</div>";
				}
			}
			
			return "<div class='accordion'>" . $output . "</div>";
		
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
			
			if(isset($post->oer_advanced_footer)){				
			
				$footer = $wp_registered_sidebars['footer-sidebar-id'];
				
				echo $footer['before_widget'];
				echo $footer['before_title'];
				echo $post->oer_footer['title'];
				echo $footer['after_title'];
				echo $post->oer_footer['content'];
				echo $footer['after_widget'];
				
			}
			
		}
		
		function advanced_footer_text_record($atts){
		
			global $post;
			
			$post->oer_advanced_footer = $atts;
			
			return "";
			
		}
		
		function advanced_footer_text_show(){
		
			global $post;
			
			if(isset($post->oer_advanced_footer)){
			
				?><div class='advanced_footer'><?PHP echo $post->oer_advanced_footer['content']; ?></div><?PHP
			
			}
		
		}
		
		function device($atts){
			
			$atts['type'] = ucfirst($atts['type']);
			
			switch($atts['type']){
			
				case "Activity" : $img = "http://wikieducator.org/images/4/4e/Icon_activity.jpg"; break;	
				case "Portfolio Activity" : $img = "http://wikieducator.org/images/4/4e/Icon_activity.jpg"; break; 	
				case "Extension exercise" :	$img = "http://wikieducator.org/images/4/4e/Icon_activity.jpg"; break;
				case "Assignment" :	$img = "http://wikieducator.org/images/9/90/Icon_assess.gif"; break;
				case "Question" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;
				case "Questions" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;	
				case "Did you know?" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;
				case "Did you notice?" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;	 
				case "Definition" : $img = "http://wikieducator.org/images/f/f0/Icon_define.gif"; break;	
				case "Definitions" : $img = "http://wikieducator.org/images/f/f0/Icon_define.gif"; break;	
				case "Discussion" :	$img = "http://wikieducator.org/images/0/04/Icon_discussion.gif"; break;
				case "Tell us a story" : $img = "http://wikieducator.org/images/0/04/Icon_discussion.gif"; break;	
				case "Case study" :	$img = "http://wikieducator.org/images/6/61/Icon_casestudy.gif"; break;
				case "Example" : $img = "http://wikieducator.org/images/6/61/Icon_casestudy.gif"; break;	
				case "Objective" : $img = "http://wikieducator.org/images/9/91/Icon_objectives.jpg"; break;	
				case "Objectives" : $img = "http://wikieducator.org/images/9/91/Icon_objectives.jpg"; break;	
				case "Outcomes" : $img = "http://wikieducator.org/images/9/91/Icon_objectives.jpg"; break;	
				case "Key points" : $img = "http://wikieducator.org/images/2/25/Icon_key_points.gif"; break;	
				case "Media required" : $img = "http://wikieducator.org/images/e/ea/Icon_multimedia.gif"; break;	
				case "Media" : $img = "http://wikieducator.org/images/e/ea/Icon_multimedia.gif"; break;	
				case "Reading" : $img = "http://wikieducator.org/images/b/bc/Icon_review.gif"; break;	
				case "Competency" : $img = "http://wikieducator.org/images/b/bc/Icon_review.gif"; break;	
				case "Competencies" : $img = "http://wikieducator.org/images/b/bc/Icon_review.gif"; break;	
				case "Summary" : $img = "http://wikieducator.org/images/c/c7/Icon_summary.gif"; break;	
				case "Self assessment" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;	
				case "Assessment" : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;	
				case "Reflection" : $img = "http://wikieducator.org/images/9/9d/Icon_reflection.gif"; break;	
				case "Preknowledge"	: $img = "http://wikieducator.org/images/6/64/Icon_preknowledge.gif"; break;
				case "Web Resources" : $img = "http://wikieducator.org/images/9/9a/Icon_inter.gif"; break;
				default : $img = "http://wikieducator.org/images/c/c6/Icon_qmark.gif"; break;
			
			}
			
			return "<div class='oeru_idevice'><div class='idevice_image'><img src='" . $img . "' /></div><div class='idevice_content'><h2>" . $atts['type'] . "</h2>" . $atts['content'] . "</div></div>";
			
		}
		
		public function fitb($atts){
		
			$length = strlen($atts['answer']) * rand(0,3);
		
			return "<span><input class='oeru_fitb' type='text' length='" . $length . "' answer='" . crypt($atts['answer'], CRYPT_SHA512) . "' /></span>";
		
		}
		
		public function fitb_check(){
			
			if(wp_verify_nonce($_POST['nonce'], "oeru_fitb_check")){
				if(crypt($_POST['submission'], CRYPT_SHA512) == $_POST['answer']){
					echo "true";
				}
			}
			
			die();
		
		}
		
		public function true_false($atts){
	
			if($atts['option_1_answer']=="true"){
				$option_1 = "glyphicon-ok";
				$class_1 = "correct";
			}else{
				$option_1 = "glyphicon-remove";
				$class_1 = "incorrect";
			}
			
			if($atts['option_2_answer']=="true"){
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
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-pencil"></span>' . $atts['option_1'] . '</a>
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
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-pencil"></span>' . $atts['option_2'] . '</a>
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
	
	}
	
	$shortcode = new oeru_shortcode();

	add_filter( 'the_content', array($shortcode,'remove_next') );
	add_filter( 'the_content', array($shortcode,'remove_prev') );
	add_shortcode( 'oeru_button', array($shortcode,'button') );
	add_shortcode( 'oeru_feedback_button', array($shortcode,'feedback_button') );
	add_shortcode( 'oeru_faq', array($shortcode,'faq') );
	add_shortcode( 'oeru_hint', array($shortcode,'hint') );
	add_shortcode( 'oeru_accordion', array($shortcode,'accordion') );	
	add_shortcode('oeru_basic_footer', array($shortcode,'basic_footer_text_record'));
	add_action('oer_footer', array($shortcode,'basic_footer_text_show'));
	add_shortcode('oeru_advanced_footer', array($shortcode,'advanced_footer_text_record'));
	add_action('oer_post_footer', array($shortcode,'advanced_footer_text_show'));
	add_shortcode('oeru_table', array($shortcode,'table'));
	add_shortcode('oeru_idevice', array($shortcode,'device'));
	add_shortcode('oeru_fitb', array($shortcode,'fitb'));
	add_shortcode('oeru_true_false', array($shortcode,'true_false'));
	add_shortcode('oeru_mcq', array($shortcode,'mcq'));
	add_shortcode('oeru_mtq', array($shortcode,'mtq'));
	add_filter('the_content', array($shortcode,'remove_third'));
	