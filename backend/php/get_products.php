<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	$products = $db->getRepositorioProducts()->getProducts();

	echo json_encode($products);

?>