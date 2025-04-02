<?php
require_once "../homework9/models/Model.php";
require_once "../homework9/models/Product.php";
require_once "../homework9/controllers/ProductController.php";

$env = parse_ini_file('../homework9/.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use homework9\controllers\ProductController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController = new ProductController();

    if ($id) {
        $productController->getProductByID($id);
    } else {
        $query = isset($_GET['name']) ? $_GET['name'] : null;
        $productController->getProducts($query);
    }
}

if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsView();
}

exit();