<?php

	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../clases/app.php';

	if ( 
		empty($_POST) || 
		$_POST['name'] == '' || 
		$_POST['active_principle'] == '' || 
		$_POST['presentation'] == '' || 
		$_POST['units_per_box'] == '' ||
		$_POST['pharmaceutical_form'] == '' ||
		$_POST['therapeutic_line'] == '' ||
		$_POST['language'] == '' ||
		$_POST['language'] == 'Seleccione Idioma del producto'
		)
	{
    echo false; exit;
  }

  header('Content-type: application/json');
	$save = $db->getRepositorioProducts()->addProduct($_POST);
	echo json_encode($save);

?>