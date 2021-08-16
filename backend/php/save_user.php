<?php
	
	include_once __DIR__ . '/../../includes/soporte.php';
	include_once __DIR__ . '/../../includes/funciones_validar.php';
	include_once __DIR__ . '/../../clases/app.php';

	if (!comprobar_email($_POST['email'])){
    echo false; exit;
  }

  if (campoVacio($_POST['user'])){
    echo false; exit;
  } 

	$save = $db->getRepositorioUsers()->setValuesUser($_POST);

	echo $save;

?>