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
		text: 'Grafico de Alarmes Anual' 
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
        name: 'Disco', 
        data: [<?php $mesesD = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesD as $meseD) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseD' and year(data_reg) = year(Now()) and alarme = 'Disco' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
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
        name: 'Memoria', 
        data: [<?php $meseMsM = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($meseMsM as $meseMD) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseMD' and year(data_reg) = year(Now()) and alarme = 'Memoria' "); 
        while($semaC = mysql_fetch_array($pC)){ 
          $rowsC = $semaC['COUNT(alarme)']; 
          echo $rowsC; 
          if($meseMD <= 11){ 
            echo ','; 
            }else if($meseMD = 12){
            echo ' '; 
          } 
        } } ?> ] 
      }, 

      { 
        name: 'Processador', 
        data: [<?php $mesesP = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseP) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseP' and year(data_reg) = year(Now()) and alarme = 'Processamento' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseP <= 11){ 
              echo ','; 
            }else if($meseP = 12){ 
              echo ' '; 
            } } } ?>] 
      }, 

      { 
        name: 'Intermitencia', 
        data: [<?php $mesesIn = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseIn) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseIn' and year(data_reg) = year(Now()) and alarme = 'Intermitencia' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseIn <= 11){ 
              echo ','; 
            }else if($meseIn = 12){ 
              echo ' '; } } } ?> ] 
      },

      { 
        name: 'CPU', 
        data: [<?php $mesesIn = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseIn) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseIn' and year(data_reg) = year(Now()) and alarme = 'CPU' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseIn <= 11){ 
              echo ','; }else if($meseIn = 12){ 
                echo ' '; } } } ?> ] 
      }, 

      { 
        name: 'Processo',
        data: [<?php $mesesIn = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseIn) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseIn' and year(data_reg) = year(Now()) and alarme = 'Processo' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseIn <= 11){ 
              echo ','; 
            }else if($meseIn = 12){ 
              echo ' '; 
            } } } ?> ] 
      }, 

      { 
        name: 'Host', 
        data: [<?php $mesesIn = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseIn) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseIn' and year(data_reg) = year(Now()) and alarme = 'Host' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
          echo $rowsC; 
          if($meseIn <= 11){ 
            echo ','; 
          }else if($meseIn = 12){ 
            echo ' '; 
          } } } ?> ] 
      }, 

      { 
        name: 'Rede', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Rede' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      },

      { 
        name: 'SQL', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'SQL' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      },

      { 
        name: 'SQL-SERVER', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'SQL-SERVER' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      },

       { 
        name: 'Backup', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Backup' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      }, 

      { 
        name: 'Roboot', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Roboot' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      }, 

       { 
        name: 'Oracle', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Oracle' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      }, 

      { 
        name: 'Controller', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Controller' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){ 
              echo ' '; 
            } } } ?>]
      },        

      { 
        name: 'Outros', 
        data: [<?php $mesesInd = array('1','2','3','4','5','6','7','8','9','10','11','12'); 
        foreach($mesesP as $meseInd) { 
          $pC = mysql_query("SELECT COUNT(alarme) from alarmes WHERE MONTH(data_reg) = '$meseInd' and year(data_reg) = year(Now()) and alarme = 'Outros' "); 
          while($semaC = mysql_fetch_array($pC)){ 
            $rowsC = $semaC['COUNT(alarme)']; 
            echo $rowsC; 
            if($meseInd <= 11){ 
              echo ','; 
            }else if($meseInd = 12){
              echo ' ';
            } 
        } } ?>] 
      }


						]});</script></html>