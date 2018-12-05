<?php

include "../../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);


$lista = array();
$dens = array();
$cor = array();


$cor[0] = '#ff3300';
$cor[1] = '#0000fff';
$cor[2] = '#006600';
$cor[3] = '#ff0066';
$cor[4] = '#703593';
$cor[5] = '#871B47';
$cor[6] = '#808080';
$cor[7] = '#76A7FA';
$cor[8] = '#1E90FF';
$cor[9] = '#483D8B';
$cor[10] = '#00FFFF';
$cor[11] = '#A0522D';
$cor[12] = '#BC8F8F';
$cor[13] = '#CD853F';
$cor[14] = '#FFDEAD';
$cor[15] = '#FF00FF';
$cor[16] = '#DDA0DD';
$cor[17] = '#F08080';
$cor[18] = '#DC143C';
$cor[19] = '#A52A2A';
$cor[20] = '#8B4513';

$i = 0;

$sql = "SELECT ambiente, COUNT(ambiente) AS total FROM tbfitabackup WHERE Month(dtutilizacao) LIKE Month(Now()) AND YEAR(dtutilizacao) LIKE YEAR(Now()) group by ambiente";
//$sql = "SELECT * FROM tbl_total";
$resultado = mysql_query($sql);
while($row = mysql_fetch_object($resultado)){
   $ambiente = $row->ambiente;
   $total  = $row->total;

   $tbfitabackup[$i] = $ambiente;
   $totais[$i] =  $total;
   $i = $i + 1;
}

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
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<script type="text/javascript">
	Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Grafico Fita'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    name: 'Share',
    data: [
     
       <?php
          $k = $i;
          for($i = 0; $i < $k; $i++){
        ?>
          {name: '<?php echo $tbfitabackup[$i] ?>',  y: <?php echo $totais[$i] ?>},
 
       <?php }  ?>
     
    ]
  }]
});

</script>
</body>
</html>