<?php

namespace homework7;

require "../problem8/controllers/UserController.php";

use homework7\controllers\UserController;

class Router {

    public function userRoutes() 
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $userController = new UserController();
            $userController->saveNote();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            $userController = new UserController();
            $userController->viewNote();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            require 'cisc3300/homework7/form.html';
            exit();
        }

    }
}

$router = new Router();
$router->userRoutes();
