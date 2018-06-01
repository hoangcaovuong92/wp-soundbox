<?php 
	add_shortcode( "tvlg_block_2","tvlgiao_wpdance_block_2");
	function tvlgiao_wpdance_block_2($atts){
		extract(shortcode_atts( array(			
			'posts_per_page' => '5'
			,'short_limit'   => '8'
			), $atts));
		$i=0;
		ob_start();
		$home = esc_url( home_url( '/' ) );
		$response = wp_remote_get($home.'/wp-json/wp/v2/posts/?filter[posts_per_page]='.$posts_per_page);
		if( is_wp_error( $response ) ) {
			return;
		}

		$posts = json_decode( wp_remote_retrieve_body( $response ) );
		//print_r($posts);
		if( empty( $posts ) ) {
			return;
		}
		if( !empty( $posts ) ) {
			$i = 0;
		foreach( $posts as $post ) {
			 $post_date = get_the_date( 'F j, Y',$post->id );
			 $recent_author = get_user_by( 'ID', $post->author );
			 $author_display_name = $recent_author->display_name;
			 $my_var = get_comments_number($post->id);
			if($i==0)
			{
			   echo '<div class="col-sm-12 grid_content_blogs_left">';?>
				   <div class="grid_content_blogs">
						<div class="item_header">
							<div class="tvlg-module-thumb">
							  <a class="wd-effect-blog" href="<?php echo $post->link; ?>">
								<?php if($post->featured_image_thumbnail_url):?>
								<img src="<?php echo $post->featured_image_thumbnail_url ?>" alt="<?php echo $post->title->rendered ?>" />
								<?php else: ?>
								<img src="<?php echo SC_IMAGE."/870x524.png" ?>" alt="defaut" />
								<?php endif; ?>
								<div class="effect_hover_image"><span class="r1">&nbsp;</span><span class="r2">&nbsp;</span><span class="r3">&nbsp;</span><span class="r4">&nbsp;</span></div>
							 </a>
							</div>
							<?php if($post->name_category) :?>
							<div class="tvlwpdance-cat-links">
							  <?php	foreach( $post->name_category as $cate ) {?>
							 <a href="category/<?php echo $cate?>"> <?php echo $cate;?></a>
							  <?php } ?>
							</div>
							<?php endif; ?>
						</div>
						<div class="item_content">
							<div class="content_title"><a href="<?php echo $post->link ?>"><?php echo $post->title->rendered ?> </a></div>
							<div class="tvlg-excerpt">
							  <?php echo  wp_trim_words( strip_tags($post->excerpt->rendered), $short_limit, $more = null );?>						 
							</div>
							<div class="tvlg-module-meta-info">										
								 <span class="tvlg-post-author-name"><?php  echo $author_display_name ?></span>
								 <span class="tvlg-post-date"><?php  echo $post_date ?> </span>
								 <div class="tvlg-module-comments"><?php  echo $my_var ?></div>
							</div>
						</div>
				   </div>
			   </div>
		<?php	}
			else
			{
				if( $i == 1 ){
								echo'<div class="col-sm-12 grid_content_blogs_right">';
							}?>
				 <div class="grid_content_blogs grid_content_blogs_list">
					<div class="item_header">
						<div class="tvlg-module-thumb">
						  <a href="<?php echo $post->link; ?>">
							<?php if($post->featured_image_thumbnail_url):?>
							<img src="<?php echo $post->featured_image_thumbnail_url ?>" alt="<?php echo $post->title->rendered ?>" />
							<?php else: ?>
							<img src="<?php echo SC_IMAGE."/870x524.png" ?>" alt="defaut" />
							<?php endif; ?>
						  </a>
						</div>
						<?php if($post->name_category) :?>
						<div class="tvlwpdance-cat-links">
						  <?php	foreach( $post->name_category as $cate ) {?>
						 <a href="category/<?php echo $cate?>"> <?php echo $cate;?></a>
						  <?php } ?>
						</div>
						<?php endif; ?>
					</div>	
					<div class="item_content">
						<div class="content_title"><a href="<?php echo $post->link ?>"><?php echo $post->title->rendered ?> </a></div>
						<div class="tvlg-excerpt">									
						   <?php echo  wp_trim_words( strip_tags($post->excerpt->rendered),$short_limit, $more = null );?>					 
						</div>
						<div class="tvlg-module-meta-info">										
							 <span class="tvlg-post-author-name"><?php  echo $author_display_name ?></span>
							 <span class="tvlg-post-date"><?php  echo $post_date ?> </span>
							 <div class="tvlg-module-comments"><?php  echo $my_var ?></div>
						</div>
					</div>
				   </div>
			<?php	if( $i == $posts_per_page -1)
				{
					echo '</div>';
					echo '<div class ="clear"></div>';										
				}						
			}
			$i++;
		}
	}
		$content=ob_get_contents();
		ob_end_clean();
		return $content;
}
?>