<?php
// To Get Database connection  
$host = "localhost";
$user = "root";
$pass = "";        // set your MySQL password here 
$dbname = "assignment1_db";

$conn = new mysqli($host, $user, $pass, $dbname); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
