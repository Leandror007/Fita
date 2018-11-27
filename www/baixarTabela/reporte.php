<?php
include "../db_connect.php";

$dsequipe=$_POST['dsequipe'];


if(isset($_POST['generar_reporte']))
{

	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="TabelaFitas.csv"');

	
	$saida=fopen('php://output', 'w');

	fputcsv($saida, array('id', 'Ambiente', 'Barcode', 'Utilização', 'Status', 'Registrado em'));
	
	$reporteCsv=$connect->query("SELECT * FROM tbfitabackup WHERE dtutilizacao LIKE '$dsequipe' ORDER BY id");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($saida, array($filaR['id'], 
								$filaR['ambiente'],
								$filaR['barcode'],
								$filaR['dtutilizacao'],
								$filaR['_status'],
								$filaR['registro'],									

								));

}

?>