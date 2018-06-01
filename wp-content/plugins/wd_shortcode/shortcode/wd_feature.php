<?php
/**
 * Shortcode: tvlgiao_wpdance_feature
 */
if(!function_exists('tvlgiao_wpdance_features_function')){
	function tvlgiao_wpdance_features_function($atts,$content){
		extract(shortcode_atts(array(
			'class'						=>	''
			,'id'						=>	0
			,'show_icon_font_thumbnail'	=>	'1'
			,'image_url_icon' 			=> ''
			,'icon_fontawesome' 		=>	'fa fa-adjust'
			,'style_font'				=> 	'style-font-1'
			,'style_thumbnail'			=> 	'style-thumbnail-1'
			,'title'					=>	'yes'
			,'excerpt'					=>	'yes'
			,'readmore'					=> 	'yes'
			,'active'					=> 	'no'
		),$atts));
		
		$title 			= strcmp('yes',$title) 		== 0 ? 1 : 0; 
		$excerpt 		= strcmp('yes',$excerpt) 	== 0 ? 1 : 0;
		$readmore 		= strcmp('yes',$readmore) 	== 0 ? 1 : 0;
		$img 			= wp_get_attachment_image_src($image_url_icon, "large");
		$imgSrc_icon 	= $img[0];

		$active_class = "";
		if($active == "yes"){
			$active_class = "feature_active";
		}

		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "features-by-woothemes/woothemes-features.php", $_actived ) ) {
			return;
		}
		
		if( absint($id) > 0 ){
			$_feature = woothemes_get_features( array('id' => $id,'size' => 'feature-thumbnail' ));
		}elseif( strlen(trim($slug)) > 0 ){
			$_feature = get_page_by_path($slug, OBJECT, 'feature');
			if( !is_null($_feature) ){
				$_feature = woothemes_get_features( array('id' => $_feature->ID,'size' => 'feature-thumbnail' ));
			}else{
				return;
			}
		}else{
			return;
			//invalid input params.
		}
		
		//nothing found
		if( !is_array($_feature) || count($_feature) <= 0 ){
			return;
		}else{
			global $post;
			$_feature = $_feature[0];
			$post = $_feature;
			setup_postdata( $post ); 
		}
		$style = 'style-font-1';
		if($show_icon_font_thumbnail == 1){
			$style = $style_font;
		}else{
			$style = $style_thumbnail;
		}
		if( $show_icon_font_thumbnail == 0){
			$class = $class.' '.'wd_feature_style_thumbnail';
		}elseif($show_icon_font_thumbnail == 1){
			$class = $class.' '.'wd_feature_style_icon';
		}else{
			$class = $class.' '.'wd_feature_style_image';
		}
		ob_start();
		?>
		<div <?php post_class('shortcode-features')?> >	
			<div class="feature_content_wrapper<?php echo esc_attr($class.' '.$style); ?> <?php echo esc_attr($active_class); ?>">	
				<div class="feature_thumbnail_image">
					<?php if( (strcmp(trim($show_icon_font_thumbnail),"1") == 0) ) { ?>
						<a class="wd-feature-icon" href="<?php echo esc_url($_feature->url);?>"><div class="feature_icon fa fa-3x <?php echo esc_attr($icon_fontawesome); ?>"></div></a>
					<?php }elseif(strcmp(trim($show_icon_font_thumbnail),"2") == 0){ ?>
						<div class="wd-icon-image">
							<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($imgSrc_icon)?>"/>
						</div>
					<?php }else{ ?>
					<div class="thumbnail_image">
						<?php
							if( has_post_thumbnail() ) : 
								the_post_thumbnail( 'woo_feature', array( 'alt' => esc_attr(get_the_title()), 'title' => esc_attr(get_the_title()) ) );
							endif;
						?>
					</div>
					<?php } ?>
				</div>
				<div class="feature_information">
					<div class="feature_information_wrapper">
					<?php if( $title ) :?>
						<h3 class="feature_title heading_title">
							<a href="<?php echo esc_url($_feature->url);?>"><?php the_title(); ?></a>
						</h3>
					<?php endif;?>
						
					<?php if( $excerpt ) :?>
						<div class="feature_excerpt">
							<?php the_excerpt(); ?>
						</div>
					<?php endif;?>
					<?php if( $readmore ) :?>
						<a class='wd-feature-readmore' href="<?php echo esc_url($_feature->url);?>"><?php esc_html_e('Read more','wpdance'); ?></a>
					<?php endif;?>
					</div>		
				</div>		
			</div>
		</div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_feature','tvlgiao_wpdance_features_function');
?>