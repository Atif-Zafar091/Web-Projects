<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) die("Connection failed");

$id = $_GET['id'];
$result = mysqli_query($con, "SELECT file_path FROM documents WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($row) {
    $file = $row['file_path'];
    if (file_exists($file)) {
        unlink($file); 
    }
    mysqli_query($con, "DELETE FROM documents WHERE id = $id");
}

header("Location: manage_cases.php");
exit();
?>
