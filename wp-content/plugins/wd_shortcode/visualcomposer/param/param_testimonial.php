<?php vc_add_shortcode_param('param_testimonial', 'wd_shortcode_testimonial',plugins_url( 'js/add_testimonial.js', __FILE__ ));
function wd_shortcode_testimonial( $settings, $value ) {
	$testimonial_options = array();
	$args = array(
		'post_type'			=> 'testimonial'
		);
	$testimonial_options = tvlgiao_wpdance_query_data($args);
	if(is_array($value)){
		$value = implode(',',$value);
	}
    #create option in param
    $style .= '<select multiple="multiple"  name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput wd_post_ftestimonial'.' '.
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="text" data-value="'.esc_attr($value).'">';
	foreach ($testimonial_options as $key => $value) {
		$style .= '<option value="'.esc_attr($key).'">'.esc_html($value.'('.$key.')').'</option>';
	}
	$style .='</select>';

   return $style; // This is html markup that will be outputted in content elements edit form
}