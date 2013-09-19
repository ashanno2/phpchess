function GameCtrl($scope,$http) {

	$scope.coords = [];

	$scope.$on("coordsChanged", function(event,coordinates){
		$scope.coords = coordinates;
	});

	$scope.$on("getMoves", function(event,moves){
		$scope.movelist = moves;
	});
}

