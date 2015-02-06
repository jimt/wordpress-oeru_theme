<?PHP	

	class oeru_shortcode{

		function remove_next( $content ) {
		
			if(strpos($content,"[remove_next]")!==FALSE){
				
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
			if(strpos($content,"[remove_prev]")!==FALSE){
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
	
	}
	
	$shortcode = new oeru_shortcode();

	add_filter( 'the_content', array($shortcode,'remove_next') );
	add_filter( 'the_content', array($shortcode,'remove_prev') );
	add_shortcode( 'oeru_button', array($shortcode,'button') );
	add_shortcode( 'oeru_feedback_button', array($shortcode,'feedback_button') );
	add_shortcode( 'oeru_faq', array($shortcode,'faq') );
	add_shortcode( 'oeru_hint', array($shortcode,'hint') );
	add_shortcode( 'oeru_accordion', array($shortcode,'accordion') );