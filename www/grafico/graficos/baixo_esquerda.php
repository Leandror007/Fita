<?php 

include "../../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

?>


<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8"> 
<title>Document</title>
</head>
<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 

</body>
<script type="text/javascript">

Highcharts.chart('container', { 
	chart: { type: 'line' }, 
	title: { text: 'Total de aberturas' }, 
	subtitle: { text: 'Abertos X Fechados' }, 
	xAxis: { categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'] }, 
	yAxis: { title: { text: 'Quantidade (Uni)' } }, 
	plotOptions: { line: { dataLabels: { 
		enabled: true }, enableMouseTracking: false } }, 
		series: [{ 
			name: 'Abertas', data: [<?php 
			$mesesD = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
			foreach($mesesD as $meseD) { 
				$pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseD' and year(data_reg) = year(Now()) and data_reg <> '' "); 
				while($semaC = mysql_fetch_array($pC)){ 
					$rowsC = $semaC['COUNT(alarme)']; 
					echo $rowsC; 

					if($meseD <= 11){ echo ','; }
					else if($meseD = 12){ echo ' '; } } } ?> ] } 

				]});</script></html>