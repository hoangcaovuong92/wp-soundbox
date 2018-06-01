<?php
if(!function_exists('wdsoundbax_checkplugin_download')){
		function wdsoundbax_checkplugin_download(){
			$_active_vc = apply_filters('active_plugins',get_option('active_plugins'));
			if(in_array('easy-digital-downloads/easy-digital-downloads.php',$_active_vc)){
				return true;
			}else{
				return false;
			}
		}
}
