<?php 

require_once '../../db_connect.php';

$data = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id 			 = $_POST['member_id'];
	$aplbackup 		 = $_POST['editaplbackup'];	
	$cliente 		 = $_POST['editcliente'];
	$host 	 		 = $_POST['edithost'];
	$nmrotina 		 = $_POST['editnmrotina'];
	$chamado   		 = $_POST['editchamado'];
	$tiposo   		 = $_POST['edittiposo'];
	$descricao   	 = $_POST['editdescricao'];
	$data   		 = $_POST['editdata'];
	$hora   		 = $_POST['edithora'];
	$_status 		 = $_POST['edit_status'];

	$sql = "UPDATE tbpassagem SET aplbackup = '$aplbackup', cliente = '$cliente', host = '$host', nmrotina = '$nmrotina', 
	chamado = '$chamado', tiposo = '$tiposo', descricao = '$descricao',	data = '$data',	hora = '$hora',	_status = '$_status' WHERE id = $id";
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