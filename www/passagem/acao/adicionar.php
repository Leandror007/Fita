<?php 

require_once '../../db_connect.php';

session_start();

$agente = $_SESSION['login'];

$data1 = date('Y-m-d H:i:s');
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$aplbackup 		= $_POST['aplbackup'];
	$cliente 		= $_POST['cliente'];
	$host   		= $_POST['host'];
	$nmrotina   	= $_POST['nmrotina'];
	$chamado   		= $_POST['chamado'];
	$tiposo   		= $_POST['tiposo'];
	$descricao   	= $_POST['descricao'];
	$data   		= $_POST['data'];
	$hora   		= $_POST['hora'];
	$_status 		= $_POST['_status'];

	$sql = "INSERT INTO tbpassagem (aplbackup, cliente, host, nmrotina, chamado, tiposo, descricao, data, hora, datahora, _status, agente) VALUES ('$aplbackup', '$cliente', '$host', '$nmrotina', '$chamado', '$tiposo', '$descricao', '$data', '$hora','$data1', '$_status', '$agente')";
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