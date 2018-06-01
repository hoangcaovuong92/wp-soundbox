<?php
	global $post;
	$post_id 			= $post->ID;
	$_style = get_post_meta($post->ID,'_config_download_style',true );
	$_audio = get_post_meta($post->ID,'_config_download_audio',true );
	$_video = get_post_meta($post->ID,'_config_download_video',true );
	?>
	<div id="meta_download">
		<div class="wd_config_field">
			<h3><?php echo esc_html__('STYLE:','wdsoundbox' ); ?></h3>
			<select name='style_download' id="style_download">
				<option value='default' <?php if($_style == 'default'){echo 'selected';} ?> ><?php echo esc_html__('Default','wdsoundbox'); ?></option>
				<option value='video' <?php if($_style == 'video'){echo 'selected';} ?>><?php echo esc_html__('Video','wdsoundbox'); ?></option>
				<option value='audio' <?php if($_style == 'audio'){echo 'selected';} ?>><?php echo esc_html__('Audio','wdsoundbox'); ?></option>
			</select>
		</div>
		<div class="wd_config_field" id="audio">
			<h3><?php echo esc_html__('AUDIO URL (DEMO/SAMPLE FILE):','wdsoundbox' ); ?></h3>
			<span><?php echo esc_html__('Support: .ogg,  .mp3 ','wdsoundbox' ); ?></span>
			<div class="container_metax">
			<div style ="width:60%;float:left;" class="form-field">
			<input value="<?php echo $_audio; ?>" class="item_metabox" type="text"  id="audio" name="audio" >
			</div>	
			<div style="clear:both;"></div>

			</div>
		</div>
	<div class="wd_config_field" id="video">
			<h3><?php echo esc_html__('VIDEO URL (DEMO/SAMPLE FILE):','wdsoundbox' ); ?></h3>
			<span><?php echo esc_html__('Support: youtube, vimeo, dailymotion, .mp4, .WebM, .Ogg','wdsoundbox' ); ?></span>
			<div class="container_metax">
				<div style ="width:60%;float:left;" class="form-field">
			<input value="<?php echo $_video; ?>" class="item_metabox" type="text"  id="video" name="video" >
			</div>
			<div style="clear:both;"></div>
			</div>
		</div>
	</div>