<?php include "../corpo/corpo.php";  ?>

 <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Sistema de Fitas
                <small>Exclusão</small>
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


<a href="index.php">Voltar</a>

</br></br>

<?php

include '../db_connect.php'; 


$checkbox = $_POST['apagar'];

foreach ($checkbox as $value) {
$elimina = "DELETE from tbfitabackup WHERE id =".$value."";
$eliminar = mysqli_query($connect ,$elimina );


if($eliminar){
echo "Registro de fitas Excluídos! <br>";
}
}
?>





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
