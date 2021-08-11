<?php

include_once __DIR__ . '/../includes/soporte.php';

$products = $db->getRepositorioProducts()->getProducts();

echo json_encode($products, JSON_NUMERIC_CHECK);

?>