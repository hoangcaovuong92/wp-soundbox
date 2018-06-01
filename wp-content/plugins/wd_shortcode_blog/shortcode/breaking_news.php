<?php 
	add_shortcode( "wd_breaking_news","tvlgiao_wpdance_breaking_news");
	function tvlgiao_wpdance_breaking_news($atts){
		 $args = array(
            "title"         => "Breaking New",
			'category'		=>	'',
            "posts_per_page"        => 5
        );	        
		extract(shortcode_atts($args, $atts));
		wp_reset_query();
		$args = array(
				'post_type' 			=> 'post'
				,'posts_per_page' 			=> $posts_per_page
		);	
		if( strlen($category) > 0 ){
			$args = array(
				'post_type' 			=> 'post'
				,'ignore_sticky_posts' 	=> 1
				,'posts_per_page' 			=> $posts_per_page
				,'category_name' 		=> $category
			);	
		}
		ob_start();
		$d = new WP_Query($args);
		 if ($d) {
		 echo "<div class='breaking_news'>";
		 echo "<h3>{$title}</h3>";
		 echo '<ul class="js-hidden" id="jsnews">';
		 while ($d->have_posts()): $d->the_post();
		 echo '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
		 endwhile;
		 echo '</ul>';
		 echo '</div>';
		 }
		wp_reset_postdata(); 	
		wp_reset_query();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
?>