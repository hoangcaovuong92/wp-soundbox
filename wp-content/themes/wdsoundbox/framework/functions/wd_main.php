<?php
	/*--------------------------------------------------------------*/
	/*						 CONTROL THEME	 						*/
	/*--------------------------------------------------------------*/

	/**
	 * Return HTML Headers array used for WP_Customize_Control select
	 * $value_default : Url image defaul header.
	 * Value return: Url Image or Name Header
	 * @return array 
	 */
	if(!function_exists ('soundbax_get_html_choices')){
		function soundbax_get_html_choices($slug_terms, $value_default, $value_return) {
			global $post;
			$pre_post 	= $post;
			$choices 	= array('-1' => $value_default);
			$args = array(
				'post_type' 	=> 'wpdance_html',
				'posts_per_page'=>-1,
				'orderby' 		=> 'post_title',
				'order' 		=> 'ASC',
				'tax_query' 	=> array(
					array(
						'taxonomy' => 'wpdance_category_html',
						'field'    => 'slug',
						'terms'    => array( $slug_terms ),
					)
				),
			);
			$html_block = new WP_Query( $args );
			while ($html_block->have_posts()) {
				$html_block->the_post();
				if($value_return == 'url_image'){
					$choices[get_the_ID()] = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
				}else{
					$choices[get_the_ID()] = get_the_title('', '', false);
				}
			}
			wp_reset_postdata();
			$post 		= $pre_post;
			return $choices;
		}
	}


	/*GET HEADER LAYOUT*/
	if (!function_exists('soundbax_get_header_post')) {
		/**
		 * Return HTML Block post assigned to the header
		 * @return string
		 */
		function soundbax_get_header_post() {
			global $post;
			$meta_key_header 	= '_soundbax_custom_header';
			$metabox = get_post_meta(get_the_ID(), $meta_key_header , true);
			$custom	 = get_theme_mod('soundbax_header_layout','defaul');
			$id = '';
			if(is_search()){return;}
			if ($metabox):
				$id = $metabox;
			elseif ($custom != 'defaul'):
				$id = $custom;
			endif;
				
			if (empty($id)||!get_post($id))
				return;
			return get_post($id);
		}
	}


	if (!function_exists('soundbax_get_content_header')) {
		/**
		 * Return the content of HTML Block assigned to the Header
		 * @return string
		 */
		function soundbax_get_content_header() {
			global $post;
			$pre_post = $post;
			if (!($cur_post = soundbax_get_header_post()))
				return;
			$post 		= $cur_post;
			$content 	= apply_filters('the_content', $cur_post->post_content);
			$post 		= $pre_post;
			return $content;
		}
	}
	// Header
	add_action( 'soundbax_menu_mobile', 'soundbax_header_menu_mobile', 5 );
	if(!function_exists ('soundbax_header_menu_mobile')){
		function soundbax_header_menu_mobile(){
			if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_menu_mobile.php")){
				require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_menu_mobile.php";
			}
		}
	}	
	
	add_action( 'soundbax_header_init_action', 'soundbax_header_init', 5 );
	if(!function_exists ('soundbax_header_init')){
		function soundbax_header_init($wp_customize){
			$content_header = soundbax_get_content_header();
		if(!(empty($content_header))){ ?>
			<div class="wd_header_background_1">
				<div class="container">
					<div class="row">
						<?php echo wp_kses_post($content_header); ?>
					</div>
			
				</div>
			</div>
			<?php }else{
				if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php")){
					require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/headers/wd_header_default.php";
				}	
			}
		}
	}


	/*GET FOOTER LAYOUT*/
	if (!function_exists('soundbax_get_footer_post')) {
		/**
		 * Return HTML Block post assigned to the header
		 * @return string
		 */
		function soundbax_get_footer_post() {
			global $post;
			$meta_key_footer 	= '_soundbax_custom_footer';
			$metabox = get_post_meta(get_the_ID(), $meta_key_footer , true);
			$custom	 = get_theme_mod('soundbax_footer_layout','defaul');
			$id = '';
			if ($metabox):
				$id = $metabox;
			elseif ($custom != 'defaul'):
				$id = $custom;
			endif;
				
			if (empty($id)||!get_post($id))
				return;
			return get_post($id);
	}
}


	if (!function_exists('soundbax_get_content_footer')) {
		/**
		 * Return the content of HTML Block assigned to the Header
		 * @return string
		 */
		function soundbax_get_content_footer() {
			global $post;
			$pre_post = $post;
			if (!($cur_post = soundbax_get_footer_post()))
				return;
			$post 		= $cur_post;
			$content 	= apply_filters('the_content', $cur_post->post_content);
			$post 		= $pre_post;
			return $content;
		}
	}

	// Footer
	add_action( 'soundbax_footer_init_action', 'soundbax_footer_init', 5 );
	if(!function_exists ('soundbax_footer_init')){
		function soundbax_footer_init($wp_customize){
			$content_footer = soundbax_get_content_footer();
			if(!(empty($content_footer))){ ?>
				<div class="container">
					<div>
						<?php echo ($content_footer); ?>
					</div>
				</div>
			<?php }else{
				if(file_exists(TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php")){
					require_once TVLGIAO_WPDANCE_THEME_WPDANCE. "/footers/wd_footer_default.php";
				}	
			}
		}
	}

	//Breadcrumbs Init
	if(!function_exists ('soundbax_init_breadcrumbs')){
		function soundbax_init_breadcrumbs(){
			$layout_breadcrumbs	= get_theme_mod('soundbax_breadcrumb','breadcrumb_default'); 
			?>
			<div class="wd-blog-breadcrumb <?php echo esc_attr($layout_breadcrumbs); ?>">
				<div class="container">
					<div class="row">
						<div class="wrap-info-title">
							<div class="info-title">
								<div class="title-cotainer-header">
									<?php
										if(is_page()){
										 	echo "<h3>".get_the_title()."</h3>";
										}else{
											the_archive_title( '<h3>', '</h3>' ); 
										}
									?>
								</div>
								<div class="blog-slug">
									<?php soundbax_show_breadcrumbs() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 	
		}
	}
	add_filter('get_the_archive_title', function ($title) {
	    return str_replace(':',' -',$title);
	});
	/*---------------------------------------------------------------------------*/
	/*								FUNCTION 									 */
	/*---------------------------------------------------------------------------*/
	
	// Comment Content
	if ( !function_exists( 'soundbax_theme_comment' )){
		function soundbax_theme_comment( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case '' :
					?>
					<div <?php comment_class(); ?> id="wd-comment-container">
						<div id="comment-<?php comment_ID(); ?>">
							<div class="comment-author vcard">
								<?php echo get_avatar($comment, 70 ); ?>
							</div><!-- .comment-author .vcard -->
							<div class="comment-text">
								<div class="comment-info-container">
									<div class="comment-author-date">
										<?php printf(  '%s <span class="says"></span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
									</div>

									<div class="comment-info">
										<span class="reply"><?php comment_reply_link( array_merge( array( 'reply_text' => '<i class="fa fa-reply"></i>') , array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
										<span class="edit"><?php edit_comment_link('<i class="fa fa-pencil-square-o"></i>', ' ' );?></span>
									</div><!-- .reply -->
								</div>
								<div class="comment-body"><?php comment_text(); ?></div>
								<?php if ( $comment->comment_approved == '0' ) : ?>
									<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wdsoundbox' ); ?></em><br/>
								<?php endif; ?>
								<div class="comment-date"><?php printf( esc_html__( '%1$s', 'wdsoundbox' ), get_comment_date()); ?> </div>
							</div>
						</div><!-- #comment-##  -->
					</div>
					<?php
					break;
				case 'pingback'  :
				case 'trackback' :
				break;
			endswitch;
		} // End Function
	} // End If

	// Get global data
	if(!function_exists ('soundbax_get_post_by_global')){
		function soundbax_get_post_by_global(){
			global $post;
			$id_post = $post->ID;
			return $id_post;
		}
	}
	
	// Add Social Share
	add_action('wp_head', 'soundbax_addthis_script', 999);
	function soundbax_addthis_script(){
		if( is_single() || is_page_template('page-templates/blog-template.php') || is_category() || is_tag() ){ ?>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547e8f2f2a326738" async="async"></script>
		<?php }
	}

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

	// Filter Search Form
	add_filter( 'get_search_form', 'soundbax_search_form' );
	function soundbax_search_form( $form ) {
		$id = 'searchform'.rand(1,100);
		$query_search = esc_html__( 'Search item here....' , 'wdsoundbox');
		if(get_search_query() != ""){
			$query_search = get_search_query();
		}
	    $form = '
		    <form role="search" method="get" id="'.$id.'" class="searchform" action="' .esc_url(home_url( '/' )) . '" >
		    	<label class="screen-reader-text" for="s">' . esc_html__( 'Search for:' , 'wdsoundbox') . '</label>
		    	<input type="text" placeholder="' . $query_search . '" name="s" id="'.$id.'" />
		    	<button type="submit" title="Search"><i class="fa fa-search"></i></button>
		    </form>'; 
	    return $form;
	}
	

	if (!function_exists('soundbax_htmlblock_css')) {
		/**
		 * Function add custom CSS of HTML Block in the head element
		 *
		 * @param integer $post_id Post ID
		 * @return string CSS to add to the head tag
		 */
		function soundbax_htmlblock_css($post_id) {
			$ret = '';
			
			/** code copied from Vc_Base::addPageCustomCss() */
			$post_custom_css = get_post_meta( $post_id, '_wpb_post_custom_css', true );
			if ( ! empty( $post_custom_css ) )
				$ret .= '<style type="text/css" data-type="vc_custom-css">'.$post_custom_css.'</style>';
			
			/** code copied from Vc_Base::addShortcodesCustomCss() */
			$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
			if ( ! empty( $shortcodes_custom_css ) ) {
				$ret .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$shortcodes_custom_css.'</style>';
			}
			
			return $ret;
		}
	}
	/** Visual composer is installed? */
	if (function_exists('visual_composer')) {
		if (!function_exists('soundbax_htmlblock_vc_styles')) {
			/**
			 * Add Visual Composer custom css styles of HTML Blocks
			 *
			 * Visual Composer only includes css style of the main post, so we have
			 * to add custom css styles of HTML blocks by ourself.
			 */
			function soundbax_htmlblock_vc_styles() {
				
				if ($post = soundbax_get_header_post())
					echo soundbax_htmlblock_css($post->ID);
					
				if ($post = soundbax_get_footer_post())
					echo soundbax_htmlblock_css($post->ID);
			}
		}
		add_action('wp_head', 'soundbax_htmlblock_vc_styles');
	}

	// Check Woo
	if( !function_exists('soundbax_is_woocommerce') ){
		function soundbax_is_woocommerce(){
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
				return false;
			}
			return true;
		}
	}

	add_action( 'wp_head', 'soundbax_print_inline_script', 100000000 );
	if(!function_exists ('soundbax_print_inline_script')){
		function soundbax_print_inline_script(){
		?>	
		<script type="text/javascript">
			<?php if( defined('ICL_LANGUAGE_CODE') ): ?>
				var _ajax_uri = '<?php echo admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE, 'relative');?>';
			<?php else: ?>
				var _ajax_uri = '<?php echo admin_url('admin-ajax.php', 'relative');?>';
			<?php endif; ?>
			jQuery('.menu li').each(function(){
				if(jQuery(this).children('.sub-menu').length > 0) jQuery(this).addClass('parent');
			});
		</script>
		<?php
		}
	}

	/*Function : Scroll Button */
	function soundbax_scroll_button_site_function(){
	    $scroll_button    = get_theme_mod('soundbax_scroll_button', "no");
	    if($scroll_button == "yes"){
	        if(!wp_is_mobile()):?>
	            <div id="to-top" class="scroll-button">
	                <a class="scroll-button" href="javascript:void(0)" title="<?php esc_html_e('Back to Top','wdsoundbox');?>"></a>
	            </div>
	        <?php endif;
	    }
	}
	add_action('soundbax_footer_init_action','soundbax_scroll_button_site_function');

	
function edd_get_cart_item_template_custom( $cart_key, $item, $ajax = false ) {
	global $post;

	$id = is_array( $item ) ? $item['id'] : $item;

	$remove_url = edd_remove_item_url( $cart_key );
	$title      = get_the_title( $id );
	$options    = !empty( $item['options'] ) ? $item['options'] : array();
	$quantity   = edd_get_cart_item_quantity( $id, $options );
	$price      = edd_get_cart_item_price( $id, $options );

	if ( ! empty( $options ) ) {
		$title .= ( edd_has_variable_prices( $item['id'] ) ) ? ' <span class="edd-cart-item-separator">-</span> ' . edd_get_price_name( $id, $item['options'] ) : edd_get_price_name( $id, $item['options'] );
	}

	ob_start();

	edd_get_template_part( 'widget', 'cart-item' );

	$item = ob_get_clean();

	$item = str_replace( '{item_title}', $title, $item );
	$item = str_replace( '{item_amount}', edd_currency_filter( edd_format_amount( $price ) ), $item );
	$item = str_replace( '{cart_item_id}', absint( $cart_key ), $item );
	$item = str_replace( '{item_id}', absint( $id ), $item );
	$item = str_replace( '{item_quantity}', absint( $quantity ), $item );
	$item = str_replace( '{remove_url}', $remove_url, $item );
  	$subtotal = '';
  	if ( $ajax ){
   	 $subtotal = edd_currency_filter( edd_format_amount( edd_get_cart_subtotal() ) ) ;
  	}
 	$item = str_replace( '{subtotal}', $subtotal, $item );

	return apply_filters( 'edd_cart_item', $item, $id );
}
function wdsoundbox_title( $sep = '', $display = true, $seplocation = '' ) {
    global $wp_locale;
 
    $m        = get_query_var( 'm' );
    $year     = get_query_var( 'year' );
    $monthnum = get_query_var( 'monthnum' );
    $day      = get_query_var( 'day' );
    $search   = get_query_var( 's' );
    $title    = '';
 
    $t_sep = '%WP_TITLE_SEP%'; // Temporary separator, for accurate flipping, if necessary
 
    // If there is a post
    if ( is_single() || ( is_home() && ! is_front_page() ) || ( is_page() && ! is_front_page() ) ) {
        $title = single_post_title( '', false );
    }
 
    // If there's a post type archive
    if ( is_post_type_archive() ) {
        $post_type = get_query_var( 'post_type' );
        if ( is_array( $post_type ) ) {
            $post_type = reset( $post_type );
        }
        $post_type_object = get_post_type_object( $post_type );
        if ( ! $post_type_object->has_archive ) {
            $title = post_type_archive_title( '', false );
        }
    }
 
    // If there's a category or tag
    if ( is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    }
 
    // If there's a taxonomy
    if ( is_tax() ) {
        $term = get_queried_object();
        if ( $term ) {
            $tax   = get_taxonomy( $term->taxonomy );
            $title = single_term_title(  );
        }
    }
 
    // If there's an author
    if ( is_author() && ! is_post_type_archive() ) {
        $author = get_queried_object();
        if ( $author ) {
            $title = $author->display_name;
        }
    }
 
    // Post type archives with has_archive should override terms.
    if ( is_post_type_archive() && $post_type_object->has_archive ) {
        $title = post_type_archive_title( '', false );
    }
 
    // If there's a month
    if ( is_archive() && ! empty( $m ) ) {
        $my_year  = substr( $m, 0, 4 );
        $my_month = $wp_locale->get_month( substr( $m, 4, 2 ) );
        $my_day   = intval( substr( $m, 6, 2 ) );
        $title    = $my_year . ( $my_month ? $t_sep . $my_month : '' ) . ( $my_day ? $t_sep . $my_day : '' );
    }
 
    // If there's a year
    if ( is_archive() && ! empty( $year ) ) {
        $title = $year;
        if ( ! empty( $monthnum ) ) {
            $title .= $t_sep . $wp_locale->get_month( $monthnum );
        }
        if ( ! empty( $day ) ) {
            $title .= $t_sep . zeroise( $day, 2 );
        }
    }
 
    // If it's a search
    if ( is_search() ) {
        /* translators: 1: separator, 2: search phrase */
        $title = sprintf( __( 'Search Results %1$s %2$s','wdsoundbox' ), $t_sep, strip_tags( $search ) );
    }
 
    // If it's a 404 page
    if ( is_404() ) {
        $title = __( 'Page not found','wdsoundbox' );
    }
 
    $prefix = '';
    if ( ! empty( $title ) ) {
        $prefix = " $sep ";
    }
 
    /**
     * Filters the parts of the page title.
     *
     * @since 4.0.0
     *
     * @param array $title_array Parts of the page title.
     */
    $title_array =  explode( $t_sep, $title ) ;
 
    // Determines position of the separator and direction of the breadcrumb
    if ( 'right' == $seplocation ) { // sep on right, so reverse the order
        $title_array = array_reverse( $title_array );
        $title       = implode( " $sep ", $title_array ) . $prefix;
    } else {
        $title = $prefix . implode( " $sep ", $title_array );
    }
 
    /**
     * Filters the text of the page title.
     *
     * @since 2.0.0
     *
     * @param string $title Page title.
     * @param string $sep Title separator.
     * @param string $seplocation Location of the separator (left or right).
     */
    // Send it out
    if ( $display ) {
        echo esc_html($title);
    } else {
        return $title;
    }
}
function soundbox_wpdance_search_post() {
		?>
		<div class="wd-search-post">	
		<a class="wd-click-popup-search"><i class="fa fa-search"></i></a>
		<div class="wd-popup-search hidden">
			<?php get_search_form( $echo = true );?>
			<div class="wd-search-close">X</div>
		</div>
		</div>
		<?php
	}