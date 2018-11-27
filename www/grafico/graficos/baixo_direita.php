<?php 


include "../../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

$sQ1 = "SELECT * from alarmes where alarme like 'Disco' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); $discoA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Disco' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$discoF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Memoria' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$memoriaA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Memoria' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 

$memoriaF = mysql_num_rows($oUs1); $sQ1 = "SELECT * from alarmes where alarme like 'Processamento' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$processamentoA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Processamento' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$processamentoF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Intermitencia' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$intermitenciaA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Intermitencia' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$intermitenciaF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'CPU' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$cpuA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'CPU' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$cpuF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Processo' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$processoA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Processo' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$processoF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Host' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$hostA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Host' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$hostF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Rede' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$redeA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Rede' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$redeF = mysql_num_rows($oUs1); 


$SemanaD = "SELECT * from alarmes where alarme like 'SQL' AND MONTH(data_reg) = MONTH(Now()) AND YEAR(data_reg) = YEAR(NOW()) and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($SemanaD); 
$sqlA = mysql_num_rows($oUs1); 


$SemanaD = "SELECT * from alarmes where alarme like 'SQL' AND MONTH(data_fechamento) = MONTH(Now()) AND YEAR(data_reg) = YEAR(NOW())and data_reg <> '' and data_reg <> '0000-00-00 00:00:00' order by alarme";
$oUs1 = mysql_query($SemanaD); 
$sqlF = mysql_num_rows($oUs1);

$sQ1 = "SELECT * from alarmes where alarme like 'Outros' and data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$outrosA = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where alarme like 'Outros' and data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$outrosF = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where data_reg <> '' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$abertos = mysql_num_rows($oUs1); 

$sQ1 = "SELECT * from alarmes where data_fechamento <> '' and data_fechamento <> '0000-00-00 00:00:00' order by alarme"; 
$oUs1 = mysql_query($sQ1); 
$fechados = mysql_num_rows($oUs1);




?>
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8"> 
	<title>Document</title>
</head>
<body>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>

	<div id="container" style="width: 400px; height: 400px; margin: 0 auto"></div>
	<script type="text/javascript"> 
		Highcharts.chart('container', { 
			title: { text: 'Combinação' }, xAxis: { 
				categories: ['Disco', 'Memoria', 'Processamento', 'Intermitencia', 'CPU', 'Processo','Host','Rede','SQL','Outros'] }, 
				labels: { items: [{ html: 'Total de Registros', 
				style: { left: '50px', top: '18px', color: (Highcharts.theme && Highcharts.theme.textColor) || 'black' } }] }, 
				series: [{ 
					type: 'column', name: 'Aberto', data: [<?php echo $discoA ?>, <?php echo $memoriaA ?>, <?php echo $processamentoA ?>, <?php echo $intermitenciaA ?>, <?php echo $cpuA ?>, <?php echo $processoA ?>, <?php echo $hostA ?>, <?php echo $redeA ?>, <?php echo $sqlA ?>, <?php echo $outrosA ?>] },{ type: 'column', name: 'Fechado', data: [<?php echo $discoF ?>, <?php echo $memoriaF ?>, <?php echo $processamentoF ?>, <?php echo $intermitenciaF ?>, <?php echo $cpuF ?>, <?php echo $processoF ?>, <?php echo $hostF ?>, <?php echo $redeF ?>, <?php echo $sqlF ?>,<?php echo $outrosF ?>] }, 
					{ 
						type: 'spline', name: 'Linha', data: [3, 2.67, 3, 6.33, 3.33], marker: { 
							lineWidth: 2, lineColor: Highcharts.getOptions().colors[3], fillColor: 'white' } }, 
							{ 
								type: 'pie', name: 'Total consumption', 
								data: [{ name: 'Aberto', y: <?php echo $abertos ?>, color: Highcharts.getOptions().colors[0] }, { name: 'Fechado', y: <?php echo $fechados ?>, color: Highcharts.getOptions().colors[1] }], center: [100, 80], size: 100, showInLegend: false, dataLabels: { enabled: false } }]});

</script></html>