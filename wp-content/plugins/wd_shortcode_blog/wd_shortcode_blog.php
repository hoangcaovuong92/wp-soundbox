<?php
/*
Plugin Name: WD ShortCode Blog
Plugin URI: http://www.wpdance.com/
Description: ShortCode From WPDance Team
Author: Wpdance
Version: 2.0.1
Author URI: http://www.wpdance.com/
*/
class WD_Shortcode_Blog
{
	protected $arrShortcodes = array();
	public function __construct(){
		$this->constant();
		//$this->init_script();
		add_action('admin_enqueue_scripts', array($this,'load_wp_admin_css'));
		add_action('wp_enqueue_scripts',array($this,'init_script'));
		add_filter( 'rest_prepare_post', array($this,'my_rest_prepare_post'), 10, 3 );
		add_filter( 'rest_prepare_post', array($this,'my_rest_prepare_category'), 10, 3 );
		$this->initArrShortcodes();
		$this->initShortcodes();
		$this->tvlgiao_wpdance_load_visual();		
	}

	protected function initArrShortcodes(){
		$this->arrShortcodes = array('wd_getblogs','wd_block_2','wd_block_masonry','wd_block_3','block_video','quote','feedburner','wd_getvideoblogs','banner','breaking_news','recent_post_slider','wd_getsimpleblogs ');
	}
	
