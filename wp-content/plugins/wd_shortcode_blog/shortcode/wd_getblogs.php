<?php 
	add_shortcode( "wd_getblogs","tvlgiao_wpdance_getblogs");
	function tvlgiao_wpdance_getblogs($atts){
		extract(shortcode_atts( array(
			'posts_per_page' => '5',
			'columns'		 => 2,
			'show_pages'	 => 1,
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
		<div ng-controller="Main as tCtrl">
			<div ng-init="init(<?php echo $posts_per_page;?>,<?php echo $published_posts ?>,<?php echo $show_pages?>,'<?php echo (string)$category ?>')">
			  <!-- display all post titles in a list -->
			<div class="content_blog row">		
				<div ng-repeat="post in data.posts">
				  <div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
					<div class="item_header">
						<div class="tvlg-module-thumb" ng-show="post.post_type == '0'">
						  <a class="wd-effect-blog" href="{{post.link}}">							
								<img  ng-src="{{post.featured_image_thumbnail_url}}" alt="{{post.title.rendered}}" ng-show="post.featured_image_thumbnail_url"/>
								<img  ng-src="{{link_defaut}}" alt="defaut" ng-show="!post.featured_image_thumbnail_url"/>
								<div class="effect_hover_image"><span class="r1">&nbsp;</span><span class="r2">&nbsp;</span><span class="r3">&nbsp;</span><span class="r4">&nbsp;</span></div>
						  </a>
						</div>
						<div class="links" ng-show="post.post_type == 'video'" >
							<img  ng-src="{{post.featured_image_thumbnail_url}}" alt="{{post.title.rendered}}" ng-show="post.featured_image_thumbnail_url"/>
							<img  ng-src="{{link_defaut}}" alt="defaut" ng-show="!post.featured_image_thumbnail_url"/>
							<a class="openpop" ng-click="ShowPopup(post.link_url)"><?php esc_html_e('Play Video','wpdance') ?></a>
						</div>
						<div class="images {{string_rd}} loading" ng-show="post.post_type == 'slide'">
							 <div ng-repeat="slide in post.slider_image" ng-repeat-owl-carousel carousel-init="tCtrl.carouselInitializer">
								<div class="image">
									<a class="thumb-image" ng-href="{{post.link}}">
										<img  ng-src="{{slide.image_url}}" alt="defaut"/>
									</a>
								</div>
							 </div>									
						</div>
						<div  ng-show="post.post_type == 'gallery'">
							<a class="wd-effect-blog" href="{{post.link}}">							
								<img  ng-src="{{post.featured_image_thumbnail_url}}" alt="{{post.title.rendered}}" ng-show="post.featured_image_thumbnail_url"/>
								<img  ng-src="{{link_defaut}}" alt="defaut" ng-show="!post.featured_image_thumbnail_url"/>
								<div class="effect_hover_image"><span class="r1">&nbsp;</span><span class="r2">&nbsp;</span><span class="r3">&nbsp;</span><span class="r4">&nbsp;</span></div>
							</a>
 							<!--<div id="gallery_post_id" class="post_mansory" data-min="{{post.min_width}}">	
								<div ng-repeat="gallery in post.gallery_image" class="gallery_item" data-width="{{gallery.percent}}">
									<a class="thumbnail" data-rel="prettyPhoto[product-gallery]">
										<img  ng-src="{{gallery.image_url}}" alt="defaut"/>	
									</a>
								</div>	
							</div> -->
						</div>
						<div class="wd_audio" ng-show="post.post_type == 'audio'" >
							<div ng-bind-html="bindiframeAudio(post.audio_soundcloud)"></div>
						</div>
						<div class="tvlwpdance-cat-links">
							<div ng-repeat="n in post.name_category">
								<a href="<?php echo esc_url( home_url( '/' ) ) ?>category/{{n}}" ng-bind-html="n"></a>
							</div>
						</div>	
			        </div>
					<div class="item_content">
						<div class="content_title"><a href="{{post.link}}">{{post.title.rendered}}</a></div>
						<div class="tvlg-excerpt" ng-bind-html="post.excerpt.rendered "></div>	
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
?>