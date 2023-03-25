<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, X-Requested-With");
header("Content-type: application/json; charset=UTF-8");


require "classes/Product.php";
$_POST = json_decode(file_get_contents("php://input"),true);
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];

$product = new Product($sku, $name, $price, $productType, $size, $weight, $height, $width, $length);
$saved = $product->save();
echo json_encode($saved);
