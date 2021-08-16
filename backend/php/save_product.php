<?php

	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';


	$save = $db->getRepositorioProducts()->saveProduct($_POST);

	echo $save;

?>