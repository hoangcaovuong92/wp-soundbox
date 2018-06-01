<?php
function wd_portfolio_get_filetype($itemSrc) {
		if(preg_match('/youtube\.com\/watch/i', $itemSrc) || preg_match('/youtu\.be/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/vimeo\.com/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.mov\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.swf\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.avi\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.mpg\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.mpeg\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.mp4\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else if(preg_match('/\b.mp3\b/i', $itemSrc)) {
			return 'wd-pretty-video';
		} else{
			return 'wd-pretty-image';
		}
}