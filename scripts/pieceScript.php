<?php
	$userId = "00001";
	$gameId = "000001";
	$turn = "000";
	require_once('../classes/piece.class.php');
	$pieces = new pieceSet($userId);
	$data = json_decode(file_get_contents("php://input"));
	if($data->movelist === true){
		$pieces->setTeam($userId,$gameId);
		echo json_encode($pieces->getMoveList($turn));
	}

	
