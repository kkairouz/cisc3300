<?php

namespace homework10\models;

//using the database class namespace
use homework10\models\Model;

class Product extends Model {

    public function getProducts($name) {
        if ($name) {
            $query = "select * from products WHERE name LIKE :name";
            return $this->fetchAllWithParams($query, ['name' => '%' . $name . '%']);
        }
        $query = "select * from products";
        return $this->fetchAll($query);
    }

    public function getAllProducts() {
        $query = "select * from products";
        return $this->query($query);
    }

    public function getProductById($id){
        $query = "select * from products where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveProduct($inputData){
        $query = "insert into products (name, description) values (:name, :description);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData){
        $query = "update products set name = :name, description = :description where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData){
        $query = "DELETE FROM products where id = :id";
        return $this->query($query, $inputData);
    }
}