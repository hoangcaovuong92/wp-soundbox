<?php
if(!function_exists('soundbax_metabox_gallery')){
	function soundbax_metabox_gallery($id='',$value=''){
		# html metabox 
		$out_new = '<div class="container_metax">';
		$out_new .= '<ul class="container_gallery">';
		$out_new .= '<li>';
		$out_new .= '<div style ="width:60%;float:left;" class="form-field">';
		$out_new .= '<input value="'.$value.'" class="item_metabox" type="text"  id="'.$id.'" name="'.$id.'" >';
		$out_new .= '</div>';
		$out_new .= '<div style="clear:both;"></div>';
		$out_new .= '<div style="margin:10px 0;">';
		/*$out_new .= '<a style="margin:0 5px 0 0;" href="javascript:void(0)" rel="'.$id.'" class="button add_gallery">'.esc_html__('Add','wdsoundbox').'</a>';*/
		$out_new .= '</div>';
		$out_new .= '</li>';
		$out_new .= '</ul>';
		$out_new .= '</div>';
		echo wp_kses_post($out_new);
	}
}