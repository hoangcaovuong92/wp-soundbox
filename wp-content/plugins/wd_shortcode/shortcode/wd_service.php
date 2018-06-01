<?php
if (!function_exists('ew_img_video')) {
    function ew_img_video($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'id_thumb'         => '',
            'size'             => 'thumbnail',
            'position_content' => 'content_image_center',
            'custom_size'      => '',
            'height'           => '',
            'width'            => '',
            'alt_image'        => 'image',
            'style_image'      => 'image_style_default',
        ), $atts));

        /*if($size === 'custom_size'){
        $arg = explode('-', $custom_size);
        }*/
        if($size == 'custom'){
            $arg = array($width,$height);
            if (wp_get_attachment_url($id_thumb)):
            $src_thumb = wp_get_attachment_url($id_thumb);
            $result    = "<div class='{$style_image} wd_image' >";
            $result .= "<img   src='{$src_thumb}' alt='{$alt_image}' style='width:{$width}px;height:{$height}px'/>";
            $result .= "<div class='{$position_content}'>" . wp_kses_post($content) . "</div>";
            $result .= "</div>";
            else:
            $result = '<div style="text-align: justify; font-weight: bold; font-size: 14px; color: red;">' . esc_html__(' No find image . please add image in element setting !', 'wdfuniture') . '</div>';
            endif;
        }else{
              if (wp_get_attachment_image_src($id_thumb, $size)):
            $src_thumb = wp_get_attachment_image_src($id_thumb, $size);
            $result    = "<div class='{$style_image} wd_image' >";
            $result .= "<img width='{$src_thumb[1]}' height='{$src_thumb[2]}' src='{$src_thumb[0]}' alt='{$alt_image}'/>";
            $result .= "<div class='{$position_content}'>" . wp_kses_post($content) . "</div>";
            $result .= "</div>";
            else:
            $result = '<div style="text-align: justify; font-weight: bold; font-size: 14px; color: red;">' . esc_html__(' No find image . please add image in element setting !', 'wdfuniture') . '</div>';
            endif;
        }
      
        return $result;
    }
}
add_shortcode('wd_image', 'ew_img_video');
