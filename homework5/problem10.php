<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $data = json_decode(file_get_contents("php://input"), true);

    echo json_encode([
        'message' => 'Success',
        'received_email' => $data['email'] ?? 'No email provided',
        'received_password' => $data['password'] ?? 'No password provided'
    ]);
    exit();
}
?>
