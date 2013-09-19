<?php
	class pieceSet {

		public $pieces;
		public $movelist;
		public $team;
		public $board;
		public $moves;
	
		function __construct(){
			include('../libs/pieceRoster.php');
			include('../libs/movement.php');
			$this->pieces = $roster;
			$this->moves = $moves;
		}

		function setTeam($id,$game){
			//retrieve team from db
			$this->team = "white";
		}

		function isOccupied($f,$r){
			$occupied = 0;
			for($i=1;$i<=33;$i++){
				if($this->board[$i]["file"] === $f && $this->board[$i]["rank"] === $r){
					$occupied = $i;
					break;
				}	
			}	
			return $occupied;
		}

		function sameTeam($i,$j){
			if($this->board[$i]["team"] === $this->board[$i]["team"]){
				return true;
			} else return false;
		}

		function isKing($i){
			if($this->board[$i]["type"] === "king"){
				return true;
			} else return false;
		}

		function inBounds($x,$y){
			if(($x > 0 && $x < 9) && ($y > 0 && $y < 9)){
				return true;
			} else return false;
		}

		function getCurrentBoard($turn){
			if($turn > 0){
				//retrieve this turn's array from db
			}
		}

		function getMoveList($turn){
			$this->board = $this->getCurrentBoard($turn);
			for($i=1;$i<=32;$i++){
				$this->movesPossible($i,$this->pieces[$i]["default"]["file"],$this->pieces[$i]["default"]["rank"]);		
			}
			return $this->movelist;
		}

		function specialCase($i){
			//testing for en passant, pawn attacks, pawn promotion, and castling
		}

		function movesPossible($i,$x,$y){
			$designations = array(1 => 'a','b','c','d','e','f','g','h');
			$type = $this->pieces[$i]["type"];
			$this->movelist[$i] = array();
			foreach($this->moves[$type] as $m){
				for($j=1;$j<=$m["squares"];$j++){
					$newX = ($m["fileAdd"] * $j) + $x;
					$newY = ($m["rankAdd"] * $j) + $y;
					if($this->inBounds($newX,$newY)){
						array_push($this->movelist[$i],"{$designations[$newX]}$newY");
					}
				}
			}
		}
		
	}//end class
?>
