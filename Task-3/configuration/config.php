<?php

$server = "0.0.0.0:3306";
$user = "root";
$pass = "root";
$database = "school";


$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    echo("<script>alert('Database connection failed... please reconfigure...')</script>");
}