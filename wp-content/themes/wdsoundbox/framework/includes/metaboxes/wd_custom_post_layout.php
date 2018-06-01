<?php
	$post_id 		= soundbax_get_post_by_global();
	$_post_config 	= get_post_meta($post_id,'_soundbax_custom_post_config',true);
	$_default_post_config = array(
			'layout' 					=> '0'
			,'post_type'				=> '0'
			,'video_url' 				=> ''
			,'audio_mp3'				=> ''
			,'audio_soundcloud'			=> ''			
	);
	if( strlen($_post_config) > 0 ){
		$_post_config = unserialize($_post_config);
		if( is_array($_post_config) && count($_post_config) > 0 ){
			$_post_config['layout'] 			= ( isset($_post_config['layout']) 	&& strlen($_post_config['layout']) > 0 ) ? $_post_config['layout'] : $_default_post_config['layout'];
			//Post tyle
			$_post_config['post_type'] 			= ( isset($_post_config['post_type']) && strlen($_post_config['post_type']) > 0 ) ? $_post_config['post_type'] : $_default_post_config['post_type'];
			// Video
			$_post_config['video_url'] 			= ( isset($_post_config['video_url']) && strlen($_post_config['video_url']) > 0 ) ? $_post_config['video_url'] : $_default_post_config['video_url'];
			// Audio
			$_post_config['audio_mp3'] 			= ( isset($_post_config['audio_mp3']) && strlen($_post_config['audio_mp3']) > 0 ) ? $_post_config['audio_mp3'] : $_default_post_config['audio_mp3'];
			$_post_config['audio_soundcloud'] 	= ( isset($_post_config['audio_soundcloud']) && strlen($_post_config['audio_soundcloud']) > 0 ) ? $_post_config['audio_soundcloud'] : $_default_post_config['audio_soundcloud'];		
		}
	}else{
		$_post_config = $_default_post_config;
	}
	/* Slider Image */
	$post_slider_config = get_post_meta($post_id,'_soundbax_post_slider_config',true);
	$post_slider_config = unserialize($post_slider_config);
	
	$post_slider = get_post_meta($post_id,'_soundbax_post_slider',true);
	$post_slider = unserialize($post_slider);
	
	/* Gallery Image*/
	$post_gallery = get_post_meta($post_id,'_soundbax_post_gallery',true);
	$post_gallery = unserialize($post_gallery);
	
	$post_gallery_config = get_post_meta($post_id,'_soundbax_post_gallery_config',true);
	$post_gallery_config = unserialize($post_gallery_config);

