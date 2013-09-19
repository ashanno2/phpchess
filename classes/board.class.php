<?php

	class board {
		public $squares = array();

		function __construct(){
		//construct board with default squares
			$designations = array(1 => 'a','b','c','d','e','f','g','h');
			$i=1;
			for($i=1;$i<9;$i++){
				$j=1;
				for($j=1;$j<9;$j++){
					$this->squares[$designations[$j] . $i] = array();
					$this->squares[$designations[$j] . $i]['rank'] = $i;
					$this->squares[$designations[$j] . $i]['file'] = $j;
				}
			} 
		}

		function getJSONBoard(){
			return json_encode($this->squares);
		}
	}

?>


