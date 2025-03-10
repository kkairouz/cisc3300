<?php
require '../app/controllers/NoteController.php'; 
use app\controllers\UserController;

    $url = strtok($_SERVER["REQUEST_URI"], '?');

    $uriArray = explode("/", $url);


    if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        require 'form.html';
    }
    if($uriArray[1] === 'notes' && $_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $noteController = new NoteController();
         
    }

    //return html


//require_once '../app/controllers/NoteController.php';

// $controller = new NoteController();
// $controller->createNote();
?>

