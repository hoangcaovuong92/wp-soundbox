<?php vc_add_shortcode_param('param_feature_category','wd_shortcode_category_feature',plugins_url( 'js/add_category_feature.js', __FILE__ ));
function wd_shortcode_category_feature( $settings, $value) {
	$feature_options = array();
	
	$feature_options =  get_terms(array(
    'taxonomy' => 'feature-category',
    'fields'=>'id=>name',
    'hide_empty' => false,
	) );

	if(is_array($value)){
		$value = implode(',',$value);
	}
    #create option in param
    $style .= '<select multiple="multiple"  name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value
     wd_post_feature_category'.' '.
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="text" data-value="'.esc_attr($value).'">';
	foreach ($feature_options as $key => $value) {

		$style .= '<option value="'.esc_attr($key).'">'.esc_html($value).'</option>';
	}
	$style .='</select>';

   return $style; // This is html markup that will be outputted in content elements edit form
}