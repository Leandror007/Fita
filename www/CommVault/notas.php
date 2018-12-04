<?php 

include "../db_connect.php";

mysql_connect($servername, $username, $password);
mysql_select_db($dbname);


$idPassagem = $_GET["id"];

$sQ1 = "SELECT * FROM tbpassagem WHERE id = '".$idPassagem."'"; 
$oUs1 = mysql_query($sQ1); 
$notas = mysql_fetch_object($oUs1);


?> 


<style type="text/css" media="all">
	#box-toggle {
		width:500px;
		margin:0 auto;
		text-align:justify;
		font:12px/1.4 Arial, Helvetica, sans-serif;
	}
	#box-toggle .tgl {margin-bottom:30px;}
	#box-toggle span {
		display:block;
		cursor:pointer;
		font-weight:bold;
		font-size:14px;
		color:#c30; 
		margin-top:15px;
	}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<script type="text/javascript"> 
	jQuery.fn.toggleText = function(a,b) {
		return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
	}

	$(document).ready(function(){
		$('.tgl').before('<span>Mostrar Notas</span>');
		$('.tgl').css('display', 'none')
		$('span', '#box-toggle').click(function() {
			$(this).next().slideToggle('slow')
			.siblings('.tgl:visible').slideToggle('fast');
			
			$(this).toggleText('Revelar','Esconder')
			.siblings('span').next('.tgl:visible').prev()
			.toggleText('Revelar','Esconder')
		});
	})
</script>


<script>
	function Fechar() {
		window.opener = window;
		window.close();
	}
</script>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="../../plugins/datatables/jquery.dataTables.css">
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">

<div >
	<div class="container">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Notas do Chamado
				<small>Registro</small>
			</h1>
		</section>
		
		
		
		<form class="form-horizontal" action="notas/salvaNotas.php" method="POST" id="createMemberForm">

			<div class="modal-body">
				<div class="messages"></div>  		
				
				<input type="hidden" name="idFita" id="idFita" value="<?php echo $notas->id;  ?>" readonly="readonly">

				<div class="form-group">
					<label for="aplbackup" class="col-sm-2 control-label">Backup</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="aplbackup" name="aplbackup" value="<?php echo $notas->aplbackup;  ?>" readonly="readonly">
					</div>
					
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $notas->cliente;  ?>" readonly="readonly">
					</div>
				</div>


				<div class="form-group">
					<label for="host" class="col-sm-2 control-label">Host</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="host" name="host" value="<?php echo $notas->host;  ?>" readonly="readonly">
					</div>
					
					<label for="nmrotina" class="col-sm-2 control-label">Rotina</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nmrotina" name="nmrotina" value="<?php echo $notas->nmrotina;  ?>" readonly="readonly">
					</div>
				</div>

				<div class="form-group">
					<label for="chamado" class="col-sm-2 control-label">Chamado</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="chamado" name="chamado" value="<?php echo $notas->chamado;  ?>" readonly="readonly">
					</div>
					
					<label for="tiposo" class="col-sm-2 control-label">SO</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="tiposo" name="tiposo" value="<?php echo $notas->tiposo;  ?>" readonly="readonly">
					</div>
				</div>

				<div class="form-group"> <!--/here teh addclass has-error will appear -->
					<label for="descricao" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10"> 
						<textarea class="form-control" id="descricao" name="descricao" rows="5"> <?php echo $notas->descricao;  ?> </textarea>
						<!-- here the text will apper  -->
					</div>
				</div>

				<div class="form-group">   
					<label for="res" class="col-sm-2 control-label">Aberto</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="res" name="res" value="<?php echo date('d/m/Y',strtotime($notas->data)).' '.$notas->hora;  ?>" readonly="readonly">
					</div>
					
					<label for="_status" class="col-sm-2 control-label">Status</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="_status" name="_status" value="<?php echo $notas->_status;  ?>" readonly="readonly">
					</div>
				</div>




				<div class="form-group"> <!--/here teh addclass has-error will appear -->
					<label for="texto_" class="col-sm-2 control-label">Motivo</label>
					<div class="col-sm-10"> 
						<textarea class="form-control" id="texto_" name="texto_" rows="5"> </textarea>
						<!-- here the text will apper  -->
					</div>
				</div>

				<div class="modal-footer editMemberModal">
					
					<input type="button" value="Fechar" name="fechar" class="btn btn-danger" data-dismiss="modal" onClick="Fechar()">

					<button type="reset" class="btn btn-warning" data-dismiss="modal">Limpar</button>
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</form>



			<div id="box-toggle">

				<?php

				$s = 'SELECT * FROM notas WHERE idFita = "'.$idPassagem.'" ORDER BY id DESC '; 
				$oU = mysql_query($s); 
//$notasView = mysql_num_rows($oU);

				while ($notasView  = mysql_fetch_array($oU)) {

					if($notasView['id'] == ''){

						
					}else{

						?>
						<div class="tgl">     
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title"> <?php echo $notasView['chamado'];  ?></h3>         
								</div>
								<div class="box-body">
									<?php echo $notasView['texto_'];  ?>
								</div>
								
								<div class="box-footer">
									Aberto por: <?php echo $notasView['agente'];  ?>  em: <?php echo $notasView['data'];  ?>
								</div>
								
							</div>

						</div> 

						<?php }}  ?>	

					</div>

					
				</section>
				<!-- /.content -->
			</div>
  <!-- /.content-wrapper -->