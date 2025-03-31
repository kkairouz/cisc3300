<?php

namespace inclass20\models;

//using the database class namespace
use inclass20\models\Model;

class Post extends Model {

    public function getAllPostsByNameOrDescription($name, $description) {
        $query = "select * from posts WHERE CONCAT(firstName,' ',lastName) like :name or description like :description";
        return $this->query($query, [
            'name' => '%' . $name . '%',
            'description' => '%' . $description . '%',
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData){
        $query = "insert into posts (firstName, lastName, description) values (:firstName, :lastName, :description);";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData){
        $query = "update posts set firstName = :firstName, lastName = :lastName, description = :description where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}