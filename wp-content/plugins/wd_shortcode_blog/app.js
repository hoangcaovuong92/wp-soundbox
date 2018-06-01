(function() {
  // initialize the app
var myapp = angular.module('example',['ngSanitize']);

// add a controller
myapp.controller('mycontroller', function($scope, wpFactory) {
  // load posts from the WordPress API
   $scope.images = {};
   $scope.postdata = [];
  
	wpFactory.getPosts(5).then(function (succ) {
		$scope.postdata = succ;
  }, function error(err) {
		console.log('Errror: ', err);
  });
  
  
  
	});
myapp.controller('Main', ['$scope', 'WPService', function($scope, WPService) {
	WPService.getPosts(1);
	//WPService.getAllCategories();
	$scope.data = WPService;
	
}]);
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
})();



