<?php 

header('Content-Type: application/json');

// check if method is POST
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'),true);

if(!$data){
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$response = [
    "status" => "success",
    "message" => "User created successfully",
    "data" => $data
];

echo json_encode($response);