<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) die("Connection failed");

$id = $_GET['id'];

$stmt = mysqli_prepare($con, "DELETE FROM cases WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: manage_cases.php");
exit();
echo mysqli_error($con);

?>
