<?php
$host 	= "localhost";
$user 	= "root";
$pwd 	= "";
$dbname = "celke";

$link = mysql_connect($host,$user,$pwd);
$db = mysql_select_db($dbname,$link);
if(!$db) die("Falha ao conectar a base de dados.......");

?>