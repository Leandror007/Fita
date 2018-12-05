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
	<script src="https://code.highcharts.com/highcharts.js">
		
	</script>
	<script src="https://code.highcharts.com/modules/exporting.js">
		
	</script><div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 
</body>
<script type="text/javascript"> 

Highcharts.chart('container', { 
	chart: { type: 'column' 
	}, title: { 
		text: 'Grafico de Passagens' 
		}, 
		subtitle: { 
			text: 'Relação' 
			}, xAxis: { 
				categories: [ 
				'Jan', 
				'Fev', 
				'Mar', 
				'Abr', 
				'Mai', 
				'Jun', 
				'Jul', 
				'Ago', 
				'Set', 
				'Otu', 
				'Nov', 
				'Dez' ], 
				crosshair: true }, yAxis: { min: 0, title: { 
					text: 'Valor em (Unidade)' } }, 
					tooltip: { headerFormat: '<span style="font-size:10px">{point.key}</span><table>', 
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.0f} Unidade</b></td></tr>', 
					footerFormat: '</table>', shared: true, useHTML: true }, 
					plotOptions: { column: { 
						pointPadding: 0.2, borderWidth: 0 } }, 
						series: [
					{ 
        name: 'CommVault Simpana', 
        data: [<?php $mesesD = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesD as $meseD) { 
          $pC = mysql_query("SELECT COUNT(aplbackup) from tbpassagem WHERE MONTH(data) = '$meseD' and year(data) = year(Now()) and aplbackup = 'CommVault Simpana' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(aplbackup)']; 
            echo $rowsC; 
            if($meseD <= 11){ 
              echo ','; 
            }else if($meseD = 12){ 
              echo ' '; 
            } 
          } 
        } ?>] 
      }, 

      { 
        name: 'Backup Exec', 
        data: [<?php $meseMsM = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($meseMsM as $meseMD) { 
          $pC = mysql_query("SELECT COUNT(aplbackup) from tbpassagem WHERE MONTH(data) = '$meseMD' and year(data) = year(Now()) and aplbackup = 'Backup Exec' "); 
        while($semaC = mysql_fetch_array($pC)){ 
          $rowsC = $semaC['COUNT(aplbackup)']; 
          echo $rowsC; 
          if($meseMD <= 11){ 
            echo ','; 
            }else if($meseMD = 12){
            echo ' '; 
          } 
        } } ?> ] 
      }, 

      { 
        name: 'HP Data Protector', 
        data: [<?php $mesesP = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseP) { 
          $pC = mysql_query("SELECT COUNT(aplbackup) from tbpassagem WHERE MONTH(data) = '$meseP' and year(data) = year(Now()) and aplbackup = 'HP Data Protector' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(aplbackup)']; 
            echo $rowsC; 
            if($meseP <= 11){ 
              echo ','; 
            }else if($meseP = 12){ 
              echo ' '; 
            } } } ?>] 
      }, 

      { 
        name: 'Net Backup', 
        data: [<?php $mesesIn = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseIn) { 
          $pC = mysql_query("SELECT COUNT(aplbackup) from tbpassagem WHERE MONTH(data) = '$meseIn' and year(data) = year(Now()) and aplbackup = 'Net Backup' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(aplbackup)']; 
            echo $rowsC; 
            if($meseIn <= 11){ 
              echo ','; 
            }else if($meseIn = 12){ 
              echo ' '; } } } ?> ] 
      }


						]});</script></html>