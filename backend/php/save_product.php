<?php

	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../includes/funciones_validar.php';
	include_once __DIR__ . '/../../clases/app.php';


	if ( 
		empty($_POST) ||
		$_POST['id_product'] == '' ||
		!is_numeric($_POST['id_product']) ||
		$_POST['name'] == '' ||
		$_POST['active_principle'] == '' ||
		$_POST['presentation'] == '' ||
		$_POST['units_per_box'] == '' ||
		$_POST['pharmaceutical_form'] == '' ||
		$_POST['therapeutic_line'] == '' ||
		$_POST['language'] == '' ||
		$_POST['language'] == 'Seleccione Idioma del producto'
	) {
		header('Content-type: application/json');
		echo false; exit;
	}

	$product_edit = $db->getRepositorioProducts()->saveProduct($_POST);

	header('Content-type: application/json');
	echo json_encode($product_edit);

?>