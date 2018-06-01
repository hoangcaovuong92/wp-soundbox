<?php
	class Tvlgiao_Wpdance_GeneralTheme{
		//Variable
		protected $soundbax_theme_name		= 'WP Dance';
		protected $soundbax_theme_slug		= 'wdsoundbox';
		protected $soundbax_arr_functions 	= array();
		protected $soundbax_arr_widgets 		= array();
		protected $soundbax_arr_libs 		= array();
		protected $soundbax_arr_customize 	= array();
		protected $soundbax_arr_hook      	= array();

		//Constructor
		public function __construct(){
			$this->soundbax_constant();
			$this->soundbax_init_arr_functions();
			$this->soundbax_init_arr_widgets();
			$this->soundbax_init_arr_libs();
			$this->soundbax_init_arr_customize();
			$this->soundbax_init_arr_hook();
		}
		// Function Setup Theme
		public function soundbax_init(){
			//After setup theme
			add_action( 'after_setup_theme', array($this,'soundbax_setup_theme'));
			//Include Lib
			$this->soundbax_init_libs();
			//Include Function
			$this->soundbax_init_functions();
			//Include Widget
			$this->soundbax_init_widgets();
			//Include Customize
			$this->soundbax_init_customize();
			//include hook
			$this->soundbax_init_hook();
			//Customize Color Styling
			$name = TVLGIAO_WPDANCE_THEME_SLUG.'custom_style';
			if( !get_option( $name ) ) {
				soundbax_save_custom_style();
			}
			//Call admin
			require_once get_template_directory().'/framework/includes/wd_metaboxes.php';
			$classNameAdmin = 'Tvlgiao_Wpdance_Admin_GeneralTheme';
			$panel 			= new $classNameAdmin();
		}
		// Constant
		protected function soundbax_constant(){			
			// Default
			define('TVLGIAO_WPDANCE_DS',DIRECTORY_SEPARATOR);	
			define('TVLGIAO_WPDANCE_THEME_NAME'				, $this->soundbax_theme_name );
			define('TVLGIAO_WPDANCE_THEME_SLUG'				, $this->soundbax_theme_slug.'_');
			define('TVLGIAO_WPDANCE_THEME_DIR'				, get_template_directory());
			define('TVLGIAO_WPDANCE_THEME_URI'				, get_template_directory_uri());
			define('TVLGIAO_WPDANCE_THEME_ASSET_URI'		, TVLGIAO_WPDANCE_THEME_URI . '/assets');
			// Style-Script-Image
			define('TVLGIAO_WPDANCE_THEME_IMAGES'			, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/images');
			define('TVLGIAO_WPDANCE_THEME_CSS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/css');
			define('TVLGIAO_WPDANCE_THEME_JS'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/js');
			define('TVLGIAO_WPDANCE_THEME_FONT'				, TVLGIAO_WPDANCE_THEME_ASSET_URI . '/fonts');
			//Framework Theme
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK'		, TVLGIAO_WPDANCE_THEME_DIR . '/framework');
			define('TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI'	, TVLGIAO_WPDANCE_THEME_URI . '/framework');
			//Folder in Framework
			define('TVLGIAO_WPDANCE_THEME_FUNCTIONS'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/functions');	
			define('TVLGIAO_WPDANCE_THEME_LIB'				, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/lib');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES_PLUGIN'	, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/plugins');
			define('TVLGIAO_WPDANCE_THEME_WIDGETS'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/widgets');
			define('TVLGIAO_WPDANCE_THEME_SHORTCODES'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/shortcodes');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 		. '/includes');
			define('TVLGIAO_WPDANCE_THEME_INCLUDES_URI'		, TVLGIAO_WPDANCE_THEME_FRAMEWORK_URI 	. '/includes');
			//Folder WPDANCE
			define('TVLGIAO_WPDANCE_THEME_WPDANCE'			, TVLGIAO_WPDANCE_THEME_FRAMEWORK 	. '/wpdance');
			define('TVLGIAO_WPDANCE_THEME_CUSTOMIZE'		, TVLGIAO_WPDANCE_THEME_WPDANCE 	. '/customize');
			define('TVLGIAO_WPDANCE_THEME_HOOK'		        , TVLGIAO_WPDANCE_THEME_WPDANCE 	. '/hook');
		}

		//Include Function
		protected function soundbax_init_arr_functions(){
			$this->soundbax_arr_functions = array('easy-digital-downloads','checkplugin','wdsoundbox','wd_video','wd_add_metabox','wd_register_sidebar','wd_register_tgmpa_plugin','wd_main','wd_pagination','wd_customize_set_custom_css','wd_customize_live_preview_color','wd_comment_form','wd_customize_styling_style','wd_woo_account','wd_woo_cart','wd_excerpt','wd_soundcloud','wd_counter_views','wd_template_tag','wd_breadcrumbs','wd_woo_hook','wd_woo_product','wd_custom_style_font','wd_font_customize','wd_customize_set_font');
		}
		//Include Widget
		protected function soundbax_init_arr_widgets(){
			$this->soundbax_arr_widgets = array('wd_twitter','wd_download_tax','wd_download','ew_subscriptions','wd_social_profiles','wd_special_post','wd_emads','wd_special_products');
		}
		
		//Include Lib
		protected function soundbax_init_arr_libs(){
			$this->soundbax_arr_libs = array('twitteroauth','class-tgm-plugin-activation','add-control-custom-radio-image','wd-add-control-custom-font');
		}
		//Include Customize
		protected function soundbax_init_arr_customize(){
			$this->soundbax_arr_customize = array('wd_customize_sanitize_callback','wd_customize_header','wd_customize_footer','wd_customize_blog','wd_customize_styling_option','wd_customize_theme_option',
														 'wd_customize_product','wd_customize_font');
		}
		protected function soundbax_init_arr_hook(){
			$this->soundbax_arr_hook = array('download');
		}
		// Load File
		protected function soundbax_init_functions(){
			foreach($this->soundbax_arr_functions as $function){
				if(file_exists(TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php")){
					require_once TVLGIAO_WPDANCE_THEME_FUNCTIONS."/{$function}.php";
				}	
			}
		}
		protected function soundbax_init_widgets(){
			foreach($this->soundbax_arr_widgets as $widget){
				if(file_exists(TVLGIAO_WPDANCE_THEME_WIDGETS."/{$widget}.php")){
					require_once TVLGIAO_WPDANCE_THEME_WIDGETS."/{$widget}.php";
				}
			}
		}
		protected function soundbax_init_libs(){
			foreach($this->soundbax_arr_libs as $lib){
				if(file_exists(TVLGIAO_WPDANCE_THEME_LIB. "/{$lib}.php")){
					require_once TVLGIAO_WPDANCE_THEME_LIB. "/{$lib}.php";
				}
			}
		}
		protected function soundbax_init_customize(){
			foreach($this->soundbax_arr_customize as $custom){
				if(file_exists(TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php")){
					require_once TVLGIAO_WPDANCE_THEME_CUSTOMIZE. "/{$custom}.php";
				}
			}
		}
		protected function soundbax_init_hook(){
			foreach($this->soundbax_arr_hook as $hook){
				if(file_exists(TVLGIAO_WPDANCE_THEME_HOOK. "/{$hook}.php")){
					require_once TVLGIAO_WPDANCE_THEME_HOOK. "/{$hook}.php";
				}
			}
		}
		//Setup Theme
		public function soundbax_setup_theme(){
		    global $content_width;
		    if ( !isset($content_width) ) {
		        $content_width = 1170;
		    }
			//Make theme available for translation
			//Translations can be filed in the /languages/ directory
   			load_theme_textdomain('wdsoundbox', get_template_directory() . '/languages');
   			//Import Register Menu
   			$this->soundbax_register_location_menu();
   			//Import Theme Support
   			$this->soundbax_theme_support();
   			//Import Google Font
   			add_action('wp_enqueue_scripts',array($this,'soundbax_slug_fonts_url'));
   			//Import Script / Style
   			add_action('wp_enqueue_scripts',array($this,'soundbax_add_scripts'));
		}
		//Register Menu
		public function soundbax_register_location_menu(){
			register_nav_menus(array(
		        'primary' 			=> esc_html__('Primary', 'wdsoundbox'),
		        'primary_mobile' 	=> esc_html__('Primary Menu Mobile', 'wdsoundbox'),
		    ));
		}
		//Theme Support
		public function soundbax_theme_support(){
			// Enable support for Post Formats.
    		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
			add_theme_support( "title-tag" );
			add_theme_support( 'automatic-feed-links' );
			
		}
		//Google Font Theme
		function soundbax_slug_fonts_url() {
		    $soundbax_query_args = array(
		        'family' => urlencode('Roboto Condensed:400,400italic,700,700italic|Open Sans:400,600,700,300|Satisfy:400|Montserrat:400,700|Mrs Sheppards:400|Lato:400,400italic,700,700italic')
		    );
		    wp_register_style( 'google-fonts', add_query_arg( $soundbax_query_args, "//fonts.googleapis.com/css" ), array(), null );
		    wp_enqueue_style( 'google-fonts' );
		}
		private function soundbax_background_header()
			{
			    if (class_exists('woocommerce') && is_shop()):
			        $id_page = woocommerce_get_page_id('shop');
			    else:
			        $id_page = get_the_ID();
			    endif;

			    if ((is_page() || (class_exists('woocommerce') && is_shop())) && has_post_thumbnail($id_page)):
			        $url = wp_get_attachment_url(get_post_thumbnail_id($id_page));
			    else:
			        $url = get_theme_mod( 'soundbax_banner_header' ,TVLGIAO_WPDANCE_THEME_IMAGES.'/bg_header.jpg');
			    endif;

			  	return $url;
			}
		//Add Script
		public function soundbax_add_scripts(){
			/*----------------- Style ---------------------*/
			// LIB
			wp_register_style('bootstrap-css', 				TVLGIAO_WPDANCE_THEME_CSS.'/bootstrap.css');
			wp_enqueue_style('bootstrap-css');
			wp_register_style('font-awesome', 				TVLGIAO_WPDANCE_THEME_CSS.'/font-awesome.min.css');
			wp_enqueue_style('font-awesome');
			wp_register_style('flex-slider-css', 			TVLGIAO_WPDANCE_THEME_CSS.'/flexslider.css');
			wp_enqueue_style('flex-slider-css');
			wp_register_style('owl-carousel-min-css', 		TVLGIAO_WPDANCE_THEME_CSS.'/owl.carousel.min.css');
			wp_enqueue_style('owl-carousel-min-css');
			wp_register_style('cloud-zoom-css', 			TVLGIAO_WPDANCE_THEME_CSS.'/cloud-zoom.css');
			wp_enqueue_style('cloud-zoom-css');
			
			
			// CSS OF THEME
			wp_register_style('tvlgiao-wpdance-style-css', 	TVLGIAO_WPDANCE_THEME_URI.'/style.css');
			wp_enqueue_style('tvlgiao-wpdance-style-css');
			wp_enqueue_style('wd-update-css', 				TVLGIAO_WPDANCE_THEME_CSS.'/wd_update.css');
			/*----------------- Script ---------------------*/
    		// LIB
    		wp_register_script( 'jquery-ui', 		TVLGIAO_WPDANCE_THEME_JS.'/jquery-ui.js' , array('jquery'));
    		wp_enqueue_script('jquery-ui');
    		
    		wp_register_script( 'flex-slider-min-js', 		TVLGIAO_WPDANCE_THEME_JS.'/jquery.flexslider-min.js' , array('jquery'));
    		wp_enqueue_script('flex-slider-min-js');
    		wp_register_script( 'imagesloaded-min-js', 		TVLGIAO_WPDANCE_THEME_JS.'/jquery.imagesloaded.min.js');
    		wp_enqueue_script('imagesloaded-min-js');
    		wp_register_script( 'isotope-pkgd-min-js', 		TVLGIAO_WPDANCE_THEME_JS.'/isotope.pkgd.min.js');
    		wp_enqueue_script('isotope-pkgd-min-js');
    		wp_register_script( 'hover-intent-js', 			TVLGIAO_WPDANCE_THEME_JS.'/jquery.hoverIntent.js');
    		wp_enqueue_script('hover-intent-js');
    		wp_register_script( 'owl-carousel-min-js', 		TVLGIAO_WPDANCE_THEME_JS.'/owl.carousel.min.js');
    		wp_enqueue_script('owl-carousel-min-js');
       		wp_register_script( 'cloud-zoom-js', 		TVLGIAO_WPDANCE_THEME_JS.'/cloud-zoom.1.0.2.js');
    		wp_enqueue_script('cloud-zoom-js');
    		
    		// JS OF THEME
    		wp_register_script( 'tvlgiao-wpdance-main-js', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_main.js');
    		wp_enqueue_script('tvlgiao-wpdance-main-js');
    		wp_register_script( 'tvlgiao-wpdance-js', 		TVLGIAO_WPDANCE_THEME_JS.'/wd_wpdance.js');
    		wp_enqueue_script('tvlgiao-wpdance-js');
      		wp_register_script( 'tvlgiao-woo-product-js', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_woo_product.js');
    		wp_enqueue_script('tvlgiao-woo-product-js');
    		wp_register_script( 'wd_download', 	TVLGIAO_WPDANCE_THEME_JS.'/wd_download.js');
    		wp_enqueue_script('wd_download');

    	$url = $this->soundbax_background_header();
			if(!empty($url)):
				$custom_css = '.wd_header_background{background:#606aa4 url('.esc_url($url).') no-repeat bottom center !important;} ';
				wp_add_inline_style('tvlgiao-wpdance-style-css',$custom_css);
			endif;
		  if (is_singular() && comments_open()) { wp_enqueue_script('comment-reply'); }
			
		}
	}
?>