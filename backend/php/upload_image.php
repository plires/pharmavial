<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( empty($_FILES) || $_FILES['image']['type'] != 'image/jpeg' || $_FILES['image']['size'] > 2097152 || empty($_POST)	) {
		header('Content-type: application/json');
		echo false; exit;
	}

	$upload = $db->getRepositorioProducts()->uploadImage($_FILES, $_POST);

	header('Content-type: application/json');
	echo json_encode($upload);

?>