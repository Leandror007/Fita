<?php 

require_once '../../db_connect.php';

$data = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$ambiente 		= $_POST['ambiente'];
	$barcode 		= $_POST['barcode'];
	$dtutilizacao   = $_POST['dtutilizacao'];	
	$_status 		= $_POST['_status'];

	$sql = "INSERT INTO tbfitabackup (ambiente, barcode, dtutilizacao, _status, registro) VALUES ('$ambiente', '$barcode', '$dtutilizacao', '$_status', '$data')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Adicionado com Sucesso!!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro em salvar arquivo!!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}