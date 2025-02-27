<?php
header('Content-Type: application/json');

$data = [
    ["name" => "Toyota Camry", "price" => "$15,000"],
    ["name" => "Honda Civic", "price" => "$20,000"],
    ["name" => "Ford Mustang", "price" => "$22,000"],
    ["name" => "Tesla Model 3", "price" => "$24,000"]
];

echo json_encode($data);
?>
