<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Grafico SGO</title>
</head>

  <?php include '../sessao.php'; ?>

<?php  if($_SESSION['nivel'] == 'Sup') { ?>

	<FRAMESET border="0" COLS=50%,50%>
	<FRAMESET ROWS=50%,50%>
		<FRAME SRC='graficos/topo_esquerda.php'>
		<FRAME SRC='graficos/baixo_esquerda.php'>
		
	</FRAMESET>
	<FRAMESET border="0" ROWS=40%,40%>
		<FRAME SRC='graficos/topo_direita.php'>
		<FRAME SRC='graficos/baixo_direita.php'>
		
	</FRAMESET>
	</FRAMESET>

<?php  }else{ echo "<script>window.setTimeout('history.back(-2)', 5);</script> ";}  ?>
	
</HTML>