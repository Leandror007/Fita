<?php 

require_once '../../db_connect.php';

$memberId = $_POST['member_id'];

$sql = "SELECT * FROM usuarios WHERE cod_usuario = $memberId";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);


