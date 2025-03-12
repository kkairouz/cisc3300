<?php

namespace homework7\controllers;

class UserController
{
    public function saveNote()
    {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];


        if ($title) 
        {

            $title = htmlspecialchars($title);

            if (strlen($title) < 4) 
            {
                $errors['title'] = 'Title is too short';
            }

        }
        else 
        {
            $errors['title'] = 'Title is empty';
        }

        if ($description) 
        {

            $description = htmlspecialchars($description);

            if (strlen($description) < 11) {
                $errors['description'] = 'Description is too short';
            }
        }

        else 
        {
            $errors['description'] = 'Description is empty';
        }

        if (count($errors)) 
        {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }


        $returnData = 
        [
            'title' => $title,
            'description' => $description,
        ];

        echo json_encode($returnData);
        exit();
    }

    public function viewNote()
     {
        require 'form.html';
        exit();
    }
}