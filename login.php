<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) {
    echo "Connection failed";
    exit();
}

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM legaldata WHERE email='$email' AND password='$pass'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $_SESSION['lawyer_name'] = $row['name'];
    header("Location:index.html");
    exit();
} else {
    echo "Invalid email or password!";
}
?>