	protected function initShortcodes(){
		foreach($this->arrShortcodes as $shortcode){
			if(file_exists(SC_ShortCode_Blog."/{$shortcode}.php")){
				require_once SC_ShortCode_Blog."/{$shortcode}.php";
			}	
		}
	}
	protected function tvlgiao_wpdance_checkPluginVC(){
		$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
		if(in_array('js_composer/js_composer.php',$_active_vc)){
			return true;
		}else{
			return false;
		}
	}
	protected function tvlgiao_wpdance_load_visual(){
	if($this->tvlgiao_wpdance_checkPluginVC()){
		if ( ! defined( 'ABSPATH' ) ) { exit; }
				function tvlgiao_wpdance_include_add_map(){
						 $files = array('wd_getblogs','wd_block_2','wd_block_masonry','wd_block_3','block_video','quote','wd_getvideoblogs','breaking_news','simple_blog','banner','slide_blog','feedburner');
						foreach ($files as $file) {
							$link = plugin_dir_path( __FILE__ ) .'/visualcomposer/'.$file.'.php';
							if(file_exists($link)){
								require_once($link);
							}
				# code...
						}
				}
			add_action("vc_before_init","tvlgiao_wpdance_include_add_map");
     }
   }
	public function init_script(){
		wp_enqueue_script('jquery');
		
		wp_register_script('angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular.js', array(), null, false);
	   wp_register_script('angular-san', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular-sanitize.js', array(), null, false);
		wp_register_script(
		'angularjs-route','https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular-route.js',array(), null, false
	);
	  // register our app.js, which has a dependency on angular-core
	  wp_register_script('angular-app', SC_JS_BLOG.'/app.js', array('angular-core'), null, false);
		wp_register_script('angular-services', SC_JS_BLOG.'/wpfactory.js', array('angular-core'), null, false);
	  // enqueue all scripts
	  wp_enqueue_script('angular-core');
	  wp_enqueue_script('angular-app');
	  wp_enqueue_script('angular-services');
	  wp_enqueue_script('angular-san');
	  wp_enqueue_script('angularjs-route');
	  
	  // we need to create a JavaScript variable to store our API endpoint...   
	  
	  wp_localize_script(
			'angular-core',
			'myLocalized',
			array(
				'partials' => trailingslashit(SC_BASE_BLOG ) . 'images/',
				'nonce' => wp_create_nonce( 'wp_rest' )
				)
		);
		$wnm_custom = array( 'domain' => home_url( '/' ) );
		wp_localize_script('angular-core','directory_uri',$wnm_custom);			
		wp_register_style( 'bootstrap', SC_CSS_BLOG.'/bootstrap.css');
		wp_enqueue_style('bootstrap');
		
		wp_register_style( 'owl.carousel', SC_CSS_BLOG.'/owl.carousel.min.css');
		wp_enqueue_style('owl.carousel');
		
		wp_register_style( 'bootstrap-theme', SC_CSS_BLOG.'/bootstrap-theme.css');
		wp_enqueue_style('bootstrap-theme');
		
		wp_register_style( 'material', 'https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.0.4/angular-material.css');
		wp_enqueue_style('material');
		
		wp_register_style( 'angular-style', SC_CSS_BLOG.'/style.css');
		wp_enqueue_style('angular-style');
		
		
		wp_register_script('tvlg-masonry',SC_JS_BLOG.'/angulargrid.js',array(),'0.6.0',false );
		wp_enqueue_script('tvlg-masonry' );

		wp_register_script('tvlg-ngRepeatOwlCarousel',SC_JS_BLOG.'/ngRepeatOwlCarousel.min.js',array(),'0.6.0',false );
		wp_enqueue_script('tvlg-ngRepeatOwlCarousel' );

		wp_oembed_add_provider('#https?://(?:api\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed', true);
	}
    public function load_wp_admin_css() {
		wp_register_style( 'wp-admin-vs', SC_CSS_BLOG.'/wp-admin.css');
		wp_enqueue_style('wp-admin-vs');
    }
	protected function constant(){
		//define('DS',DIRECTORY_SEPARATOR);	
		define('SC_BASE_BLOG'	,  	plugins_url( '', __FILE__ ));
		define('SC_ShortCode_Blog'	, 	plugin_dir_path( __FILE__ ) . 'shortcode'	);
		define('SC_JS_BLOG'		, 	SC_BASE_BLOG . '/js'			);
		define('SC_CSS_BLOG'		, 	SC_BASE_BLOG . '/css'		);
		define('SC_IMAGE_BLOG'	, 	SC_BASE_BLOG . '/images'		);
	}
	public function my_rest_prepare_post( $data, $post, $request ) {
			$_data = $data->data;
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id ,'normal');
			$_data['featured_image_thumbnail_url'] = $thumbnail[0];
			$data->data = $_data;
			return $data;
		}			
	public function my_rest_prepare_category( $data, $post, $request ) {
		$_data = $data->data;
		$cats = array();
		foreach (get_the_category($post->ID) as $c) {
		$cat = get_category($c);
		array_push($cats, $cat->name);
		}

		if (sizeOf($cats) > 0) {
		$post_categories =  $cats;
		} else {
		$post_categories = 'Not Assigned';
		}
		$_data['name_category'] = $post_categories;
		////
		 $post_date = get_the_date( 'F j, Y',$post->ID );
		 $recent_author = get_user_by( 'ID', $post->post_author );
		 $author_display_name = $recent_author->display_name;
		 $my_var = get_comments_number($post->ID);
		 /////
		 $_data['post_date'] = $post_date;
		 $_data['count_conmment'] = $my_var;
		 $_data['post_author'] = $author_display_name;
		 //
		$_post_config = get_post_meta($post->ID,TVLGIAO_WPDANCE_THEME_SLUG.'custom_post_config',true);
		if( strlen($_post_config) > 0 ){
			$_post_config = unserialize($_post_config);
		}
		$_data['post_type'] = $_post_config['post_type'];
		
		// Video
		if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'video'){
			if(strlen(trim($_post_config['video_url'])) > 0){
				$video_url = trim($_post_config['video_url']);
		 		$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
		 		$_data['link_url'] = $source;
			}	
		}
		// Audio
		if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'audio'){
			if(strlen(trim($_post_config['audio_soundcloud'])) > 0){
				//$_data['audio_soundcloud'] = trim($_post_config['audio_soundcloud']);
				$source = tvlgiao_wpdance_soundcloud_flash_widget('100%','130',trim($_post_config['audio_soundcloud']));
				$_data['audio_soundcloud'] = $source;
			}	
		}
		// Slider
		if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'slide'){
			$post_slider = get_post_meta($post->ID,TVLGIAO_WPDANCE_THEME_SLUG.'post_slider',true);
			$post_slider = unserialize($post_slider);
			$_data['slider_image'] = $post_slider;
		}
		if( isset($_post_config['post_type']) && $_post_config['post_type'] == 'gallery'){
			$post_gallery = get_post_meta($post->ID,TVLGIAO_WPDANCE_THEME_SLUG.'post_gallery',true);
			$post_gallery = unserialize($post_gallery);
			$post_gallery_config = get_post_meta($post->ID,TVLGIAO_WPDANCE_THEME_SLUG.'post_gallery_config',true);
			$post_gallery_config = unserialize($post_gallery_config);
			$array_width = $post_gallery_config['gallery_width'];
			$size_arr = explode( ',', trim($array_width));
			$arr_width = array();
			$i = 0;
			foreach($size_arr as $k => $v){
				$arr_temp = explode('_', trim($v));
				$width_percent = round($arr_temp[0] * 100 / $arr_temp[1],3,PHP_ROUND_HALF_DOWN);
				$arr_width[$k] = $width_percent;
				$post_gallery[$i]['percent'] = $width_percent;
				$i++;
			}
			$min = 1000;
			foreach($arr_width as $v => $k){
				if($k < $min)
					$min = $k;
			}
			$min_width  = $min;
			$_data['min_width']		= $min_width;
			$_data['gallery_image'] = $post_gallery;
		}
		$data = $_data;
		return $data;
	}
}	

$_wd_shortcode = new WD_Shortcode_Blog; 
?>