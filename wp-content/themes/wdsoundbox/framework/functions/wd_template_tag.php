<?php
	if(!function_exists ('soundbax_wd_get_embbed_daily')){
		function soundbax_wd_get_embbed_daily($video_url,$width = 940,$height = 558){
			$url_embbed = "http://www.dailymotion.com/swf/".soundbax_wd_parse_daily_link($video_url);
			return '<object width="'.$width.'" height="'.$height.'">
						<param name="movie" value="'.$url_embbed.'"></param>
						<param name="allowFullScreen" value="true"></param>
						<param name="allowScriptAccess" value="always"></param>
						<embed type="application/x-shockwave-flash" src="'.$url_embbed.'" width="'.$width.'" height="'.$height.'" allowfullscreen="true" allowscriptaccess="always"></embed>
					</object>';
		}
	}
	if(!function_exists ('soundbax_wd_get_embbed_vimeo')){
		function soundbax_wd_get_embbed_vimeo($video_url,$width,$height){
			return '//player.vimeo.com/video/'.soundbax_wd_parse_vimeo_link($video_url);
		}
	}
	if(!function_exists ('soundbax_wd_parse_vimeo_link')){
		function soundbax_wd_parse_vimeo_link($video_url){
			if (preg_match('~^https://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $match)) {
				return $match[1];
			}
			else{
				return substr($video_url,10,strlen($video_url));
			}
		}
	}
	if(!function_exists ('soundbax_get_embbed_video')){
		function soundbax_get_embbed_video($video_url,$width = 940,$height = 558){
			if(strstr($video_url,'youtube.com') || strstr($video_url,'youtu.be')){
				return "http://www.youtube.com/embed/".soundbax_wd_parse_youtube_link($video_url)."";
							
			}
			elseif(strstr($video_url,'vimeo.com')){
				return soundbax_wd_get_embbed_vimeo($video_url,$width,$height);
			}
			elseif(strstr($video_url,'dailymotion.com')){
				return soundbax_wd_get_embbed_daily($video_url,$width,$height);
			}	
		}
	}
?>