<?php
	session_start();
	$SESSION["userName"] = "Aaron";
	$SESSION["userId"] = "00001";
?>
<!DOCTYPE html>
<html ng-app>
<head>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
<script src="scripts/GameCtrl.js"></script>
<script src="scripts/GameboardCtrl.js"></script>
<script src="scripts/PieceCtrl.js"></script>
<style type="text/css">
.square {
	border-width:2px;
	border-color:#2A2A2A;
	border-style:solid;
	position:absolute;
	z-index:10;
}
.filter {
	top:0;
	left:0;
	position:absolute;
	display:none;
	z-index:30;
}
.piece {
	position:absolute;
	display:none;
	z-index:20;
}
</style>
</head>
<body>
	<div id="game" ng-controller="GameCtrl">
		<div id="gameboard" ng-controller="GameboardCtrl" ng-init="callBoard()">
			<span>{{ hovered }}</span>
			<select ng-model="boardDirection" ng-options="direction as direction.label for direction in directions" ng-change="changeDirection()"></select>
			<input ng-model="boardSize" type="number" min="1" max="20" ng-change="changeSize()"></input>
			<input ng-model="pieceNum" type="number" min="1" max="32" ng-change="selectSquares()"></input>
			<p>
				<input ng-model="blackColorRGB" type="text" ng-change="changeColors()"></input>
			</p>
			<p>
				<input ng-model="whiteColorRGB" type="text" ng-change="changeColors()"></input>
			</p>
			<div ng-repeat="(squareLabel,square) in board" class="square" ng-style="{ backgroundColor:square.backgroundColor,color:square.color,width:settings.size+'px',height:settings.size+'px',top:coords[squareLabel].top+'px',left:coords[squareLabel].left+'px' }" ng-mouseenter="isHovered(squareLabel)" ng-mouseleave="unHovered(squareLabel)">
				<span>{{ squareLabel }}</span>
				<div class="filter" ng-style="{ display:square.over,backgroundColor:'rgba(80,80,80,0.75)',minWidth:80+'px',minHeight:80+'px' }">
				&nbsp;
				</div>
			</div>
		</div>
		<div id="pieceset" ng-controller="PieceCtrl" ng-init="callPieces()">
			<span ng-repeat="piece in pieces">{{}}</span>
		</div>
	</div>
</body>
</html>
