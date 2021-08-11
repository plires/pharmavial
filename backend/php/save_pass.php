<?php

	include('../../config.inc.php');
	include_once('../../soporte.php');
	include_once('../../clases/app.php');

	if ( $_POST['pass'] == '' || $_POST['c_pass'] == '' ) {
		echo false; exit;
	}

	if ( $_POST['pass'] !== $_POST['c_pass'] ) {
		echo false; exit;
	}

	$save = $db->getRepositorioUsers()->setPasswordUser($_POST);

	echo $save;

?>