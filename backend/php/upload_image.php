<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( empty($_FILES) || $_FILES['image']['type'] != 'image/jpeg' || $_FILES['image']['size'] > 2097152	) {
		echo false; exit;
	}

	$upload = $db->getRepositorioProducts()->uploadImage($_FILES, $_POST);

	echo $upload;

?>