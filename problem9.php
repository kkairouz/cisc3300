<?php
header('Content-Type: application/json');

$data = [
    ["name" => "Toyota Camry"],
    ["name" => "Honda Civic"],
    ["name" => "Ford Mustang"],
    ["name" => "Tesla Model 3"]
];

echo json_encode($data);
?>
