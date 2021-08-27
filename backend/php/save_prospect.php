<?php

	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( 
			empty($_FILES) || 
			$_FILES['uploadProspect']['type'] != 'application/pdf' || 
			$_FILES['uploadProspect']['size'] > 5242880 || 
			empty($_POST)	
		) {
		header('Content-type: application/json');
		echo false; exit;
	}

	$upload = $db->getRepositorioProducts()->uploadPdf($_FILES, $_POST);

	header('Content-type: application/json');
	echo json_encode($upload);

?>