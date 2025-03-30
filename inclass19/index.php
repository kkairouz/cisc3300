<?php
require_once "../inclass19/models/Model.php";
require_once "../inclass19/models/User.php";
require_once "../inclass19/controllers/UserController.php";

//set our env variables, remember con
$env = parse_ini_file('../inclass19/.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use inclass19\controllers\UserController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {

    $userController = new UserController();
    $userController->getUsers();

}

exit();