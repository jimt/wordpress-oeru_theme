<?PHP

	class OERu_theme_scan_page_settings{
	
		/**
		 * Holds the values to be used in the fields callbacks
		 */
		private $options;

		/**
		 * Start up
		 */
		public function __construct(){
			add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
			add_action( 'admin_init', array( $this, 'page_init' ) );
		}
		
		public function add_plugin_page(){
		
			add_submenu_page( 'oeru-theme-admin', 'Scan Page', 'Scan Page', 'manage_options', 'oeru-theme-scan_page', array($this, 'create_subscribers_page'));
			
		}
		
		public function create_subscribers_page(){
		
			// Set class property
			$this->options = get_option( 'oeru_theme' );
			
			?>
			<div class="wrap">           
				<form method="post" action="options.php">
				<?php
					// This prints out all hidden setting fields
					settings_fields( 'oeru_theme_scan_page' );   
					do_settings_sections( 'oeru-theme-scan_page' );
					submit_button(); 
				?>
				</form>
			</div>
			<?php
			
		}
		
		public function page_init(){   

			register_setting(
				'oeru_theme_scan_page', // Option group
				'oeru_theme', // Option name
				array( $this, 'sanitize' ) // Sanitize
			);

			add_settings_section(
				'setting_section_id', // ID
				'Scan Page Settings', // Title
				array( $this, 'scan_page_info' ), // Callback
				'oeru-theme-scan_page' // Page
			);

			add_settings_field(
				'scan_page_html', // ID
				'HTML to make up the scan page', // Title 
				array( $this, 'scan_page_html' ), // Callback
				'oeru-theme-scan_page', // Page
				'setting_section_id' // Section           
			);
			
		}
		
		public function scan_page_html(){	

			$content = html_entity_decode(esc_attr($this->options['scan_page_html']));
			
			wp_editor( $content, "scan_page_html", $settings = array(
					"textarea_name" => "oeru_theme[scan_page_html]",
					"rows" => 10,
				) 
			);
		
		}
		
		public function scan_page_info(){
			?>Use this page to set up the scan page (should you want one) for the theme<?PHP
		}
		
		
		public function sanitize( $input ){
			return $input;
		}
	
	}
	
	$OERu_theme_scan_page_settings = new OERu_theme_scan_page_settings;
	