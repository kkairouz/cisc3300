<?php

namespace homework10\controllers;

use homework10\models\Product;

class ProductController
{
    public function getProducts()
    {
        $productModel = new Product();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;

        $products = $productModel->getProducts($query);

        echo json_encode($products);
        exit();
    }

    public function validateProduct($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $description = $inputData['description'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'product name is too short';
            }
        } else {
            $errors['requiredName'] = 'product name is required';
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'description' => $description,
        ];
    }

    public function getAllProducts() {
        $productModel = new Product();
        header("Content-Type: application/json");
        $products = $productModel->getAllProducts();

        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $productModel = new Product();
//        header("Content-Type: application/json");
        $product = $productModel->getProductById($id);
        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'description' => $_POST['description'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct(
            [
                'name' => $productData['name'],
                'description' => $productData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'description' => $_PUT['description'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);
        //we could save the data off to be saved here

        $product = new Product();
        $product->updateProduct(
            [
                'id' => $id,
                'name' => $productData['name'],
                'description' => $productData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function productsView() {
        include '../homework10/products-view.html';
        exit();
    }

    public function productsAddView() {
        include '../homework10/products-add.html';
        exit();
    }

    public function productsDeleteView() {
        include '../homework10/products-delete.html';
        exit();
    }

    public function productsUpdateView() {
        include '../homework10/products-update.html';
        exit();
    }


}