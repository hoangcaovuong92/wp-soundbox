<?php
add_shortcode("wd_recent_blogs", "tvlgiao_wpdance_recent_blogs");
function tvlgiao_wpdance_recent_blogs($atts)
{
  extract(shortcode_atts(array(
    "ignore_sticky_posts" => "top",
    'style'               => 'horizontal',
    'per_page'            => -1,
    'orderby'               => 'date',
    'order'             => 'ASC',
    'excerpt_words'       => 10,
    'show_home'           => 'yes',
    'show_thumbnail'      => 'yes',
    'show_comment'       =>  'yes',
    'show_title'          => 'yes',
    'show_author'         => 'yes',
    'show_date'          =>  'yes',
    'show_excerpt'        => 'yes',
    'show_excerpt_special'        => 'yes',
    'show_style'          => 'all',
    'slug'                => '',
    'category'            => '',
    'cat_childern'        => 'false',
  ), $atts));

  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => $per_page,
    'order'          => $order,
    'orderby'        => $orderby,
  );

  if($show_style == 'category'){
    $args['tax_query'] = array(
                          array(
                            'taxonomy'=>'category',
                            'field'   => 'id',
                            'terms'   => $category,
                            'include_children ' => $cat_childern,
                            ),
                          );
  }
  if($show_style == 'single'){
    $args['name'] = $slug;
  }
  if ($ignore_sticky_posts === "normal") {
    $args['ignore_sticky_posts'] = 1;
  } elseif ($ignore_sticky_posts === "hide") {
    $args['post__not_in'] = get_option('sticky_posts');
  }
  $blogs = new WP_Query($args);
  ob_start();
  if ($blogs->have_posts()): 
    $i =1;
    $output = "<div class='recent_blogs_horizontal_container".' '.$style."'><ul>";
    while ($blogs->have_posts()): $blogs->the_post();
    $comments_count = wp_count_comments(get_the_id()); 
    $number_comment = ($comments_count->approved < 10 && $comments_count->approved >0 )?'0':$comments_count->approved;
    if(strcmp('horizontal',$style)==0){
      $output .= "<li class='rb_item'>";
      if($show_thumbnail == 'yes'):
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full');
      if ( !empty($image_url[0]) ) {
          $output .= "<a href='".get_the_permalink()."'>";
          $output .= '<img alt="'.get_the_title( ).'" src="'.$image_url[0].'" />'; 
          $output .= "</a>";
      }
      endif;//endif thumbnail
      if($show_title == 'yes'):
      $output .="<div class='rb_title'><h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3></div>";
      endif;//endif title
      if($show_excerpt == 'yes'):
      $output .= "<div class='rb_excerpt'>".wpdance_get_excerpt(get_the_excerpt( ),$excerpt_words)."</div>";
      endif;  // end if excerpt
      if($show_author == 'yes'):
     $output .="<div class='rb_infor'><span class='rb_author'>".get_the_author()."</span><span class='rb_count_comment'>".$number_comment."</span></div>";
      endif;//end if author

      if($show_date == 'yes'):
      $output .= "<div class='rb_row_left'><span class='rb_month'>".get_the_date('M')."</span><span class='rb_day'>".get_the_date('d')."</span><span class='rb_month'>".get_the_date('Y')."</span></div>";// end div rb_row_left
      endif; // end if date
      $output .= "</li>"; //end li rb_item
    }elseif(strcmp('special',$style)==0){

      $output .= "<li class='rb_item'><div class='special_container_blog'>";

      if($show_thumbnail == 'yes'):
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()),'full');
      if ( !empty($image_url[0]) ) {
          $output .= "<a href='".get_the_permalink()."'>";
          $output .= '<img alt="'.get_the_title( ).'" src="'.$image_url[0].'" />'; 
          $output .= "</a>";
      }
      endif;//endif thumbnail
      $output .= "<div class='special_container_blog__item'>";
      if($show_title == 'yes'):
      $output .="<div class='rb_title'><h3><a href='".get_the_permalink()."'>".get_the_title()."</a></h3></div>";
      endif;//endif title
      if($i==1){
        if($show_excerpt_special == 'yes'):
        $output .= "<div class='rb_excerpt'>".wpdance_get_excerpt(get_the_excerpt( ),$excerpt_words)."</div>";
       endif;  // end if excerpt

      }else{
         if($show_excerpt == 'yes'):
          $output .= "<div class='rb_excerpt'>".wpdance_get_excerpt(get_the_excerpt( ),$excerpt_words)."</div>";
        endif;  // end if excerpt
      }
      $output .='<div class="rb_row_left">';
     
      $output .="</div>";//end classrb_row_left
      $output .= "</div>";//end div class special_container_blog__item
      $output .= "</div></li>"; //end li rb_item
    }// end if strcmp style horizontal
    $i++;
    endwhile;
    $output .= '</ul></div>';//end if recent_blogs_horizontal_container
  endif; // end if have_post
  echo $output;

  wp_reset_postdata();
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}