?>
<div class="select-layout area-config area-config1">
	<div class="area-inner">
		<div class="area-inner-0">
			<h3 class="area-title"><?php esc_html_e('Extra Feature Post','wdsoundbox'); ?></h3>
			<div class="">
				<p>
					<label><?php esc_html_e('Media type','wdsoundbox');?> </label>
					<select name="single_post_type" id="single_post_type" class="global_config select-min" data-config=".slider_">
						<option value="0" 		<?php if( strcmp($_post_config["post_type"],'0') 		== 0 ) echo "selected='selected'";?>>No</option>
						<option value="video" 	<?php if( strcmp($_post_config["post_type"],'video') 	== 0 ) echo "selected='selected'";?>>Video</option>
						<option value="audio" 	<?php if( strcmp($_post_config["post_type"],'audio') 	== 0 ) echo "selected='selected'";?>>Audio</option>
						<option value="slide" 	<?php if( strcmp($_post_config["post_type"],'slide') 	== 0 ) echo "selected='selected'";?>>Slider</option>
						<option value="gallery" <?php if( strcmp($_post_config["post_type"],'gallery') 	== 0 ) echo "selected='selected'";?>>Gallery</option>
					</select>
				</p>
			</div>
			<!-- Audio MP3 / SoundCloud -->
			<div class="global_sub slider_sub slider_audio" style="display:none">
				<p>
					<label><?php esc_html_e('SoundCloud link','wdsoundbox');?> </label>
					<input type="text" name="audio_soundcloud" id="audio_soundcloud" value="<?php echo strlen($_post_config['audio_soundcloud'])? esc_url($_post_config['audio_soundcloud']): ''; ?>" />
					<span class="description"><?php esc_html_e('Input Souncloud URL. This audio shows on the single post instead of the post thumbnail', 'wdsoundbox'); ?></span>
				</p>
			</div>					
			<div class="global_sub slider_sub slider_audio" style="display:none">
				<p>
					<label><?php esc_html_e('Mp3 URL','wdsoundbox');?> </label>
					<input type="text" name="audio_mp3" id="audio_mp3" value="<?php echo strlen($_post_config['audio_mp3'])? esc_url($_post_config['audio_mp3']): ''; ?>" />
					<span class="description"><?php esc_html_e('Input mp3,wag,ogg URL. This audio shows on the single post instead of the post thumbnail', 'wdsoundbox'); ?></span>
				</p>
			</div>
			<!-- Video Youtube/ Video -->	
			<div class="global_sub slider_sub slider_video" style="display:none">
				<p>
					<label><?php esc_html_e('Video URL','wdsoundbox');?> </label>
					<input type="text" name="video_url" id="video_url" value="<?php echo strlen($_post_config['video_url'])? $_post_config['video_url']: ''; ?>" />
					<span class="description"><?php esc_html_e('Input Youtube, Vimeo or Dailymotion video URL. This video shows on the single post instead of the post thumbnail', 'wdsoundbox'); ?></span>
				</p>
			</div>
			<!-- Slider Image -->
			<div class="global_sub slider_sub slider_slide" style="display:none">
				<div class="post-slide-config">
					<label for="carousel-shortcode">Auto Slide</label>
					<div class="slide-auto">
						<select name="post_slider_config_auto" id="post_slider_config_auto">
							<option value="0" <?php if( (int)$post_slider_config['post_slider_config_auto'] == 0 ) echo "selected";?>>No</option>	
							<option value="1" <?php if( (int)$post_slider_config['post_slider_config_auto'] == 1 ) echo "selected";?>>Yes</option>
						</select>
					</div>
					<label for="carousel-shortcode">Show Nav</label>
					<div class="slide-nav">
						<select name="post_slider_config_nav" id="post_slider_config_nav">
							<option value="0" <?php if( (int)$post_slider_config['post_slider_config_nav'] == 0 ) echo "selected";?>>No</option>	
							<option value="1" <?php if( (int)$post_slider_config['post_slider_config_nav'] == 1 ) echo "selected";?>>Yes</option>
						</select>
					</div>
					<label for="carousel-shortcode">Show Pagination</label>
					<div class="slide-pagi">
						<select name="post_slider_config_pagi" id="post_slider_config_pagi">
							<option value="0" <?php if( (int)$post_slider_config['post_slider_config_pagi'] == 0 ) echo "selected";?>>No</option>	
							<option value="1" <?php if( (int)$post_slider_config['post_slider_config_pagi'] == 1 ) echo "selected";?>>Yes</option>
						</select>
					</div>							
				</div>
				<div class="uploader">
					<input type="hidden" name="_sliders_slider" value="1"/>
					<a href="javascript:void(0)" class="button stag-metabox-table"/>Insert</a>
					<a href="javascript:void(0)" class="button clear-all-slides"/>Clear</a>
					<div class="sortable-wrapper">
						<ul class="sortable">
							<?php
							if( is_array($post_slider) && count($post_slider) > 0 ):
								foreach( $post_slider as $single_slider ):
							?>
								<li>
									<div id="image-value<?php echo esc_attr($single_slider['id']);?>" class="hidden lightbox-image">
										<img  class="lightbox-preview-img" src="<?php echo esc_url($single_slider['image_url']);?>" alt="<?php echo esc_attr($single_slider['alt']);?>" title="<?php echo esc_attr($single_slider['title']);?>">
										<input type="hidden" value="<?php echo esc_attr($single_slider['id']);?>" name="element_id[]" class="inline-element element_id">
										<input type="hidden" value="<?php echo esc_attr($single_slider['image_url']);?>" name="element_image_url[]" id="element_image_url" class="inline-element insert_url">
										<input type="hidden" value="<?php echo esc_attr($single_slider['thumb_url']);?>" name="thumb_url[]" id="thumb_url" class="inline-element element_thumb">
										<p><span class="label">Slide Url</span><input type="text" value="<?php echo esc_attr($single_slider['url']);?>" name="element_url[]" class="inline-element link_url"></p>
										<p><span class="label">Image Title</span><input type="text" value="<?php echo esc_attr($single_slider['title']);?>" name="element_title[]" class="inline-element image_title "></p>
										<p><span class="label">Image Alt</span><input type="text" value="<?php echo  esc_attr($single_slider['alt']);?>" name="element_alt[]" class="inline-element image_alt"></p>
										<p><span class="label">Slide Title</span><input type="text" value="<?php echo  esc_attr($single_slider['slide_title']);?>" name="slide_title[]" class="inline-element slide_title"></p>
										<p><span class="label">Slide Contents</span><textarea name="slide_content[]" class="inline-element slide_content"><?php echo esc_html($single_slider['slide_content']);?></textarea></p>						
										<div class="btn fancy-button-wrapper">
											<a href="javascript:void(0)" class="button save-slide" name="save-slide"/>Save</a>
											<a href="javascript:void(0)" class="button save-slide" name="close-slide"/>Close</a>
										</div>
									</div>
									
									
									<p class="image-wrappper">
										<img  class="preview-img" src="<?php echo esc_url($single_slider['thumb_url']);?>" alt="<?php echo esc_attr($single_slider['alt']);?>" title="<?php echo esc_attr($single_slider['title']);?>" width="120" height="120">
										<a href="#image-value<?php echo esc_attr($single_slider['id']);?>" class="preview-img-edit">Edit</a>
										<a href="javascript:void(0)" class="preview-img-remove">Del</a>
									</p>
								</li>						
							<?php	
								endforeach;		
							endif;	
							?>

						</ul> 
					</div>
				</div>
			</div>
			<!-- Gallery Image -->
			<div class="global_sub slider_sub slider_gallery" style="display:none">
				<div class="uploader">
					<input type="hidden" name="_sliders_gallery" value="1"/>
					<a href="javascript:void(0)" class="button stag-metabox-table-gallery"/>Insert</a>
					<a href="javascript:void(0)" class="button clear-all-slides"/>Clear</a>
					<div class="sortable-wrapper">
						<ul class="sortable">
							<?php
							if( is_array($post_gallery) && count($post_gallery) > 0 ):
								foreach( $post_gallery as $single_image ):
							?>
								<li>
									<input type="hidden" value="<?php echo esc_attr($single_image['id']);?>" name="g_element_id[]" class="inline-element element_id">
									<input type="hidden" value="<?php echo esc_url($single_image['thumb_url']);?>" name="g_thumb_url[]" class="inline-element element_thumb">
									<input type="hidden" value="<?php echo esc_url($single_image['url']);?>" name="g_element_url[]" class="inline-element link_url">
									<input type="hidden" value="<?php echo esc_attr($single_image['title']);?>" name="g_element_title[]" class="inline-element image_title ">
									<input type="hidden" value="<?php echo esc_attr($single_image['alt']);?>" name="g_element_alt[]" class="inline-element image_alt">
									
									<p class="image-wrappper">
										<img  class="preview-img" src="<?php echo esc_url($single_image['thumb_url']);?>" alt="<?php echo esc_attr($single_image['alt']);?>" title="<?php echo esc_attr($single_image['title']);?>" width="120" height="120">
										<a href="javascript:void(0)" class="preview-img-remove">Del</a>
									</p>
								</li>						
							<?php	
								endforeach;		
							endif;	
							?>

						</ul> 
					</div>
				</div>
			</div>
			<div class="global_sub slider_sub slider_gallery" style="display:none">
				<p>
					<label><?php esc_html_e('List Images Width','wdsoundbox');?> </label>
					<input type="text" name="gallery_width" id="gallery_width" value="<?php echo strlen($post_gallery_config['gallery_width'])? $post_gallery_config['gallery_width']: ''; ?>" />
					<span class="description"><?php esc_html_e('Example: 2_3,1_3,1_3,1_3. Two-thirds width of content for first image, One-third width of content for second image. Similar, One-third for third and fourth image. Width of images are separated by "," comma', 'wdsoundbox'); ?></span>
				</p>
			</div>	
		</div>	
		<div class="area-inner-1">
			<h3 class="area-title"><?php esc_html_e('Custom Layout','wdsoundbox'); ?></h3>
			<div class="area-content">
				<div class="wd-single-post-layout">
					<label><?php esc_html_e('Page Layout','wdsoundbox'); ?></label>	
					<div class="bg-input select-box ">
						<div class="bg-input-inner config-product">
							<select name="single_layout" id="_single_post_layout">
								<option value="0" 		<?php if( strcmp($_post_config["layout"],'0') == 0 ) echo "selected='selected'";?>>		<?php esc_html_e('Default','wdsoundbox'); ?>			</option>
								<option value="0-0-0" 	<?php if( strcmp($_post_config["layout"],'0-0-0') == 0 ) echo "selected='selected'";?>>	<?php esc_html_e('Fullwidth','wdsoundbox'); ?>		</option>
								<option value="0-0-1" 	<?php if( strcmp($_post_config["layout"],'0-0-1') == 0 ) echo "selected='selected'";?>>	<?php esc_html_e('Right Sidebar','wdsoundbox'); ?>	</option>
								<option value="1-0-0" 	<?php if( strcmp($_post_config["layout"],'1-0-0') == 0 ) echo "selected='selected'";?>>	<?php esc_html_e('Left Sidebar','wdsoundbox'); ?>	</option>
								<option value="1-0-1" 	<?php if( strcmp($_post_config["layout"],'1-0-1') == 0 ) echo "selected='selected'";?>>	<?php esc_html_e('Left & Right Sidebar','wdsoundbox'); ?></option>
							</select>
						</div>
					</div>
				</div>
			</div><!-- .area-content -->
		</div>	
		<div class="clear"></div>
	</div>
	<input type="hidden" name="custom_post_layout" class="change-layout" value="custom_single_post_layout"/>	
</div><!-- .select-layout -->