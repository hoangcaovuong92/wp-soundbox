<?php
/*
Plugin Name: WD ShortCode
Plugin URI: http://www.wpdance.com/
Description: Plugin ShortCode From WPDance Team
Author: Wpdance
Version: 1.0.0
Author URI: http://www.wpdance.com/
*/
class WD_Shortcode
{
	protected $arrShortcodes = array();
	protected $arrVisualcomposer = array();
	public function __construct(){
		$this->constant();
		add_action('wp_enqueue_scripts', array( $this, 'init_script' ));
		require_once plugin_dir_path( __FILE__ ).'wd_functions.php';
		
		$this->initArrShortcodes();
		$this->initArrRegisterVC();
		$this->initShortcodes();
		//Load VC
		if($this->tvlgiao_wpdance_checkPluginVC()){
			if ( ! defined( 'ABSPATH' ) ) { exit; }
			add_action("vc_before_init",array($this,'tvlgiao_wpdance_load_visual'));
		}
		
		add_action( 'admin_head' , array($this, 'add_google_tracking'), 9999);
	}

	protected function initArrShortcodes(){
		$this->arrShortcodes = array('wd_faq','wd_masonry_blog','wd_girl_list_blog','wd_testimonil_tab','wd_recent_post','wd_add_service','wd_download','wd_add_shortcode','wd_user_links','wd_testimonials','wd_special_blog','wd_social_profiles','wd_site_header','wd_search_post','wd_recent_comment','wd_quote','wd_pricing_table','wd_information','wd_feedburner_subscription','wd_feature_slider','wd_feature','wd_dropdowncart','wd_count_icon','wd_brand_slider','wd_banner_image','wd_category_product','wd_category_by_name','wd_special_girl_list_product');
	}

	protected function initArrRegisterVC(){
		$this->arrVisualcomposer = array('wd_vc_blog_masonry','wd_vc_blog_girl_list','param/param_testimonial','param/param_feature','wd_vc_post','wd_vc_download','wd_vc_add_shortcode','wd_vc_generator','wd_vc_category_product','wd_vc_category_by_name','wd_vc_special_products');
	}

	protected function initShortcodes(){
		foreach($this->arrShortcodes as $shortcode){
			if( file_exists(SC_SHORTCODE."/{$shortcode}.php") ){
				require_once SC_SHORTCODE."/{$shortcode}.php";
			}	
		}
	}

	public function init_script(){
		wp_register_style( 'wd-shortcode-css', SC_CSS.'/wd_shortcode.css');
		wp_enqueue_style('wd-shortcode-css');	
		wp_register_script( 'wd-shortcode-js', SC_JS.'/wd_shortcode.js',false,false,true);
		wp_enqueue_script('wd-shortcode-js');

	}
	
	protected function constant(){
		define('SC_BASE'		,  	plugins_url( '', __FILE__ ));
		define('SC_SHORTCODE'	, 	plugin_dir_path( __FILE__ ) . 'shortcode' );
		define('SC_VISUAL'		, 	plugin_dir_path( __FILE__ ) . 'visualcomposer' );
		define('SC_ASSET'		, 	SC_BASE  . '/assets'	);
		define('SC_JS'			, 	SC_ASSET . '/js'		);
		define('SC_CSS'			, 	SC_ASSET . '/css'		);
		define('SC_IMAGE'		, 	SC_ASSET . '/images'	);
	}
	protected function tvlgiao_wpdance_checkPluginVC(){
		$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
		if(in_array('js_composer/js_composer.php',$_active_vc)){
			return true;
		}else{
			return false;
		}
	}		
	public function tvlgiao_wpdance_load_visual(){
		foreach ($this->arrVisualcomposer as $visual) {
			if( file_exists(SC_VISUAL."/{$visual}.php") ){
				require_once SC_VISUAL."/{$visual}.php";
			}
		}
    }
	function add_google_tracking(){
		?>
		<script>

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



		  ga('create', 'UA-55571446-5', 'auto');

		  ga('require', 'displayfeatures');

		  ga('send', 'pageview');

		</script>
		<?php
	}
}	

$_wd_shortcode = new WD_Shortcode;

?>