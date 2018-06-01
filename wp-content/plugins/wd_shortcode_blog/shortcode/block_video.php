<?php 
	add_shortcode( "wd_getvideoblock","tvlgiao_wpdance_videoblock");
	function tvlgiao_wpdance_videoblock($atts){
		extract(shortcode_atts( array(
			'style' => 'style1',
			"ignore_sticky_posts" => "top",
			"orderby" => "ID",
			"order" => "ASC",
			'title' => '',
			'columns' => '1',
			'per_page' => '5',
			), $atts));
			
		wp_reset_query();
		$args = array(
			'post_type' 	=> 'post',
			'meta_key'		=> 'blog_tyle',
			'meta_value'	=> 'Video',
			'posts_per_page' 		=> $per_page,
			);	
		$blogs = new WP_Query($args);	
		ob_start();

		$_sub_class = "col-sm-".(24/$columns);
		if($blogs->have_posts()):	$i = 0;?>
			<div class="content_blog_video">	
					<?php if(strlen(trim($title)) > 0) :
					echo "<div class='heading-title-blog-video'><h2 class='widget-title'>{$title}</h2></div>";
					endif;
					?>
					<div class="content_blogs <?php echo esc_attr($style); ?>">
					<div class="row">
						<?php
						while ($blogs->have_posts()):?>
								<?php $blogs->the_post(); 
								 $video_url = trim(get_field('link_url'));
								 load_block_video($style,$i,$video_url,$per_page);?>					
						<?php $i++; endwhile; ?>
					</div>
					</div>
		</div>
		<?php
		endif;
		wp_reset_postdata(); 	
		wp_reset_query();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	function load_block_video($style,$i,$video_url,$posts_per_page)
	{
		switch($style){
			case 'style1' : block_1($i,$video_url,$posts_per_page);break;
			case 'style2' : case 'style3' : block_2($i,$video_url,$posts_per_page);break;
			case 'style4' :block_4($i,$video_url,$posts_per_page);break;
		}
	}
	function block_2($i,$video_url,$posts_per_page)
	{
		if($i==0)
			{
		echo '<div class="col-sm-14 item_big_blog">';
				echo '<div class="wd_item_blog wd_item_blog_big">';
				   echo "<div class='item_blog_video'>";
					$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
					the_post_thumbnail(array( 870,524)); ?>
						<div class="links">
							<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
						</div>
					</div>
					<div class="item_content">						
						<div class="content_title">
							<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
						</div>	
						<div class="author">
							<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
						</div>
						<div class="entry-date">
							<span class="entry-date"><?php echo get_the_date(); ?></span>									
						</div>					
					</div>
				  </div>
			  </div>
		<?php	}
			else
			{
					echo '<div class="col-sm-5">';
					echo '<div class="wd_item_blog">';
				    echo "<div class='item_blog_video'>";
					$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
					the_post_thumbnail(array( 870,524)); ?>
						<div class="links">
							<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
						</div>
					</div>
					<div class="item_content">						
						<div class="content_title">
							<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
						</div>	
						<div class="author">
							<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
						</div>
						<div class="entry-date">
							<span class="entry-date"><?php echo get_the_date(); ?></span>									
						</div>					
					 </div>
				   </div>
				  </div>
	<?php }
	}
	function block_4($i,$video_url,$posts_per_page)
	{
		if($i==0)
			{
				echo '<div class="col-sm-24 item_top_big_blog">';
						echo '<div class="wd_item_blog wd_item_blog_big">';
						   echo "<div class='item_blog_video'>";
							$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
							the_post_thumbnail(array( 1170,672)); ?>
								<div class="links">
									<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
								</div>
							</div>
							<div class="item_content">						
								<div class="content_title">
									<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
								</div>	
								<div class="author">
									<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
								</div>
								<div class="entry-date">
									<span class="entry-date"><?php echo get_the_date(); ?></span>									
								</div>					
							</div>
						  </div>
					  </div>
<?php  	}
		else{
			echo '<div class="wd-col-lg-5">';
						echo '<div class="wd_item_blog">';
						   echo "<div class='item_blog_video'>";
							$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
							the_post_thumbnail(array( 870,524)); ?>
								<div class="links">
									<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
								</div>
							</div>
							<div class="item_content">						
								<div class="content_title">
									<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
								</div>	
								<div class="author">
									<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
								</div>
								<div class="entry-date">
									<span class="entry-date"><?php echo get_the_date(); ?></span>									
								</div>					
							</div>
						  </div>
					  </div>
	<?php }
	}
	function block_1($i,$video_url,$posts_per_page)
	{
	  if($i<=1):
		if($i==0)
			{
				echo '<div class="col-sm-5">';
			}
						echo '<div class="wd_item_blog">';
						   echo "<div class='item_blog_video'>";
							$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
							the_post_thumbnail(array( 870,524)); ?>
								<div class="links">
									<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
								</div>
							</div>
							<div class="item_content">						
								<div class="content_title">
									<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
								</div>	
								<div class="author">
									<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
								</div>
								<div class="entry-date">
									<span class="entry-date"><?php echo get_the_date(); ?></span>									
								</div>					
							</div>
						  </div>
	<?php endif; ?>
	<?php if($i==1)	echo '</div>'; 
		  if($i==2){
			  echo '<div class="col-sm-14 item_big_blog">';
			  echo '<div class="wd_item_blog wd_item_blog_big">';
				   echo "<div class='item_blog_video'>";
					$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
					the_post_thumbnail(array( 870,524)); ?>
						<div class="links">
							<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
						</div>
					</div>
					<div class="item_content">						
						<div class="content_title">
							<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
						</div>	
						<div class="author">
							<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
						</div>
						<div class="entry-date">
							<span class="entry-date"><?php echo get_the_date(); ?></span>									
						</div>					
					</div>
				  </div>
				</div>
		<?php  }
			if($i>=3){
				if($i==3)
					{
						echo '<div class="col-sm-5">';
					}
					echo '<div class="wd_item_blog">';
					   echo "<div class='item_blog_video'>";
						$source = tvlgiao_wpdance_get_embbed_video($video_url,1200,360);
						the_post_thumbnail(array( 870,524)); ?>
							<div class="links">
								<a class="openpop" href="<?php echo $source; ?>">Link 1</a>
							</div>
						</div>
						<div class="item_content">						
							<div class="content_title">
								<h3 class="h4"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
							</div>	
							<div class="author">
								<?php _e('By ','wpdance')?><?php the_author_posts_link(); ?>
							</div>
							<div class="entry-date">
								<span class="entry-date"><?php echo get_the_date(); ?></span>									
							</div>					
						</div>
					  </div>
				<?php if($i==4)	echo '</div>'; 
			}
	}
?>