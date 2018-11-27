<?php 

require_once '../../db_connect.php';

$data = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id 			 = $_POST['member_id'];
	$ambiente 		 = $_POST['editambiente'];	
	$barcode 		 = $_POST['editbarcode'];
	$dtutilizacao 	 = $_POST['editdtutilizacao'];
	$_status 		 = $_POST['edit_status'];

	$sql = "UPDATE tbfitabackup SET ambiente = '$ambiente', barcode = '$barcode', dtutilizacao = '$dtutilizacao', _status = '$_status' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Sucesso em Atualizar";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erro para Atualizar";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}