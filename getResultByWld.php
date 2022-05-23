<?php

$requirePath = $_SERVER['DOCUMENT_ROOT'] . '/lib/Product.php';
$requirePath2 = $_SERVER['DOCUMENT_ROOT'] . '/lib/Functions.php';
require_once($requirePath);
require_once($requirePath2);

$prod = new Product;
$func = new Functions;

// Check the variable
$data = $func->cleanerVar($_POST['data']);
$result = $prod->getProductsByPartofWord($data);

// Displaying the result for an AJAX request
echo json_encode($result);

?>
