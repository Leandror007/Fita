<?php 

require_once '../../db_connect.php';

$output = array('success' => false, 'messages' => array());

$memberId = $_POST['member_id'];

$sql = "DELETE FROM tbfitabackup WHERE id = {$memberId}";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Excluído com Sucesso!!';
} else {
	$output['success'] = false;
	$output['messages'] = 'Erro para excluír o registro!!';
}

// close database connection
$connect->close();

echo json_encode($output);