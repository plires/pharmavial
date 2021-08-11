<?php

	include('../../config.inc.php');
	include_once('../../soporte.php');

	include_once('../../clases/app.php');

	if ( isset($_POST['id']) ) {
		$id = (int)$_POST['id'];
	} else {
		$id = 1;
	}

	$user = $db->getRepositorioUsers()->getUserById($id);

	echo json_encode($user);

?>