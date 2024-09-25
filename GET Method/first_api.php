<?php 

header("Content-Type:application/json");

$test_arr = [
    "welcome"=>"Test api works"
];

echo json_encode($test_arr);
