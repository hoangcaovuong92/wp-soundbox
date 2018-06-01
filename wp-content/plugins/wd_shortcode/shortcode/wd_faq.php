<?php
/**
 * Shortcode: tvlgiao_wpdance_faq
 */

if (!function_exists('tvlgiao_wpdance_faq_function')) {
    function tvlgiao_wpdance_faq_function($atts, $content) {
        extract(shortcode_atts(array(
            'question'     => '',
            'style'	       => 'default',
            
        ),$atts));
        ob_start();
        echo '<div class="wd_shortcode_faq'.' '.esc_attr($style).'">';
        echo '<div class="wd_shortcode_faq__question">';
        echo '<p class="wd_shortcode_faq__question__content">'.esc_html($question).'</p>';
        echo '<a href="javascript:void(0)" class="faq_toggle">'.esc_html__('X','wp_dance').'</a>';
        echo '</div>';
        echo '<div class="wd_shortcode_faq__answer" style="display:none">'.wp_kses_post($content).'</div>';
        echo '</div>';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;  
    }
}
add_shortcode('tvlgiao_wpdance_faq', 'tvlgiao_wpdance_faq_function');
?>