<?php

namespace homework9\controllers;

use homework9\models\Product;

class ProductController
{
    public function getProducts()
    {
        $productModel = new Product();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;

        $products = $productModel->getProducts($query);

        if (empty($products)) {
            echo json_encode([
                'message' => 'No products found with the name "' . $query . '"'
            ]);
        } else {
            echo json_encode($products);
            exit();
        }
    }

    public function getProductByID($id) {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        echo json_encode($product);
        exit();
    }

    public function productsView() {
        include '../homework9/products.html';
        exit();
    }
}