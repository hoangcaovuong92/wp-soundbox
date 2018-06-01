<?php
	$show_title 	= get_theme_mod('soundbax_genneral_blog_show_title','1');
	$show_thumbnail = get_theme_mod('soundbax_genneral_blog_show_thumbnail','1');
	$show_date 		= get_theme_mod('soundbax_genneral_blog_show_date','1');
	$show_author 	= get_theme_mod('soundbax_genneral_blog_show_author','1');
	$show_category 	= get_theme_mod('soundbax_genneral_blog_show_category','1');
	$show_readmore 	= get_theme_mod('soundbax_genneral_blog_show_read_more','1');
	$show_excerpt 	= get_theme_mod('soundbax_genneral_blog_show_excerpt','1');
	$number_excerpt = get_theme_mod('soundbax_genneral_blog_number_excerpt','20');
?>
<?php
	$_post_config = get_post_meta($post->ID,'_soundbax_custom_post_config',true);
	if( strlen($_post_config) > 0 ){
		$_post_config = unserialize($_post_config);
	}
	$temp 			= isset($_post_config['post_type']) ? ' extra-'.$_post_config['post_type'] : '';
	$show_thumbnail_flash = 1; 
?>
<div class="wd-wrap-content-blog">
	<div class='wd-wrap-content-blog__container' >
	<!-- Post type: Video -->
	<?php if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'video' && $show_thumbnail == '1') : ?>
		<div class="wd-video">
			<div class="wd-thumbnail-video">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php
				if(strlen(trim($_post_config['video_url'])) > 0){
					$url_video =  soundbax_get_embbed_video(trim($_post_config['video_url']),1200,650);
				}
			?>			
			<a class="tvlgiao_playvideo"><?php esc_html_e('Play Video','wdsoundbox') ?></a>
			<input class="hidden" type="text" value="<?php echo esc_attr($url_video); ?>" id="tvlgiao_urlvideo">			
		</div>
	<?php $show_thumbnail_flash = 0; endif; ?>

	<!-- Post type: Audio -->
	<?php if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'audio' && $show_thumbnail == '1') : ?>
		<div class="wd-audio">
			<?php
				if(( strlen(trim($_post_config['audio_soundcloud'])) > 0 || strlen(trim($_post_config['audio_mp3'])) > 0) ){
					$audio_url = trim($_post_config['audio_soundcloud']);
					if (!empty($audio_url) && strlen(trim($_post_config['audio_soundcloud'])) > 0) {
						echo soundbax_soundcloud_flash_widget('100%','130',$audio_url);
					}
					else {
						$audio_url = trim($_post_config['audio_mp3']);
						if (!empty($audio_url) && strlen(trim($_post_config['audio_mp3'])) > 0) {
							$attr = array(
								'src'      	=> $audio_url,
								'loop'     	=> '',
								'autoplay' 	=> '',
								'preload' 	=> 'none'
								);
							echo wp_audio_shortcode( $attr );
						}
					}
				}
			?>
		</div>
	<?php $show_thumbnail_flash = 0; endif; ?>

	<!-- Post type: Slider -->
	<?php if(isset($_post_config['post_type']) && $_post_config['post_type'] == 'slide' && $show_thumbnail == '1') : ?>
		<div class="slider">
			<?php
				$post_slider = get_post_meta($post->ID,'_soundbax_post_slider',true);
				$post_slider = unserialize($post_slider);
				if(is_array($post_slider) && count($post_slider) > 0){
					$post_slider_config = get_post_meta($post->ID,'_soundbax_post_slider_config',true);
					$post_slider_config = unserialize($post_slider_config);
					?>
					<div class="post-slider" data-nav="<?php echo esc_attr($post_slider_config['post_slider_config_nav']); ?>" data-pagi="<?php echo esc_attr($post_slider_config['post_slider_config_pagi']);?>" data-auto="<?php echo esc_attr($post_slider_config['post_slider_config_auto']);?>">
						<ul class="slides">
							<?php foreach( $post_slider as $slide ){ ?>	
								<?php
									$image_attributes = wp_get_attachment_image_src( $slide['id'],'full' );
								?>
								<li><a href="<?php echo esc_url($image_attributes[0]);?>" data-rel="prettyPhoto[product-gallery]"><?php echo wp_get_attachment_image($slide['id'], 'blog_thumb', false);?></a></li>
							<?php } ?>
						</ul>	
					</div>
					<?php
				}
			?>
		</div>
	<?php $show_thumbnail_flash = 0; endif; ?>

	<!-- Post type: Gallery -->
	<?php if( isset($_post_config['post_type']) && $_post_config['post_type'] == 'gallery' && $show_thumbnail == '1') : ?>
		<div class="wd-gallery">
			<?php
				$post_gallery = get_post_meta($post->ID,'_soundbax_post_gallery',true);
				$post_gallery = unserialize($post_gallery);
			?>
			<?php if(is_array($post_gallery) && count($post_gallery) > 0){ ?>
			<?php
				$post_gallery_config = get_post_meta($post->ID,'_soundbax_post_gallery_config',true);
				$post_gallery_config = unserialize($post_gallery_config);
				$id_gallery = 'gallery-'.rand(0,1000).time();	
				//$arr_width = wp_outline_parse_gallery_width($post_gallery_config['gallery_width']);
				//$min_width = wp_outline_find_min_size($arr_width);
				$array_width = $post_gallery_config['gallery_width'];
				$size_arr = explode(',', trim($array_width));
				$arr_width = array();
				foreach($size_arr as $k => $v){
					$arr_temp = explode('_', trim($v));
					$width_percent = round($arr_temp[0] * 100 / $arr_temp[1],3,PHP_ROUND_HALF_DOWN);
					$arr_width[$k] = $width_percent;
				}
				//
				$min = 1000;
				foreach($arr_width as $v => $k){
					if($k < $min)
						$min = $k;
				}
				$min_width  = $min;
			?>
				<div class="post-gallery">
					<div id="<?php echo esc_attr($id_gallery);?>" class="post_mansory" data-min="<?php echo esc_attr($min_width);?>">
						<?php 
							$count = 0;
							foreach( $post_gallery as $_image ){ 
								$image_attributes = wp_get_attachment_image_src( $_image['id'],'full' );
								
						?>
								<div class="gallery_item" data-width="<?php echo esc_attr($arr_width[$count]);?>">
									<a class="thumbnail" data-rel="prettyPhoto[product-gallery]" href="<?php echo esc_url($image_attributes[0]);?>">
										<?php echo wp_get_attachment_image($_image['id'], 'full', false);?>
										<span class="body_color_background"></span>
										<span class="btn_readmore"></span>
									</a>
								</div>
						<?php $count ++; } ?>
					</div>
				</div>
			<?php } ?>	
		</div>
	<?php $show_thumbnail_flash = 0; endif; ?>

	<!-- Post type: Show Thumbnail -->
	<?php if( has_post_thumbnail() && $show_thumbnail_flash == 1 && $show_thumbnail == '1'): ?>
		<div class="wd-thumbnail-post">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<?php
					the_post_thumbnail();
				?>
			</a>
		</div>
	<?php endif; // End If ?>

	<div class="wd-info-post">
		<div class="wd-title-post">
			<h2 class="wd-heading-title">
				<a href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
			</h2>
		</div>
	
	<div class="wd-content-detail-post">
		<?php //the_content(); ?>
		<?php the_excerpt() ?>
	</div>
	<div class="wd-meta-post">
			<div class="wd-date-post">
				<?php the_time('d/m/Y');?>
			</div>
			<div class="wd-comment-post">
				<?php echo get_comments_number(); ?>
				<?php esc_html_e('COMMENTS ','wdsoundbox'); ?>
			</div>
			
	</div>
</div>
</div>
</div>