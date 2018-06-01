<?php 
/*check plugin easy digital downloads active  */
if(wdsoundbax_checkplugin_download()){
	add_action('edd_download_after_thumbnail','wdsoundbax_download_after_thumbnail',20);

	/*add buttom after thumbnail*/
	function wdsoundbax_download_after_thumbnail(){
		global $post;
		$_style = get_post_meta($post->ID,'_config_download_style',true );
		$_audio = get_post_meta($post->ID,'_config_download_audio',true );
		$_video = get_post_meta($post->ID,'_config_download_video',true );
		$_url   = get_the_permalink($post->ID);
		$random_id 		= 'wd-audio-id-'.rand(0,1000);
		if($_style == 'audio'&&$_audio != ''){
		?>
		<div class='download_container_audio'>
			<a href='javascript:void(0)' class='download_icon_audio' data-audio_id="<?php echo $random_id; ?>"><?php esc_html_e('play audio','wdsoundbox'); ?></a>
			<audio id="<?php echo $random_id; ?>" class="download_sound_audio" controls style='display: none;'>
	    		<source src="<?php echo esc_attr($_audio); ?>" type="audio/mpeg" preload="auto" />
   		 		<source src="<?php echo esc_attr($_audio); ?>" type="audio/ogg" preload="auto" />
			</audio>
		</div>
		<?php
		}elseif($_style =='video'&&$_video != '' ){
			?>
			<div class='download_container_video'>
			<a href='javascript:void(0)' class='download_icon_video'><?php esc_html_e('play video','wdsoundbox'); ?></a>
			<div class='container_product_video' style='display: none'>
			<div class='product_video'><?php echo wd_get_embbed_video($_video); ?><a href='javascript:void(0)' class='close_video'>x</a></div>
			
			</div>
		</div>
		<?php
		}else{
			echo "<a href='".$_url."' class='download_icon_image'>image</a>";
		}
	}
	//add comment post tyle download
	function modify_edd_product_supports($supports) {
	$supports[] = 'comments';
	return $supports;	
	}
	add_filter('edd_download_supports', 'modify_edd_product_supports');
}