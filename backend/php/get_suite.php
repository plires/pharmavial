<?php

	include('../../config.inc.php');
	include_once('../../soporte.php');

	include_once('../../clases/app.php');

	if ( $_POST['id'] == 0 ) {
		echo 'no_suite';exit;
	} 

	$id = $_POST['id'];

	$suite = $db->getRepositorioSuites()->getSuiteById($id);

	echo json_encode($suite);

?>