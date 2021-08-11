<?php

	include('../../config.inc.php');
	include_once('../../soporte.php');

	include_once('../../clases/app.php');

	if ( $_POST['price_regular'] == '' || $_POST['price_regular'] <= 0 || $_POST['discount'] < 0 || $_POST['discount'] > 99 ) {
		echo false; exit;
	}

	if ( $_POST['price_3_hs'] != '' && $_POST['price_3_hs'] <= 0 ) {
		echo false; exit;
	}

	$save = $db->getRepositorioSuites()->setPricesAndDiscountInSuites($_POST);

	echo $save;

?>