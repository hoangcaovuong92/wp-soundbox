(function() {
  // initialize the app
var myapp = angular.module('example',['ngRoute','ngSanitize','angularGrid','ocNgRepeat']);
myapp.controller('Main', ['$scope', 'WPService', '$sce',  function($scope, WPService,$sce) {
	//WPService.getAllCategories();
	var count = 1;
  $scope.current = 0;
  $scope.random = Math.floor(Math.random()*1000);
  $scope.string_rd  = 'blog-image-slider_' + $scope.random;
	$scope.link_defaut = myLocalized.partials + '870x524.png'
	$scope.init = function(pageTitle, numpage,showpages,cats){
		$scope.numpage = numpage;
		$scope.pageTitle = pageTitle; 
		$scope.showpages = showpages; 
		$scope.cats = String(cats);
	};
  $scope.$watch('pageTitle', function () {
		WPService.getPosts(1,$scope.pageTitle,$scope.cats);
		$scope.data = WPService;
		if($scope.numpage%$scope.pageTitle==0){
			$scope.pages = $scope.numpage/$scope.pageTitle;
		}
		else{
			$scope.pages = parseInt($scope.numpage/$scope.pageTitle)+1;
		}
  });
  $scope.ShowPopup = function(link_url) {
    jQuery(".popup iframe").attr("src",link_url);
    jQuery(".openpop").fadeOut('slow');
    jQuery(".popup").fadeIn('slow');
  }
  $scope.random_gallery = Math.floor(Math.random()*1000);
  $scope.id_gallery  = 'galley_id_' + $scope.random_gallery;
	var ctrl;
  ctrl = this;
  ctrl.carouselInitializer = function() {
    jQuery('.post_mansory').each(function(index,value){
      var wrapper_width = jQuery(this).width();       
      var object_selector = '#'+jQuery(this).attr('id');
      var min_width = jQuery(value).attr('data-min');   
      var item_width = Math.floor(wrapper_width * min_width / 100);
      fix_gallery_item(object_selector,wrapper_width,min_width,item_width);
      
      jQuery(value).imagesLoaded( function() {
        jQuery(value).isotope({
          layoutMode: 'masonry'
          ,itemSelector: '.gallery_item'
          ,masonry: {
            columnWidth: item_width
          }
        });
      });
    });  
    function fix_gallery_item(object_selector,wrapper_width,min_width,item_width){
      jQuery( object_selector + " div.gallery_item" ).each(function() {
        //alert("1");
        var item_data_width =   jQuery(this).attr('data-width');
        var item_width__ = Math.round(item_data_width / min_width) * item_width;
        jQuery( this).css({'width' : item_width__+'px'});
      });
    }
    $scope.ClickAngularJS = function() {
      jQuery('.post_mansory').each(function(index,value){
        var wrapper_width = jQuery(this).width();       
        var object_selector = '#'+jQuery(this).attr('id');
        var min_width = jQuery(value).attr('data-min');   
        var item_width = Math.floor(wrapper_width * min_width / 100);
        fix_gallery_item(object_selector,wrapper_width,min_width,item_width);
        
        jQuery(value).imagesLoaded( function() {
          jQuery(value).isotope({
            layoutMode: 'masonry'
            ,itemSelector: '.gallery_item'
            ,masonry: {
              columnWidth: item_width
            }
          });
        });
      });  
      function fix_gallery_item(object_selector,wrapper_width,min_width,item_width){
        jQuery( object_selector + " div.gallery_item" ).each(function() {
          //alert("1");
          var item_data_width =   jQuery(this).attr('data-width');
          var item_width__ = Math.round(item_data_width / min_width) * item_width;
          jQuery( this).css({'width' : item_width__+'px'});
        });
      }
    } 
    jQuery('.'+$scope.string_rd).owlCarousel({
      items: 1,
      nav: true,
      pagination: false
  		,onInitialized: function(){
  				jQuery('.blog-image-slider').removeClass('loading');
  		}
    });

  };

  // Audio
  $scope.bindiframeAudio = function(html) {
    return $sce.trustAsHtml(html);
  };
  // Gallery

}]); //End Main
myapp.controller('Main_block_3', ['$scope', 'WPService','$controller', function($scope, WPService,$controller) {
	var count = 1;
    $scope.current = 0;
	$scope.link_defaut = myLocalized.partials + '870x524.png'
	$scope.init = function(pageTitle, numpage,showpages,cats)
	  {
		$scope.numpage = numpage;
		$scope.pageTitle = pageTitle; 
		$scope.showpages = showpages; 
		$scope.cats = String(cats);
	  };
	$scope.$watch('pageTitle', function () {
		WPService.getPost2(1,$scope.pageTitle,$scope.cats);
		$scope.data = WPService;
		if($scope.numpage%$scope.pageTitle==0)
		{
			$scope.pages = $scope.numpage/$scope.pageTitle;
		}
		else{
			$scope.pages = parseInt($scope.numpage/$scope.pageTitle)+1;
		}
   });
    $scope.ShowPopup = function(link_url) {
       jQuery("iframe").attr("src",link_url);
        jQuery(".links").fadeOut('slow');
        jQuery(".popup").fadeIn('slow');
    }
       var ctrl;
      ctrl = this;
      ctrl.carouselInitializer = function() {
       jQuery(".blog-image-slider").owlCarousel({
          items: 1,
		  responsiveRefreshRate: 1000,
		  loop : true,
          nav: true,
          pagination: false
		  ,onInitialized: function(){
				jQuery('.blog-image-slider').removeClass('loading');
			}
        });
      };
}]);
myapp.controller('SimpleBlog', function($scope, WPService) {
	$scope.link_defaut = myLocalized.partials + '870x524.png'
	$scope.init = function(slug)
	  {
		$scope.slug = slug;
	  };
	$scope.$watch('slug', function () {
	WPService.getsimplepost($scope.slug);
	$scope.data = WPService;
	});
});
myapp.controller('block_slide', function($scope, WPService) {
  
  $scope.init = function(limit,cat)
	  {
		$scope.limit = limit;
		$scope.cats = String(cat);
	  };
  $scope.$watch('limit', function () {
	  WPService.getPostsInCategory($scope.cats,$scope.limit);
	  $scope.data = WPService;
  });
  
  
       var ctrl;
      ctrl = this;
      ctrl.carouselInitializer = function() {
       jQuery(".blog-slider").owlCarousel({
          items:5,
		  responsive:{
				0:{
					items:2
				},
				480:{
					items:2
				},
				768:{
					items: 4
				},
				992:{
					items: 4
				},
				1200:{
					items: 5
				}
			},
          nav: true,
          pagination: false
		  ,onInitialized: function(){
				jQuery('.blog-slider').removeClass('loading');
			}
        });
      };
});
myapp.directive('searchForm', function() {
	return {
		restrict: 'EA',
		template: 'Search Keyword: <input type="text" name="s" ng-model="filter.s" ng-change="search()">',
		controller: ['$scope', 'WPService', function($scope, WPService) {
			$scope.filter = {
				s: ''
			};
			$scope.search = function() {
				WPService.getSearchResults($scope.filter.s);
			};
		}]
	};
});
myapp.controller('MainCtrl', function($scope, $http, $q) {
 var vm = this;
  $scope.card = {};
  $scope.card.title = 'test';
  vm.page = 0;
  $scope.link_defaut = myLocalized.partials + '870x524.png'
  vm.shots = [];
  vm.loadingMore = false;
  var wnm_custom = directory_uri.domain;
  vm.loadMoreShots = function() {

    if(vm.loadingMore) return;
    vm.page++;
    // var deferred = $q.defer();
    vm.loadingMore = true;
	var promise = $http.get(wnm_custom+'/wp-json/wp/v2/posts/?page='+vm.page);
    promise.then(function(data) {

      var shotsTmp = angular.copy(vm.shots);
      shotsTmp = shotsTmp.concat(data.data);
      vm.shots = shotsTmp;
      vm.loadingMore = false;

    }, function() {
      vm.loadingMore = false;
    });
    return promise;
  };
	vm.carouselInitializer = function() {
       jQuery(".blog-image-slider").owlCarousel({
          items: 1,
		  responsiveRefreshRate: 1000,
		  loop : true,
          nav: true,
          pagination: false
		  ,onInitialized: function(){
				jQuery('.blog-image-slider').removeClass('loading');
			}
        });
      };
	 $scope.ShowPopup = function(link_url) {
       jQuery("iframe").attr("src",link_url);
        jQuery(".links").fadeOut('slow');
        jQuery(".popup").fadeIn('slow');
    }
  vm.loadMoreShots();

});
myapp.filter('unsafe', function($sce) { return $sce.trustAsHtml; });

myapp.directive('paginate', function($timeout) {
	return {
        restrict: 'C',
        replace: true,
        scope: {
            pages: '@paginatePages',
			limit: '@limitPages',
            currentPage: '='
        },
        template: '<div class="pagination-holder">' + '</div>',
        controller: function($scope,WPService, $element, $attrs) {
            var halfDisplayed = 1.5,
                displayedPages = 3,
                edges = 2;
            $scope.getInterval = function() {
                return {
                    start: Math.ceil($scope.currentPage > halfDisplayed ? Math.max(Math.min($scope.currentPage - halfDisplayed, ($scope.pages - displayedPages)), 0) : 0),
                    end: Math.ceil($scope.currentPage > halfDisplayed ? Math.min($scope.currentPage + halfDisplayed, $scope.pages) : Math.min(displayedPages, $scope.pages))
                };
            }
            $scope.selectPage = function(pageIndex) {
                $scope.currentPage = pageIndex;
                $scope.draw();
                $scope.$apply(); 
				WPService.getPosts(pageIndex+1,$scope.limit);
				WPService.getPost2(pageIndex+1,$scope.limit);
				$scope.data = WPService;
            }
            $scope.appendItem = function(pageIndex, opts) {
                var options, link;

                pageIndex = pageIndex < 0 ? 0 : (pageIndex < $scope.pages ? pageIndex : $scope.pages - 1);

                options = jQuery.extend({
                    text: pageIndex + 1,
                    classes: ''
                }, opts || {});

                if (pageIndex == $scope.currentPage) {
                    link = jQuery('<span class="current">' + (options.text) + '</span>');
                } else {
                    link = jQuery('<a href="javascript:void(0)" class="page-link">' + (options.text) + '</a>');
                    link.bind('click', function() {
                        $scope.selectPage(pageIndex);
						
                    });
                }

                if (options.classes) {
                    link.addClass(options.classes);
                }

                $element.append(link);
            }
            $scope.draw = function() {


               jQuery($element).empty();
                var interval = $scope.getInterval(),
                    i;

                // Generate Prev link
                if (true) {
                    $scope.appendItem($scope.currentPage - 1, {
                        text: 'Prev',
                        classes: 'prev'
                    });
                }

                // Generate start edges
                if (interval.start > 0 && edges > 0) {
                    var end = Math.min(edges, interval.start);
                    for (i = 0; i < end; i++) {
                        $scope.appendItem(i);
                    }
                    if (edges < interval.start) {
                        $element.append('<span class="ellipse">...</span>');
                    }
                }

                // Generate interval links
                for (i = interval.start; i < interval.end; i++) {
                    $scope.appendItem(i);
                }

                // Generate end edges
                if (interval.end < $scope.pages && edges > 0) {
                    if ($scope.pages - edges > interval.end) {
                        $element.append('<span class="ellipse">...</span>');
                    }
                    var begin = Math.max($scope.pages - edges, interval.end);
                    for (i = begin; i < $scope.pages; i++) {
                        $scope.appendItem(i);
                    }
                }

                // Generate Next link
                if (true) {
                    $scope.appendItem($scope.currentPage + 1, {
                        text: 'Next',
                        classes: 'next'
                    });
                }
            }
        },
        link: function(scope, element, attrs, controller) {
            $timeout(function() {
                scope.draw();
            }, 2000);
     scope.$watch(scope.paginatePages,function(){scope.draw();})
        }

    }
});
})();