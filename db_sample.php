<?php
// db.php
$host = "localhost";
$user = "root";
$password = "your_password";
$database = "your_databse_name";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
