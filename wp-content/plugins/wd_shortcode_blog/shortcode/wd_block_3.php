<?php 
	add_shortcode( "tvlg_block_3","tvlgiao_wpdance_block_3");
	function tvlgiao_wpdance_block_3($atts){
		extract(shortcode_atts( array(
			'posts_per_page' => '8',
			'columns'		 => 1,
			'show_pages'  	 => 1,
			'category'		 => ''
			), $atts));
			if($category){
				 $term  = get_category_by_slug($category);				
				 $published_posts =  $term->count;
			}
			else{			 
				  $count_posts = wp_count_posts();
				 $published_posts = $count_posts->publish;
			}
		   ob_start();
		   $_sub_class = "col-sm-".(24/$columns);
			?>
		<div ng-controller="Main_block_3 as tCtrl1">
			<div ng-init="init(<?php echo $posts_per_page;?>,<?php echo $published_posts ?>,<?php echo $show_pages?>,'<?php echo (string)$category ?>')">
			  <!-- display all post titles in a list -->
			 <div class="content_blog row">		
				<div ng-repeat="post in data.post1">
				  <div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog wd_item_blog_full_list">
					<div class="item_header col-sm-10">
						<div class="tvlg-module-thumb" ng-show="!post.gallery">
						  <a class="wd-effect-blog" href="{{post.link}}">							
								<img  ng-src="{{post.featured_image_thumbnail_url}}" alt="{{post.title.rendered}}" ng-show="post.featured_image_thumbnail_url"/>
								<img  ng-src="{{link_defaut}}" alt="defaut" ng-show="!post.featured_image_thumbnail_url"/>
								<div class="effect_hover_image"><span class="r1">&nbsp;</span><span class="r2">&nbsp;</span><span class="r3">&nbsp;</span><span class="r4">&nbsp;</span></div>
						  </a>
						</div>
						<div class="links" ng-show="post.type == 'video'" >
							<a class="openpop" ng-click="ShowPopup(post.link_url)">Link 1</a>
						</div>
						<div class="images blog-image-slider loading" ng-show="post.gallery">
							 <div ng-repeat="gallery_ids in post.gallery" ng-repeat-owl-carousel carousel-init="tCtrl1.carouselInitializer">
								<div class="image">
									<a class="thumb-image" ng-href="{{post.link}}">
										<img  ng-src="{{gallery_ids}}" alt="defaut"/>
									</a>
								</div>
							 </div>									
						</div>
						<div class="tvlwpdance-cat-links">
							<div ng-repeat="n in post.name_category">
								<a href="<?php echo esc_url( home_url( '/' ) ) ?>category/{{n}}" ng-bind-html="n"></a>
							</div>
						</div>	
			        </div>
					<div class="item_content col-sm-14">
						<div class="content_title"><a href="{{post.link}}">{{post.title.rendered}}</a></div>
						<div class="tvlg-excerpt" ng-bind-html="post.excerpt.rendered"></div>	
						<div class="tvlg-module-meta-info">										
					  		 <span class="tvlg-post-author-name" ng-bind-html="post.post_author"></span>
							 <span class="tvlg-post-date" ng-bind-html="post.post_date "></span>
							 <div class="tvlg-module-comments">Comments({{post.count_conmment}})</div>
					    </div>
					</div>	
				  </div>	
				</div>
			 </div>
              <div class='paginate' paginate-pages='{{pages}}' limit-pages='{{pageTitle}}'current-page='current' ng-show="showpages"></div>		  			 			  
		</div>
	</div>
		<?php
		$content=ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
		return $content;
	}
	function get_value($s)
	{
		echo strip_tags($s);
	}
?>