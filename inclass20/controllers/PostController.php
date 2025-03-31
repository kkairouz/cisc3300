<?php

namespace inclass20\controllers;

use inclass20\models\Post;

class PostController
{
    public function validatePost($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $description = $inputData['description'];

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
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
            'firstName' => $firstName,
            'lastName' => $lastName,
            'description' => $description,
        ];
    }

    public function getAllPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $postModel = new Post();
        header("Content-Type: application/json");
        $post = $postModel->getPostById($id);
        echo json_encode($post);
        exit();
    }

    public function savePost() {
        $inputData = [
            'firstName' => $_POST['firstName'] ?: null,
            'lastName' => $_POST['lastName'] ?: null,
            'description' => $_POST['description'] ?: null,
        ];
        $postData = $this->validatePost($inputData);

        $post = new Post();
        $post->savePost(
            [
                'firstName' => $postData['firstName'],
                'lastName' => $postData['lastName'],
                'description' => $postData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'firstName' => $_PUT['firstName'] ?: null,
            'lastName' => $_PUT['lastName'] ?: null,
            'description' => $_PUT['description'] ?: null,
        ];
        $postData = $this->validatePost($inputData);
        //we could save the data off to be saved here

        $post = new Post();
        $post->updatePost(
            [
                'id' => $id,
                'firstName' => $postData['firstName'],
                'lastName' => $postData['lastName'],
                'description' => $postData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $post = new Post();
        $post->deletePost(
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

    public function postsView() {
        include '../inclass20/posts-view.html';
        exit();
    }

    public function postsAddView() {
        include '../inclass20/posts-add.html';
        exit();
    }

    public function postsDeleteView() {
        include '../inclass20/posts-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include '../inclass20/posts-update.html';
        exit();
    }


}