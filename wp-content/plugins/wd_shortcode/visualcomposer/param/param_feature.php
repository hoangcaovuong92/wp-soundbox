<?php vc_add_shortcode_param('param_feature', 'wd_shortcode_feature',plugins_url( 'js/add_feature.js', __FILE__ ));
function wd_shortcode_feature( $settings, $value ) {
	$feature_options = array();
	$args = array(
		'post_type'			=> 'feature'
		,'post_status'		=> 'publish'
		,'posts_per_page' 	=> -1
		);
	$feature_options = tvlgiao_wpdance_query_data($args);
	if(is_array($value)){
		$value = implode(',',$value);
	}
    #create option in param
    $style .= '<select multiple="multiple"  name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput wd_post_feature'.' '.
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="text" data-value="'.esc_attr($value).'">';
	foreach ($feature_options as $key => $value) {
		$style .= '<option value="'.esc_attr($value).'">'.esc_html($key).'</option>';
	}
	$style .='</select>';

   return $style; // This is html markup that will be outputted in content elements edit form
}