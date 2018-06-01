<?php
/**
 * Shortcode: tvlgiao_wpdance_feature_slider
 */
if(!function_exists('tvlgiao_wpdance_feature_slider_function')){
	function tvlgiao_wpdance_feature_slider_function($atts,$content){
		extract(shortcode_atts(array(
			'number'				=> '5'
			,'title'				=>	'yes'
			,'thumbnail'		=> 'yes'
			,'excerpt'				=>	'yes'
			,'readmore'				=> 	'yes'
			,'class'						=>	''
			,'feature_style'		=>  'feature_slider'
			,'feature_list_id'		=>  ''
		),$atts));
		
		$title 		= strcmp('yes',$title) 		== 0 ? 1 : 0; 
		$excerpt 	= strcmp('yes',$excerpt) 	== 0 ? 1 : 0;
		$readmore 	= strcmp('yes',$readmore) 	== 0 ? 1 : 0;
		$thumbnail 	= strcmp('yes',$thumbnail) 	== 0 ? 1 : 0;
		$args = array(
			'post_type' 	=> 'feature',
			'posts_per_page'=>	$number,
		);
		$feature_list_id = (!empty($feature_list_id))?explode(',',$feature_list_id):array();
		$feature_post = new WP_Query( $args );		
		
		if ( $feature_post->have_posts() ) {
			$num_post =  $feature_post->post_count;
			$random_id = 'wd_feature_woo_'.mt_rand();
			ob_start(); ?>
			<?php if (strcmp($feature_style,'feature_slider')==0): ?>
			<div id="<?php echo esc_attr($random_id); ?>" class="wd-feature-shortcode <?php echo esc_attr($class); ?>">
				<ul class="slides">
				<?php while( $feature_post->have_posts() ) : $feature_post->the_post(); global $post; ?>
					<?php if(has_post_thumbnail()){ ?>
						<li  data-thumb="<?php echo esc_url(the_post_thumbnail_url('full'));?>">
							<a href="<?php echo esc_url(the_post_thumbnail_url('full'));?>" data-rel="prettyPhoto[product-gallery]">
								<?php the_post_thumbnail('full',array('class' => 'thumbnail-effect-1', 'title'=>get_the_title())); ?>
							</a>
						</li>				 
					<?php } ?>
				<?php endwhile; ?>
				</ul>
			</div>
			<?php elseif(strcmp($feature_style,'feature_tab')==0):?>
				<div class='feature_tab_left'>
					<ul class='feature-tab_left__ul'>
						<?php foreach ($feature_list_id as $id) {?>
							<li class='feature-tab_left__li'><a href='javascript:void(0)' rel='<?php echo esc_attr('#feature_'.$id); ?>'><?php echo get_the_title($id); ?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class='feature_right_tab'>
					<?php $i = 1;?>
					<?php foreach ($feature_list_id as $id) {?>
						<div class='feature_right_tab__item  <?php echo ($i == 1)?'active':'';?>' id='<?php echo esc_attr('feature_'.$id); ?>' style='display:none'>
							<div class="feature_right_tab__container">
							<?php if($title):?>
								<div class='feature_right_tab__title'><h3><?php echo get_the_title($id); ?></h3></div>
							<?php endif; ?>
							<?php if($readmore):?>
							<div class='feature_right_tab__thumnail'><a href='<?php echo get_the_permalink($id);?>'><?php echo esc_html__('Read More','wdance' );?></a></div>
							<?php endif; ?>
							<?php if($excerpt):?>
							<div class='feature_right_tab__content'><?php echo get_post_field('post_content',$id); ?></div>
							<?php endif; ?>
							</div>
							<?php if($thumbnail):?>
								<?php if(has_post_thumbnail($id)):?>
								<div class='feature_right_tab__thumnail'><?php echo get_the_post_thumbnail($id,'full');?></div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
						<?php $i += 1;?>
					<?php }?>
				</div>
			<?php endif; ?>
			<script type="text/javascript">
				if(jQuery('#<?php echo esc_attr($random_id); ?>').length >0 ){
					jQuery('#<?php echo esc_attr($random_id); ?>').each(function(){
						var _auto = true;
						var _nav = true;
						var _pagi = true;
						jQuery(this).flexslider({
							animation: "slide"
							,controlNav: _pagi
							,directionNav: _nav
							,slideshow: _auto
							,controlNav: "thumbnails"
						});
					});
				}
				jQuery(document).ready(function($) {
					jQuery('.feature_right_tab__item.active').show();
					jQuery('.feature-tab_left__ul').on('click','.feature-tab_left__li',function(){
						var $id = $(this).find('a').attr('rel');
						jQuery($id).show(1000).siblings().hide();
						$(this).addClass('active').siblings().removeClass('active');
					});
				});
			</script>
		<?php } //endif 
		$output = ob_get_contents();
		ob_end_clean();
		wp_reset_query();
		return $output;
	}
}
add_shortcode('tvlgiao_wpdance_feature_slider','tvlgiao_wpdance_feature_slider_function');
?>