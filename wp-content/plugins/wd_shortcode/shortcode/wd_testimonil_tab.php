<?php
/**
 * Shortcode: tvlgiao_wpdance_testimonial_slider
 */
if(!function_exists('tvlgiao_wpdance_testimonial_tab_function')){
	function tvlgiao_wpdance_testimonial_tab_function($atts,$content){
		extract(shortcode_atts(array(
			'title'				=>	'yes'
			,'excerpt'				=>	'yes'
			,'readmore'				=> 	'yes'
			,'class'				=>	''
			,'testimonial_list_id'	=>  ''
		),$atts));
		
		$title 		= strcmp('yes',$title) 		== 0 ? 1 : 0; 
		$excerpt 	= strcmp('yes',$excerpt) 	== 0 ? 1 : 0;
		$readmore 	= strcmp('yes',$readmore) 	== 0 ? 1 : 0;
		ob_start();
		$testimonial_list_id = (!empty($testimonial_list_id))?explode(',',$testimonial_list_id):array();
		?>
		<div class="testimonial_tab_container">
				<div class='testimonial_tab_left'>
					<ul class='testimonial_tab_left__ul'>
						<?php foreach ($testimonial_list_id as $id) {?>
							<li class='testimonial_tab_left__li'><a href='javascript:void(0)' rel='<?php echo esc_attr('#testimonial_'.$id); ?>'>
								<?php if(has_post_thumbnail($id)):?>
								<div class='testimonial_tab__thumnail'><?php echo get_the_post_thumbnail($id,'full');?>
								<div class="thumbnail-effect"></div>
								</div>
								<?php else: ?>
									<div class='testimonial_tab__title'><h3><?php echo get_the_title($id); ?></h3></div>
								<?php endif; ?>
							</a></li>
						<?php }?>
					</ul>
				</div>
				<div class='testimonial_right_tab'>
					<?php $i = 1;?>
					<?php foreach ($testimonial_list_id as $id) {?>
						<div class='testimonial_right_tab__item  <?php echo ($i == 1)?'active':'';?>' id='<?php echo esc_attr('testimonial_'.$id); ?>' style='display:none'>
							<?php if($title):?>
								<div class='testimonial_right_tab__title'><h3><?php echo get_the_title($id); ?></h3></div>
								<?php echo  '<span class="wd-byline">'.get_post_meta( $id, '_byline', true ).'</span>'; ?>
							<?php endif; ?>
							<?php if($excerpt):?>
							<div class='testimonial_right_tab__content'><?php echo get_post_field('post_content',$id); ?></div>
							<?php endif; ?>
							<?php if($readmore):?>
							<div class='testimonial_right_tab__thumnail'><a href='<?php echo get_the_permalink($id);?>'><?php echo esc_html__('Read More','wdance' );?></a></div>
							<?php endif; ?>
						</div>
						<?php $i += 1;?>
					<?php }?>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					jQuery('.testimonial_right_tab__item.active').show();
					jQuery('.testimonial_tab_left__ul').on('click','.testimonial_tab_left__li',function(){
						var $id = $(this).find('a').attr('rel');
						jQuery($id).show(1000).siblings().hide();
						$(this).addClass('active').siblings().removeClass('active');
					});
				});
			</script>
	<?php
		$content=ob_get_contents();
		ob_get_clean();
		return $content;
	}
}
add_shortcode('tvlgiao_wpdance_testimonial_tab','tvlgiao_wpdance_testimonial_tab_function');
?>