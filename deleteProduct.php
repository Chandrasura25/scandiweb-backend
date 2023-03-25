<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding, Authorization, X-Requested-With");
header("Content-type: application/json; charset=UTF-8");


require "classes/Product.php";

$_POST = json_decode(file_get_contents("php://input"), true);

if (isset($_POST['sku'])) {
    $skus = $_POST['sku'];
    foreach ($skus as $key => $sku) {
        $product = new Product($sku, '', '', '');
        $deletedProduct = $product->deleteProduct();
        echo json_encode($deletedProduct);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid Request']);
}
