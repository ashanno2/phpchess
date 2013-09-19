function GameboardCtrl($scope,$http) {

	$scope.Math = window.Math;

	$scope.directions = [
		//select list with file and rank modifiers to achieved the labeled effect
		{ file:0,rank:-9,label:'rank advances bottom to top'},
		{ file:-9,rank:0,label:'rank advances top to bottom'},
		{ file:0,rank:0,label:'rank advances left to right'},
		{ file:-9,rank:-9,label:'rank advances right to left'}
	];	

	//set select default
	$scope.boardDirection = $scope.directions[0];	
	$scope.blackColorRGB = "0,0,0";	
	$scope.whiteColorRGB = "255,255,255";	
	$scope.boardSize = 80;

	//default settings
	$scope.settings = {
		file:0,
		rank:-9,
		size:80,
		whiteColor:"rgba(255,255,255,1.0)",
		blackColor: "rgba(0,0,0,1.0)"
	};

	$scope.pieceNum = 1;

	$scope.selectSquares = function(){
		for(var i in $scope.squares){
			if($scope.squares.hasOwnProperty(i)){
				$scope.squares[i].over = "none";
			}
		}
		for(var i in $scope.movelist[$scope.pieceNum]){
			if($scope.movelist[$scope.pieceNum].hasOwnProperty(i)){
				$scope.squares[$scope.movelist[$scope.pieceNum][i]].over = "block";
			}
		}
	}

	$scope.isHovered = function(label){
		$scope.hovered = label;
		$scope.squares[label].over = "block";
	}

	$scope.unHovered = function(label){
		$scope.hovered = '';
		$scope.squares[label].over = "none";
	}

	$scope.changeDirection = function(){
		$scope.settings.file = $scope.boardDirection.file;
		$scope.settings.rank = $scope.boardDirection.rank;
		$scope.callBoard();
	}

	$scope.changeSize = function(){
		$scope.settings.size = $scope.boardSize * 10;
		$scope.callBoard();
	}

	$scope.changeColors = function(){
		if($scope.isRGB($scope.blackColorRGB)){
			$scope.settings.blackColor = "rgba(" + $scope.blackColorRGB + ",1.0)";
		} else $scope.settings.blackColor = "rgba(0,0,0,1.0)";
		if($scope.isRGB($scope.whiteColorRGB)){
			$scope.settings.whiteColor = "rgba(" + $scope.whiteColorRGB + ",1.0)";
		} else $scope.settings.whiteColor = "rgba(255,255,255,1.0)";
		$scope.callBoard();
	}

	//verify that the rgb input is formatted properly, discarding with prejudice
	$scope.isRGB = function(rgb){
		var flag = 0;
		var rgbsplit = rgb.split(",");
		if(rgbsplit.length === 3){
			for(var i=0;i<3;i++){
				if(rgbsplit[i] >= 0 && rgbsplit[i] <= 255){
					flag++;
				}
			}
		} else return false;
		if(flag === 3){
			return true;
		} else {
			return false;
		}
	}

	$scope.callBoard = function(){
		$http({
			"url":"scripts/gameboardScript.php",
			"method":"POST"
		}).success(function(data){
			$scope.squares = data;
			$scope.applySettings();
		});
	}

	$scope.applySettings = function(){
		for(var i in $scope.squares){
			if($scope.squares.hasOwnProperty(i)){
				$scope.board = $scope.applyColors(i);
				$scope.$emit("coordsChanged",$scope.applyPositioning(i));
			}
		}
	}

	$scope.applyColors = function(i){
		//squares whose summed rank and file is even have black backgrounds
		if(($scope.squares[i].file + $scope.squares[i].rank) % 2 === 0){
			$scope.squares[i].backgroundColor = $scope.settings.blackColor;
			$scope.squares[i].color = $scope.settings.whiteColor;
		} else {	
			$scope.squares[i].backgroundColor = $scope.settings.whiteColor;
			$scope.squares[i].color = $scope.settings.blackColor;
		}
		return $scope.squares;
	}

	$scope.coordinates = [];

	$scope.applyPositioning = function(i){
		$scope.coordinates[i] = [];
		//switch top and left to account for switch in rank and file alignment
		if($scope.settings.rank === $scope.settings.file){
			$scope.coordinates[i].left = $scope.settings.size + ($scope.settings.size * $scope.Math.abs($scope.squares[i].rank + $scope.settings.rank));
			$scope.coordinates[i].top = $scope.settings.size + ($scope.settings.size * $scope.Math.abs($scope.squares[i].file + $scope.settings.file));
		} else {
			$scope.coordinates[i].top = $scope.settings.size + ($scope.settings.size * $scope.Math.abs($scope.squares[i].rank + $scope.settings.rank));
			$scope.coordinates[i].left = $scope.settings.size + ($scope.settings.size * $scope.Math.abs($scope.squares[i].file + $scope.settings.file));
		}
		return $scope.coordinates;
	}
		
}

