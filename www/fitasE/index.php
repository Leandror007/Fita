<?php include "../corpo/corpo.php";  ?>

<style type="text/css">
	.al{ text-align: center;}

	.label{ height: 35px; }

  th{ text-align: center; background: #00BFFF;}

  table{ margin: auto;}

</style>

<script>

function selecionar_tudo(){
  for (i=0;i<document.f1.elements.length;i++)
    if(document.f1.elements[i].type == "checkbox")  
      document.f1.elements[i].checked=1
}
function deselecionar_tudo(){
  for (i=0;i<document.f1.elements.length;i++)
    if(document.f1.elements[i].type == "checkbox")  
      document.f1.elements[i].checked=0
}
</script>



   <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Sistema de Fitas
                <small>Registro</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Fitas</a></li>
              </ol>
            </section>

  <section class="content">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
      <div class="col-md-12"> 

        <div class="removeMessages"></div>


<?php

include '../db_connect.php'; 


$sData = "SELECT DISTINCT dtutilizacao from tbfitabackup order by id desc limit 15";
$oU = mysqli_query($connect, $sData);

@$filtro00 = $_GET['filtro0'];
@$filtro01 = $_GET['filtro1'];
@$atual = date('Y-m-01');


?>

<html>
<body>



<form action="index.php" method="GET">

<table border="0px" width="600" >
<tr>
  <td colspan="7" class="tb01"><h3>Excluir Fitas</h3></td>
</tr>
<tr>
  <td>Data</td>
  <td class="tb01" colspan="7">
      <select class="form-control" name="filtro0" id="filtro0" type="text" >
        <option value="">Escolha a Data</option>            
         <?php
            while ($oRow = mysqli_fetch_object($oU)) {
              echo "<option value='$oRow->dtutilizacao'> $oRow->dtutilizacao </option>  ";
            }
         ?>
            <option value='%'> Todos </option>
      </select>  
    </td>

   
    <td>
       <button type="submit" class="label label-info" value="Mostrar" name="B1">Buscar</button> 
    </td>    
  </tr>        
</table>

</form>


<?php
if($filtro00 == ""){

    $qs = "SELECT * FROM tbfitabackup WHERE dtutilizacao LIKE '$filtro00'";
    $query = mysqli_query($connect, $qs);

?>
<br>
    <table border="1" class="table alert alert-info">
	<tr>
	<th>Excluir</th>
    <th>Codigo</th>
    <th>Agente</th>
    <th>Matricula</th>
    <th>Equipe</th>
    <th>Horario</th>  
	</tr>
	</table>

<?php
}else{

    $qs = "SELECT * FROM tbfitabackup WHERE dtutilizacao LIKE '$filtro00'";
    $query = mysqli_query($connect, $qs);

    
?>
<br>

<form method="post" action="Fitas.php" name="f1">
<table border="1" class="table">
	<tr>
		<th>Excluir</th>
    <th>Codigo</th>
    <th>Agente</th>
    <th>Matricula</th>
    <th>Equipe</th>
    <th>Horario</th>  
	</tr>
  <tr>
    <th colspan="5"><center> <a href="javascript:selecionar_tudo()">Marcar todos</a> | <a href="javascript:deselecionar_tudo()">Desmarcar todos</a>  </center></th>
  <th><input type="submit" value="Apagar"></th>
  </tr>
<?php
while($excluir = mysqli_fetch_array($query)){
?>
	<tr>
    <td class="al"><input type="checkbox" name="apagar[]" value="<?php echo $excluir['id']; ?>"></td>   
		<td class="al"><?php echo $excluir['id']; ?> </td>   
		<td class="al"><?php echo $excluir['ambiente'] ;?></td>
		<td class="al"><?php echo $excluir['barcode'];?></td>
    <td class="al"><?php echo $excluir['dtutilizacao'];?></td>
		<td class="al"><?php echo $excluir['_status'];?></td>		
	</tr>

<?php } ?>


</table>

</form>

<?php
}
?>

</body>



  <script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="custom/js/index.js?<?php echo time(); ?>"></script>
  <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../../plugins/fastclick/fastclick.min.js"></script>
  <script src="../../dist/js/app.min.js"></script>
  <script src="../../dist/js/demo.js"></script>
  <script src="../../plugins/sweetalert/sweetalert.min.js"></script>
  <script src="../../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
