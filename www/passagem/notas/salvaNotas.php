<?php

session_start();

$agente = $_SESSION['login'];
   
$date = date('Y-m-d H:i:s');

include "../../db_connect.php";



mysql_connect($servername, $username, $password);
mysql_select_db($dbname);
    

      $sQuery = "INSERT into notas (idFita, tiposo, chamado, texto_ , data, agente)
                 values ( 
                          '" . $_POST["idFita"] . "', 
                          '" . $_POST["tiposo"] . "',  
                          '" . $_POST["chamado"] . "',                         
                          '" . $_POST["texto_"] . "',        
                          '" . $date  . "',                      
                          '" . $agente . "')";

   if (mysql_query($sQuery)) {
    
     echo "<script> window.alert ('Registro Salvo'); </script>";
     echo "<script>window.close();</script>";
    
   } else {
       echo "Problemas para gravar registro de Alarme!\n";
   }

   exit;
?>
