<?php
add_action( 'wp_enqueue_scripts', 'tvlgiao_wpdance_ajax_pagination_scripts' );
function tvlgiao_wpdance_ajax_pagination_scripts() {

 	wp_enqueue_script( 'wd-ajax-pagination-script', plugins_url( '/assets/js/wd_loadmore_js.js', __FILE__ ), array( 'jquery' ) );

 	global $wp_query;
 	wp_localize_script( 'wd-ajax-pagination-script', 'ajax_object', array(
		'ajax_url' 			=> admin_url( 'admin-ajax.php' ),
		'query_vars'		=> json_encode( $wp_query->query )
	));
 	wp_localize_script( 'wd-ajax-pagination-script', 'blog_ajax_object', array(
		'ajax_url_blog' 	=> admin_url( 'admin-ajax.php' ),
		'query_vars'		=> json_encode( $wp_query->query )
	));
 	wp_localize_script( 'wd-ajax-pagination-script', 'masonry_ajax_object', array(
		'ajax_url_masonry' 	=> admin_url( 'admin-ajax.php' ),
		'query_vars'		=> json_encode( $wp_query->query )
	));
}
add_action( 'wp_ajax_load_more', 'load_more_function_post' );
add_action( 'wp_ajax_nopriv_load_more', 'load_more_function_post' );

function load_more_function_post() {
	$query_vars 		= json_decode( stripslashes( $_POST['query_vars'] ), true );
	$offset 			= isset($_REQUEST['offset'])?intval($_REQUEST['offset']):0;
	$posts_per_page 	= isset($_REQUEST['posts_per_page'])?intval($_REQUEST['posts_per_page']):8;
	$post_type 			= isset($_REQUEST['post_type'])?$_REQUEST['post_type']:'post';
	$id_category 		= isset($_REQUEST['category_id'])?$_REQUEST['category_id']:'post';
	$data_show 			= isset($_REQUEST['data_show'])?$_REQUEST['data_show']:'post';

	// New Product
	$args = array( 
		'post_type' 		=> 'product', 
		'offset' 			=> $offset, 
		'posts_per_page' 	=> $posts_per_page,
	);

	//Category
	if( $id_category != -1 ){
		$args['tax_query']= array(
				    	array(
						    	'taxonomy' 		=> 'product_cat',
								'terms' 		=> $id_category,
								'field' 		=> 'term_id',
								'operator' 		=> 'IN'
							)
		   			);
	}
	//Most View Products
	if($data_show == 'mostview_product'){
		$args['meta_key'] 	= '_wd_product_views_count';
		$args['orderby'] 	= 'meta_value_num';
		$args['order'] 		= 'DESC';
	}

	//On Sale Product
	if($data_show == 'onsale_product'){
		$args['meta_query'] = array(
				                    'relation' => 'OR',
				                    array( // Simple products type
				                        'key'           => '_sale_price',
				                        'value'         => 0,
				                        'compare'       => '>',
				                        'type'          => 'numeric'
				                    ),
				                    array( // Variable products type
				                        'key'           => '_min_variation_sale_price',
				                        'value'         => 0,
				                        'compare'       => '>',
				                        'type'          => 'numeric'
				                    )
           					);
	}
	//Featured Product
	if($data_show == 'featured_product'){
		$args['meta_key'] 	= '_featured';
		$args['meta_value'] = 'yes';
	}

	$products = new WP_Query( $args );
	if ( $products->have_posts() ){
		while ( $products->have_posts() ) : $products->the_post(); 
			wc_get_template_part( 'content', 'product' ); 
		endwhile;	 
	}else{ ?>
	    <div id="wd_status" class="hidden">
	    	<input type="text" value="1" id="tvlgiao_have_post">
		</div> <?php
	} // Have Product
	die();
}
if(!function_exists ('tvlgiao_wpdance_string_limit_words')){
		function tvlgiao_wpdance_string_limit_words($string, $word_limit){
		  $words = explode(' ', $string, ($word_limit + 1));
		  if(count($words) > $word_limit)
		  array_pop($words);
		  return implode(' ', $words);
		}
	}

