<?php

	include('../../config.inc.php');
	include_once('../../soporte.php');

	include_once('../../includes/funciones_validar.php');

	include_once('../../clases/app.php');

	if (!comprobar_email($_POST['email'])){
    echo false; exit;
  }

  if (campoVacio($_POST['user'])){
    echo false; exit;
  } 

	$save = $db->getRepositorioUsers()->setValuesUser($_POST);

	echo $save;

?>