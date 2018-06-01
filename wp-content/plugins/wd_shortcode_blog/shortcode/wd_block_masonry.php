<?php 
	add_shortcode( "tvlg_block_masonry","tvlgiao_wpdance_block_masonry");
	function tvlgiao_wpdance_block_masonry($atts){
		extract(shortcode_atts( array(			
			'posts_per_page' => '5',
			'columns'		=> 4
			), $atts));
			ob_start();			?>
		<div ng-controller="MainCtrl as vm" ng-cloak="" layout="column" layout-fill class="content_blog_masonry">
			<div>
				<div
					 class="cards-wrap"
					 angular-grid="vm.shots"
					 ag-grid-width="300"
					 ag-gutter-size="30"
					 ag-id="shots"
					 ag-infinite-scroll="vm.loadMoreShots()"
					 >
				  <div class="card" ng-repeat="shot in vm.shots track by $index">
					<div class="item_header">
					  <div class="tvlg-module-thumb" ng-show="!shot.gallery">
							<a class="wd-effect-blog" ng-href="{{::shot.link}}">	
							<img class="img" ng-src="{{::shot.featured_image_thumbnail_url}}" ng-show="::shot.featured_image_thumbnail_url"/>						
							<img class="img" ng-src="{{link_defaut}}" alt="defaut" ng-show="::shot.featured_image_thumbnail_url.length == null"/>
							<div class="effect_hover_image"><span class="r1">&nbsp;</span><span class="r2">&nbsp;</span><span class="r3">&nbsp;</span><span class="r4">&nbsp;</span></div>
							</a>
					 </div>
					<div class="links" ng-show="::shot.type == 'video'" >
							<a class="openpop" ng-click="ShowPopup(shot.link_url)">Link 1</a>
					</div>
					<div class="images blog-image-slider loading" ng-show="shot.gallery">
							 <div ng-repeat="gallery_ids in ::shot.gallery" ng-repeat-owl-carousel carousel-init="vm.carouselInitializer">
								<div class="image">
									<a class="thumb-image" ng-href="{{::shot.link}}">
										<img  ng-src="{{gallery_ids}}" alt="defaut"/>
									</a>
								</div>
							 </div>									
						</div>
					<div class="tvlwpdance-cat-links">
						<div ng-repeat="n in ::shot.name_category track by $index">
							<a href="category/{{n}}" ng-bind-html="n | unsafe"></a>
						</div>
					</div>		
				 </div>
					<div class="inside item_content">
						<div class="content_title"><a href="{{::shot.link}}">{{::shot.title.rendered}}</a></div>
					    <div class="tvlg-excerpt" ng-bind-html="::shot.excerpt.rendered | unsafe"></div>
					    <div class="tvlg-module-meta-info">										
					  		 <span class="tvlg-post-author-name" ng-bind-html="::shot.post_author | unsafe"></span>
							 <span class="tvlg-post-date" ng-bind-html="::shot.post_date | unsafe"></span>
							 <div class="tvlg-module-comments" ng-bind-html="::shot.count_conmment | unsafe"></div>
					    </div>
					</div>
				  </div>
				</div>
				<div class="loading-more-indicator" ng-show="vm.loadingMore">
				  </div>
			</div>
		</div>
		<?php $content=ob_get_contents();
		ob_end_clean();
		return $content;
	}
?>