add_action( 'wp_ajax_load_more_blog', 'load_more_blog_function_special_post' );
add_action( 'wp_ajax_nopriv_load_more_blog', 'load_more_blog_function_special_post' );
function load_more_blog_function_special_post() {
	$query_vars 		= json_decode( stripslashes( $_POST['query_vars'] ), true );
	$offset 			= isset($_REQUEST['offset'])?intval($_REQUEST['offset']):0;
	$posts_per_page 	= isset($_REQUEST['posts_per_page'])?intval($_REQUEST['posts_per_page']):8;
	$post_type 			= isset($_REQUEST['post_type'])?$_REQUEST['post_type']:'post';
	$id_category 		= isset($_REQUEST['category_id'])?$_REQUEST['category_id']:'post';
	$data_show 			= isset($_REQUEST['data_show'])?$_REQUEST['data_show']:'post';
	$columns			= isset($_REQUEST['columns'])?$_REQUEST['columns']:'post';
	$show_image_slider	= isset($_REQUEST['show_data_image_slider'])?$_REQUEST['show_data_image_slider']:'post';
	$show_gird_list		= isset($_REQUEST['show_gird_list'])?$_REQUEST['show_gird_list']:'post';
	$span_class 		= "col-sm-".(24/$columns);
	wp_reset_query();
	// New blog
	$args = array(  
		'post_type' 		=> 'post',  
		'posts_per_page' 	=> $posts_per_page,
		'offset' 			=> $offset
	);
	//Category
	if( $id_category != -1 ){
		$args['tax_query']= array(
				    	array(
						    	'taxonomy' 		=> 'category',
								'terms' 		=> $id_category,
								'field' 		=> 'term_id',
								'operator' 		=> 'IN'
							)
		   			);
	}
	//Most View Products
	if($data_show == 'mostview_blog'){
		$args['meta_key'] 	= '_wd_post_views_count';
		$args['orderby'] 	= 'meta_value_num';
		$args['order'] 		= 'DESC';
	}
	//Most Comment
	if($data_show == 'comment_blog'){
		$args['orderby']		= 'comment_count';
	}	
	$special_blogs 		= new WP_Query( $args );
	if ( $special_blogs->have_posts() ){
		while ( $special_blogs->have_posts() ) : $special_blogs->the_post();  ?>
			<div class="wd-load-more-content-blog <?php echo esc_attr($span_class);?>">
				<?php if($show_image_slider == "0" && $show_gird_list == "gird" /*GRID*/): ?>
					<?php if( get_post_format() == 'quote'): ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php else: ?>
						<?php get_template_part( 'content', 'postformat' ); ?>
					<?php endif; ?>
				<?php else: ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endif; ?>
			</div>
		<?php endwhile;	
	}else{ ?>
	    <div id="wd_status" class="hidden">
	    	<input type="text" value="1" id="tvlgiao_have_post">
		</div> <?php
	} // Have Product
    die();	
}

