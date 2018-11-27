<?php 

include "../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);

////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ1 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'CSCSIMPANA'"; 
$oUs1 = mysql_query($sQ1); 
$d1 = mysql_num_rows($oUs1);

$sQ2 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'CSCSIMPANA'"; 
$oUs2 = mysql_query($sQ2); 
$d2 = mysql_num_rows($oUs2); 

$sQ3 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'CSCSIMPANA'"; 
$oUs3 = mysql_query($sQ3); 
$d3 = mysql_num_rows($oUs3);

////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ4 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'CSCBACKUPEXE'"; 
$oUs4 = mysql_query($sQ4); 
$d4 = mysql_num_rows($oUs4);

$sQ5 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'CSCBACKUPEXE'"; 
$oUs5 = mysql_query($sQ5); 
$d5 = mysql_num_rows($oUs5); 

$sQ6 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'CSCBACKUPEXE'"; 
$oUs6 = mysql_query($sQ6); 
$d6 = mysql_num_rows($oUs6);

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ7 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'BANCOSEMEAR 238'"; 
$oUs7 = mysql_query($sQ7); 
$d7 = mysql_num_rows($oUs7);

$sQ8 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'BANCOSEMEAR 238'"; 
$oUs8 = mysql_query($sQ8); 
$d8 = mysql_num_rows($oUs8); 

$sQ9 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'BANCOSEMEAR 238'"; 
$oUs9 = mysql_query($sQ9); 
$d9 = mysql_num_rows($oUs9);

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ10 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'BANCOSEMEAR GRANJA'"; 
$oUs10 = mysql_query($sQ10); 
$d10 = mysql_num_rows($oUs10);

$sQ11 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'BANCOSEMEAR GRANJA'"; 
$oUs11 = mysql_query($sQ11); 
$d11 = mysql_num_rows($oUs11); 

$sQ12 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'BANCOSEMEAR GRANJA'"; 
$oUs12 = mysql_query($sQ12); 
$d12 = mysql_num_rows($oUs12);

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ13 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'IBMLTO4'"; 
$oUs13 = mysql_query($sQ13); 
$d13 = mysql_num_rows($oUs13);

$sQ14 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'IBMLTO4'"; 
$oUs14 = mysql_query($sQ14); 
$d14 = mysql_num_rows($oUs14); 

$sQ15 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'IBMLTO4'"; 
$oUs15 = mysql_query($sQ15); 
$d15 = mysql_num_rows($oUs15);

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$sQ16 = "SELECT * from tbfitabackup where _status like 'Disponivel' and ambiente like 'IBMLTO6'"; 
$oUs16 = mysql_query($sQ16); 
$d16 = mysql_num_rows($oUs16);

$sQ17 = "SELECT * from tbfitabackup where _status like 'Em Uso' and ambiente like 'IBMLTO6'"; 
$oUs17 = mysql_query($sQ17); 
$d17 = mysql_num_rows($oUs17); 

$sQ18 = "SELECT * from tbfitabackup where _status like 'Problema' and ambiente like 'IBMLTO6'"; 
$oUs18 = mysql_query($sQ18); 
$d18 = mysql_num_rows($oUs18);

////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$totalambiente = ($disco + $memoria + $processamento + $intermitencia + $host + $rede + $outros + $processo + $cpu );
@$discoPorcentagem = ($disco*100)/$totalambiente;
@$memoriaPorcentagem = ($memoria*100)/$totalambiente;
@$processamentoPorcentagem = ($processamento*100)/$totalambiente;
@$intermitenciaPorcentagem = ($intermitencia*100)/$totalambiente;
@$indisponivelPorcentagem = ($interrompido*100)/$totalambiente;
@$cpuPorcentagem = ($cpu * 100)/$totalambiente;
@$processoPorcentagem = ($processo * 100)/$totalambiente;
@$hostPorcentagem = ($host * 100)/$totalambiente;
@$redePorcentagem = ($rede * 100)/$totalambiente;
@$outrosPorcentagem = ($outros * 100)/$totalambiente;
@$totalA = ($abertoM*100)/$totalambiente;
@$totalF = ($fechadoM*100)/$totalambiente; 
*/
?>