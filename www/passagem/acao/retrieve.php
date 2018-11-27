<?php 

require_once '../../db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM tbpassagem";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	$active = '';
	if($row['_status'] == 'Em Atendimento') {
		$active = '<label class="label label-warning">Em Atendimento</label>';
	} 
	else if($row['_status'] == 'Aguardando Atendimento'){
		$active = '<label class="label label-danger">Aguardando Atendimento</label>'; 
	}
	else if($row['_status'] == 'Aguardando Algar'){
		$active = '<label class="label label-danger">Aguardando Algar</label>'; 
	}
	else if($row['_status'] == 'Aguardando Cliente'){
		$active = '<label class="label label-danger">Aguardando Cliente</label>'; 
	}
	else {
		$active = '<label class="label label-success">Resolvido</label>'; 
	}

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Ação <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editMemberModal" onclick="editMember('.$row['id'].')"> <span class="glyphicon glyphicon-edit"></span> Editar</a></li>
	     <li><a type="button" data-toggle="modal" data-target="#viewMemberModal" onclick="viewMember('.$row['id'].')"> <span class="glyphicon glyphicon-eye-open"></span> Visualizar</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember('.$row['id'].')"> <span class="glyphicon glyphicon-trash"></span> Remover</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$x,
		$row['aplbackup'],
		$row['cliente'],
		$row['host'],
		$row['chamado'],
		$row['tiposo'],
		$row['data'],
		$active,
		$actionButton
	);

	$x++;
}
//date('d-m-Y',strtotime($row['dtacionamento']))." ".$row['hracionamento'],
// database connection close
$connect->close();

echo json_encode($output);