<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';
	
	if ( $_POST['pass'] == '' || $_POST['c_pass'] == '' ) {
		echo false; exit;
	}

	if ( $_POST['pass'] !== $_POST['c_pass'] ) {
		echo false; exit;
	}

	$save = $db->getRepositorioUsers()->setPasswordUser($_POST);

	echo $save;

?>