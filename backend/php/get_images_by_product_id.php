<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( $_POST['id'] == 0 ) {
		echo 'no_suite';exit;
	} 

	$id = $_POST['id'];

	$images = $db->getRepositorioProducts()->getImagesByProductId($id);

	echo json_encode($images);

?>