function PieceCtrl($scope,$http){

	$scope.callPieces = function(){
		$http({
			"url":"scripts/pieceScript.php",
			"method":"POST",
			"data":{
				"movelist":true
			}
		}).success( function(moves){
			$scope.$emit("getMoves",moves);
		});
	}
}
