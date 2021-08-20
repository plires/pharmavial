<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	$images = $db->getRepositorioProducts()->getImages();

	echo json_encode($images);

?>