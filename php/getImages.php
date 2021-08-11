<?php

include_once __DIR__ . '/../includes/soporte.php';

$images = $db->getRepositorioProducts()->getImages();

echo json_encode($images, JSON_NUMERIC_CHECK);

?>