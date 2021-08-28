<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( !$_POST['id'] ) {
		header('Content-type: application/json');
		echo false; exit;
	} 

	$id = $_POST['id'];

	$del_current_prospect = $db->getRepositorioProducts()->delCurrentProspect($id);

	echo json_encode($del_current_prospect);

?>