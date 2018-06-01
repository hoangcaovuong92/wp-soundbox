<?php 
function wd_simple_recent_blogs_functions($atts,$content = false){
	extract(shortcode_atts(array(
		'slug_simple'		=>	'0',
		'show_image'		=> 1,
		'style'				=> 'style1'
	),$atts));
	 ob_start();
	?>
	<div ng-controller="SimpleBlog">
		<div ng-init="init(<?php echo $slug_simple;?>)">
			 <div class="content_blog">						
				  <div class="wd_item_blog_simple">
						<div class="item_header">
							<div class="tvlg-module-thumb">
							  <a class="wd-effect-blog" href="{{data.simple.link}}">							
									<img  ng-src="{{data.simple.featured_image_thumbnail_url}}" alt="{{data.simple.title.rendered}}" ng-show="data.simple.featured_image_thumbnail_url"/>
									<img  ng-src="{{link_defaut}}" alt="defaut" ng-show="!data.simple.featured_image_thumbnail_url"/>
							  </a>
							</div>
							<div class="links" ng-show="data.simple.type == 'video'" >
								<a class="openpop" ng-click="ShowPopup(data.simple.link_url)">Link 1</a>
							</div>		
						</div>					
					<div class="item_content">							
						<div class="tvlwpdance-cat-links">
							<div ng-repeat="n in data.simple.name_category">
								<a href="<?php echo esc_url( home_url( '/' ) ) ?>category/{{n}}" ng-bind-html="n"></a>
							</div>
						</div>			
						<div class="content_title"><a href="{{data.simple.link}}">{{data.simple.title.rendered}}</a></div>						
						<div class="tvlg-excerpt" ng-bind-html="data.simple.excerpt.rendered "></div>	
						<div class="tvlg-module-meta-info">										
					  		 <span class="tvlg-post-author-name" ng-bind-html="data.simple.post_author"></span>
							 <span class="tvlg-post-date" ng-bind-html="data.simple.post_date "></span>							 
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
add_shortcode('wd_recent_simple_blogs','wd_simple_recent_blogs_functions');
?>