function wpdance_get_excerpt($excerpt,$number=20){
	global $post;
	$connect_excerpt = preg_replace('(\[.*?\])', '', $excerpt);
	if(!empty($connect_excerpt) && !empty($number)){
		$array = explode(" ",$connect_excerpt );
		if ( count($array) > $number ){
			for ($i = 0; $i < $number; $i++ ) {  $string[] = $array[$i] ;}
			$connect_excerpt = implode(" ", $string) ;
			$connect_excerpt .= '...';
		} 
	}
	return $connect_excerpt.'';
}
if(!function_exists ('tvlgiao_wpdance_query_data')){
		function tvlgiao_wpdance_query_data($array_data){
			global $post;
			$data_array = array();
			$data = new WP_Query($array_data);
			if( $data->have_posts() ){
				while( $data->have_posts() ){
					$data->the_post();
					$data_array[$post->ID] =$post->post_title;
				}
			}
			wp_reset_postdata();
			return $data_array;
		}
	}

	#add action tvlgiao_download_before_heade custom download
	add_action('tvlgiao_download_before_heade','tvlgiao_download_header_left',5 );
	add_action('tvlgiao_download_before_heade','gridlist_toggle_button',10 );
	add_action('tvlgiao_download_before_heade','tvlgiao_download_filter',15 );
	add_action('tvlgiao_download_before_heade','tvlgiao_download_footer_left',20 );

	function tvlgiao_download_header_left(){
		echo '<div class="header_download_left">';
	}
	#end div header_download_left
	function tvlgiao_download_footer_left(){
		echo '</div>';
	}
	#download filter 
	function tvlgiao_download_filter(){
	?>
		<form class="download-ordering" method="get">
			<select name="orderby" class="orderby" onchange="this.form.submit()" >
					<option value="id" selected="selected">Select sorting</option>
					<option value="sale">Sort by sale</option>
					<option value="post_date">Sort by newness</option>
					<option value="price">Sort by price</option>
					<option value="title">Sort by title</option>
			</select>
	</form>
	<?php
	}

	function gridlist_toggle_button() {
	?>
		<div class="gird-list">
		<nav id="options" class="gridlist-toggle hidden-xs">
			<ul class="option-set" data-option-key="layoutMode">
				<li data-option-value="vertical" id="list" class="goAction wd-tooltip" data-toggle="tooltip" title="<?php _e('List view', 'wpdance'); ?>">
					<a href="javascript:void(0)"><i class="fa fa-th-list"></i></a>
				</li>
				<li data-option-value="fitRows" id="grid" class="goAction wd-tooltip" data-toggle="tooltip" title="<?php _e('Grid view', 'wpdance'); ?>">
					<a href="javascript:void(0)"><i class="fa fa-th-large"></i></a>
				</li>
			</ul>
		</nav>
		</div>

		<script type="text/javascript">
			jQuery(document).ready(function($){
				jQuery('.gridlist-toggle #grid').addClass('active').siblings().removeClass('active');
				jQuery('.edd_downloads_list').addClass('grid');

				jQuery('.gridlist-toggle #list').click(function(event) {
					/* Act on the event */
					if(jQuery('.edd_downloads_list').hasClass('grid')){
						jQuery('.edd_downloads_list').removeClass('grid').addClass('list');
					}else{
						jQuery('.edd_downloads_list').addClass('list');
					}
					jQuery(this).addClass('active').siblings().removeClass('active');
				});

				jQuery('.gridlist-toggle #grid').click(function(event) {
					/* Act on the event */
					if(jQuery('.edd_downloads_list').hasClass('list')){
						jQuery('.edd_downloads_list').removeClass('list').addClass('grid');
					}else{
						jQuery('.edd_downloads_list').addClass('grid');
					}
					jQuery(this).addClass('active').siblings().removeClass('active');
				});
			});
		</script>
	<?php
}
function  tvlgiao_wpdance_pagination($num_pages_per_phrase = 3, $query = null){
		if(function_exists ('wp_pagenavi')){
			wp_pagenavi() ;			
			return;
		}
		global $wp_query;
		
		$found_posts = $wp_query->found_posts;
		$paged = max( 1, absint( $wp_query->get( 'paged' ) ) );
		$max_num_pages = $wp_query->max_num_pages;
		if( $query != null ){
			$found_posts = $query->found_posts;
			$paged = max( 1, absint( $query->get( 'paged' ) ) );
			$max_num_pages = $query->max_num_pages;
		}

		if( !isset($_GET['page']) ){
			$_GET['page'] = 1;
		}
		if( $found_posts > 0 ): 
			$pageLink = soundbax_get_pagenum_link($_GET['page']);
			$pageLink = str_replace(array('page='.$_GET['page'],'page/'.$_GET['page']),'',$pageLink);
			if( strpos($pageLink,'?') === false ){
				$pageLink .= '?';
			}
			elseif(strpos($pageLink,'?') >= 0 && strpos($pageLink,'&') === false){
				$pageLink .= '&';
			}
			
			$term = get_query_var('term');
			$tax = get_query_var('taxonomy');
			$max_page = min(array($max_num_pages,$num_pages_per_phrase));
			if( $max_page <= 0){ 
				$max_page = 1; 
			}
			$phrase = ceil($paged/$max_page);
			$start_page = $max_page*($phrase-1) + 1;
			
			?>
			<?php
			if($paged > 1){?>
			<a class="first" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=1'; //first link ?>">
				<?php wp_kses(_e('Firt','wpdance'),array()); ?>
			</a>
			<a class="previous" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=' . ($paged - 1); //next link ?>">
				<?php wp_kses(_e('Previous post','wpdance'),array()); ?>
			</a>
			<?php }
			if($phrase > 1){?>
					<a class="previous-phrase" href="<?php echo esc_url($pageLink);?><?php echo 'paged=' . ($max_page*($phrase-2) + 1); //prev prase link ?>">...</a>
			<?php } ?>
			<?php
			if( $max_num_pages > 1 ) {
				for($i=0;$start_page+$i<=min(array($max_num_pages, $start_page+$max_page-1));$i++){?>
					<?php if($paged==$start_page+$i):?>
						<span class="pager current<?php if($i == 0) echo ' first-pager';if($start_page+$i == min(array($max_num_pages, $start_page+$max_page-1))) echo ' last-pager';?>"><?php echo ($start_page + $i); ?></span>
					<?php else:?>
						<a class="pager<?php if($i == 0) echo ' first-pager';if($start_page+$i == min(array($max_num_pages, $start_page+$max_page-1))) echo ' last-pager';?>" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=' . ($start_page + $i); ?>"><?php echo ($start_page + $i); ?></a>
					<?php endif; ?>
					<?php
				}
			}
			if($phrase < ceil($max_num_pages/$max_page)){?>
					<a class="next-phrase" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=' . ($max_page*$phrase + 1); //next phrase link ?>">...</a>
			<?php } ?>
			<?php if($paged < $max_num_pages){?>
					<a class="next" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=' . ($paged + 1); //next link ?>">
						<?php wp_kses(_e('Next Post','wpdance'),array())?></a>
					<a class="last" href="<?php echo esc_url($pageLink); ?><?php echo 'paged=' . $max_num_pages; //next link ?>">
						<?php wp_kses(_e('Last','wpdance'),array())?></a>
			<?php }?>
		
			<?php
		endif;
		paginate_links(); /* Fix theme check */				
	}
