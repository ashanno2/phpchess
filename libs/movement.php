<?php
	$moves = array(); 
	$moves["queen"] = array(
				array("fileAdd" => 0, "rankAdd" => 1,"squares" => 7),
				array("fileAdd" => 1, "rankAdd" => 1,"squares" => 7),
				array("fileAdd" => 1, "rankAdd" => 0,"squares" => 7),
				array("fileAdd" => 1, "rankAdd" => -1,"squares" => 7),
				array("fileAdd" => 0, "rankAdd" => -1,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => -1,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => 0,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => 1,"squares" => 7)
			);
	$moves["king"] = array(	
				array("fileAdd" => 0, "rankAdd" => 1,"squares" => 1),
				array("fileAdd" => 1, "rankAdd" => 1,"squares" => 1),
				array("fileAdd" => 1, "rankAdd" => 0,"squares" => 1),
				array("fileAdd" => 1, "rankAdd" => -1,"squares" => 1),
				array("fileAdd" => 0, "rankAdd" => -1,"squares" => 1),
				array("fileAdd" => -1, "rankAdd" => -1,"squares" => 1),
				array("fileAdd" => -1, "rankAdd" => 0,"squares" => 1),
				array("fileAdd" => -1, "rankAdd" => 1,"squares" => 1)
			);
	$moves["rook"] = array(
				array("fileAdd" => 0, "rankAdd" => 1,"squares" => 7),
				array("fileAdd" => 1, "rankAdd" => 0,"squares" => 7),
				array("fileAdd" => 0, "rankAdd" => -1,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => 0,"squares" => 7)
			);
	$moves["bishop"] = array(
				array("fileAdd" => 1, "rankAdd" => 1,"squares" => 7),
				array("fileAdd" => 1, "rankAdd" => -1,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => 1,"squares" => 7),
				array("fileAdd" => -1, "rankAdd" => -1,"squares" => 7)
			);
	$moves["knight"] = array(
				array("fileAdd" => 2, "rankAdd" => 1,"squares" => 1),
				array("fileAdd" => 2, "rankAdd" => -1,"squares" => 1),
				array("fileAdd" => -2, "rankAdd" => 1,"squares" => 1),
				array("fileAdd" => -2, "rankAdd" => -1,"squares" => 1),
				array("fileAdd" => 1, "rankAdd" => 2,"squares" => 1),
				array("fileAdd" => -1, "rankAdd" => 2,"squares" => 1),
				array("fileAdd" => 1, "rankAdd" => -2,"squares" => 1),
				array("fileAdd" => -1, "rankAdd" => -2,"squares" => 1)
			);
	$moves["pawn"] = array(
				array("fileAdd" => 0, "rankAdd" => 1,"squares" => 1),
			);
				
				
