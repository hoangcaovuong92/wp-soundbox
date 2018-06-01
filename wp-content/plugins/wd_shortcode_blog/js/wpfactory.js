angular.module('example').factory('WPService', ['$http', function($http) {
  var WPService = {
  categories: [],
  posts: [],
  post1:[],
  simple:[],
  pageTitle: 'Latest Posts:',
  currentPage: 1,
  totalPages: 1,
  currentUser: {}
 };
 var wnm_custom = directory_uri.domain;
 function _updateTitle(documentTitle, pageTitle) {
		document.querySelector('title').innerHTML = documentTitle;
		WPService.pageTitle = pageTitle;
	}

	function _setArchivePage(posts, page, headers) {
		WPService.posts = posts;
		WPService.currentPage = page;
		WPService.totalPages = headers('X-WP-TotalPages');
	}

	WPService.getAllCategories = function(category) {
		if (WPService.categories.length) {
			return;
		}

		return $http.get(wnm_custom +'wp-json/wp/v2/categories/').success(function(res){
			WPService.categories = res;
		});
	};

	WPService.getPosts = function(page,limit,cat) {
		if(cat){
		var request = wnm_custom +'wp-json/wp/v2/posts/?page='+page+'&filter[category_name]='+cat+'&filter[posts_per_page]=' + limit;
		}
		else{
			var request = wnm_custom +'wp-json/wp/v2/posts/?page='+page+'&filter[posts_per_page]=' + limit;
		}
		return $http.get(request).success(function(res, status, headers){
			page = parseInt(page);

			if ( isNaN(page) || page > headers('X-WP-TotalPages') ) {
				_updateTitle('Page Not Found', 'Page Not Found');
			} else {
				if (page>1) {
					_updateTitle('Posts on Page ' + page, 'Posts on Page ' + page + ':');
				} else {
					_updateTitle('Home', 'Latest Posts:');
				}

				_setArchivePage(res,page,headers);
			}
		});
	};
	WPService.getPost2 = function(page,limit,cat) {
		if(cat){
		var request = wnm_custom +'wp-json/wp/v2/posts/?page='+page+'&filter[category_name]='+cat+'&filter[posts_per_page]=' + limit;
		}
		else{
			var request = wnm_custom +'wp-json/wp/v2/posts/?page='+page+'&filter[posts_per_page]=' + limit;
		}
		return $http.get(request).success(function(res, status, headers){			
			page = parseInt(page);

			if ( isNaN(page) || page > headers('X-WP-TotalPages') ) {
				_updateTitle('Page Not Found', 'Page Not Found');
			} else {
				if (page>1) {
					_updateTitle('Posts on Page ' + page, 'Posts on Page ' + page + ':');
				} else {
					_updateTitle('Home', 'Latest Posts:');
				}

				WPService.post1 = res;	
			}
		});
	};
	WPService.getsimplepost = function(s) {
		return $http.get(wnm_custom +'wp-json/wp/v2/posts/'+s).success(function(res){
			WPService.simple = res;
		});
	};
	WPService.getSearchResults = function(s) {
		return $http.get('wp-json/wp/v2/posts/?filter[s]=' + s + '&filter[posts_per_page]=-1').success(function(res, status, headers){
			_updateTitle('Search Results for ' + s, 'Search Results:');

			_setArchivePage(res,1,headers);
		});
	};

	WPService.getPostsInCategory = function(category, page) {
		if(category){
		var request = wnm_custom +'wp-json/wp/v2/posts/?filter[category_name]='+category+'&filter[posts_per_page]='+page;
		}
		else{
			var request = wnm_custom +'wp-json/wp/v2/posts/?filter[posts_per_page]='+page;
		}
		return $http.get(request).success(function(res, status, headers){
			WPService.categories = res;
		});
	};
	return WPService;
}]);