// AJAX
add_action('wp_ajax_nopriv_more_post_ajax', 'tvlgiao_wpdance_more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'tvlgiao_wpdance_more_post_ajax');
function tvlgiao_wpdance_more_post_ajax(){ 
	global $wp_outline_wd_data;

	$offset 		= $_POST["offset"];
	$posts_per_page = $_POST["posts_per_page"];
	$columns 		= $_POST["columns"];
	header("Content-Type: text/html");

	wp_reset_postdata();
	$args = array(		
		'post_type' 				=> 'post'
		,'posts_per_page' 			=> $posts_per_page
		,'offset' 					=> $offset
		,'ignore_sticky_posts' 		=> 1
	);
	$posts = new WP_Query($args);
	$span_class = "col-sm-".(24/$columns);
	if( $posts->have_posts() ) { ?>
		<?php $wd_have_post = 1; ?>
		<?php while ( $posts->have_posts() ) : $posts->the_post(); global $post; ?>
			<div class="wd-wrap-content-blog grid-item <?php echo esc_attr($span_class); ?>">
			<div class='wd-wrap-content-blog__container' >
	        	<?php get_template_part( 'content','masonry' ); ?>
	        </div>
	        </div>
		<?php endwhile;   ?>
	<?php }else{ ?>
	<?php $wd_have_post = 0;?>
	<?php }; ?>
	<div id="wd_status" class="hidden">
		<input type="text" value="<?php echo esc_html( $wd_have_post); ?>" id="wp_outline_have_post">
	</div>
	<?php exit; ?>
<?php } 
if(!function_exists ('tvlgiao_wpdance_vc_get_data')){
		function tvlgiao_wpdance_vc_get_data($array_data){
			global $post;
			$data_array = array();
			$data = new WP_Query($array_data);
			if( $data->have_posts() ){
				while( $data->have_posts() ){
					$data->the_post();
					$data_array[$post->post_title] = $post->ID;
				}
			}
			wp_reset_postdata();
			return $data_array;
		}
	}
	//Register post type HTML Block
	add_action('init', 'soundbax_bootstrap_htmlblock_init');
	if (!function_exists('soundbax_bootstrap_htmlblock_init')) {
		function soundbax_bootstrap_htmlblock_init() {

			register_taxonomy( 'wpdance_category_html', 'book', array(
				'hierarchical'      => true,
				'labels'            => array(
					'name' 				=> esc_html__('Categories HTML', 'wdsoundbox'),
					'singular_name' 	=> esc_html__('Categories HTML', 'wdsoundbox'),
                	'new_item'          => esc_html__('Add New', 'wdsoundbox' ),
                	'edit_item'         => esc_html__('Edit Post', 'wdsoundbox' ),
                	'view_item'   		=> esc_html__('View Post', 'wdsoundbox' ),
                	'add_new_item'      => esc_html__('Add New Category HTML', 'wdsoundbox' ),
                	'menu_name'         => esc_html__( 'Categories HTML' , 'wdsoundbox' ),
				),
				'show_ui'           	=> true,
				'show_admin_column' 	=> true,
				'query_var'         	=> true,
				'rewrite'           	=> array( 'slug' => 'wpdance_category_html' ),				
				'public'				=> true,
			));

			register_post_type('wpdance_html', array(
				'labels' => array(
					'name' 				=> esc_html__("HTML Blocks", 'wdsoundbox'),
					'singular_name' 	=> esc_html__("HTML Block", 'wdsoundbox'),
                	'new_item'          => esc_html__( 'Add New', 'wdsoundbox' ),
                	'edit_item'         => esc_html__( 'Edit Post', 'wdsoundbox' ),
                	'view_item'   		=> esc_html__( 'View Post', 'wdsoundbox' )
				),
				'taxonomies' 			=> array('wpdance_category_html'),
				'public' 				=> true,
				'has_archive' 			=> false
			));
			
			add_theme_support('post-thumbnails');
			add_post_type_support( 'wpdance_html', 'thumbnail' );
			
			$term_header = term_exists( 'wpdance_header_layout', 'wpdance_category_html' );
			if ( $term_header == 0 && $term_header == null ) {
			    wp_insert_term( esc_html__('Header', 'wdsoundbox') , 'wpdance_category_html', array(
			    	'description'		=> esc_html__('Layout Header','wdsoundbox'),
			    	'slug' 				=> 'wpdance_header_layout'
  				));
			}
			

			$term_footer = term_exists( 'wpdance_footer_layout', 'wpdance_category_html' );
			if ( $term_header == 0 && $term_header == null ) {
	  			wp_insert_term( esc_html__('Footer', 'wdsoundbox') , 'wpdance_category_html', array(
				    'description'		=> esc_html__('Layout Footer','wdsoundbox'),
				    'slug' 				=> 'wpdance_footer_layout'
	  			));
	  		}
		}
	}
	function create_my_taxonomies() {
		register_taxonomy(
			'industries',
			'post',
			array(
				'hierarchical' => false,
				'label' => 'Industries',
				'query_var' => true,
				'rewrite' => true
			)
		);
	}
	add_action('init', 'create_my_taxonomies', 0);
?>