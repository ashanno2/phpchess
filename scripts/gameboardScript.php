<?php
	$id = "00001";
	require_once('../classes/board.class.php');
	$board = new board();
	echo $board->getJSONBoard();

	
