<?php 
	add_shortcode( "tvlg_slide_blog","tvlgiao_wpdance_slider");
	function tvlgiao_wpdance_slider($atts){
		extract(shortcode_atts( array(
			'posts_per_page' => '8',
			'columns'		 => 1,
			'short_limit'    => 8,
			'category'		 => ''
			), $atts));
			 $count_posts = wp_count_posts();
			 $published_posts = $count_posts->publish;
		   ob_start();
		   $_sub_class = "col-sm-".(24/$columns);
			?>
		<div ng-controller="block_slide as tCtrl2">
			<div ng-init="init(<?php echo $posts_per_page;?>,'<?php echo (string)$category ?>')">
			  <!-- display all post titles in a list -->
			 <div class="content_blog">
				<div class="images blog-slider loading">
					<div ng-repeat="post in data.categories">
						<div class="image" ng-repeat-owl-carousel carousel-init="tCtrl2.carouselInitializer">
									<a class="thumb-image" ng-href="{{post.link}}">
										<img  ng-src="{{post.featured_image_thumbnail_url}}" alt="defaut"/>
									</a>
						</div>
						<div class="content_title"><a href="{{post.link}}">{{post.title.rendered}}</a></div>		
						<div class="tvlg-module-meta-info">										
					  		 <span class="tvlg-post-author-name" ng-bind-html="post.post_author"></span>
							 <span class="tvlg-post-date" ng-bind-html="post.post_date "></span>							 
					    </div>
					  </div>	
			    </div> 
			</div>
		</div>
	</div>
		<?php
		$content=ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $content;
	}
?>