<?php
$host = 'localhost';
$user = 'root';
$pass = ''; 
$dbname = 'legal_case_db'; 


$con = mysqli_connect("localhost", "root", "", "legal_case_db");


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

