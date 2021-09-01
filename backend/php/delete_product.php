<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( $_POST['id'] == 0 ) {
		echo 'no_suite';exit;
	} 

	$id = $_POST['id'];

	$product = $db->getRepositorioProducts()->deleteProduct($id);

	echo json_encode($product);

?>