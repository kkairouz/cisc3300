<?php
require_once __DIR__ . '/../app/controllers/NoteController.php';

$controller = new NoteController();
$controller->createNote();
?>