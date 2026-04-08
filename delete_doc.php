<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) die("Connection failed");

$doc_id = $_GET['id'];
$case_id = $_GET['case_id'];

$result = mysqli_query($con, "SELECT file_path FROM documents WHERE doc_id = $doc_id");
$row = mysqli_fetch_assoc($result);

if ($row) {
    $file = $row['file_path'];
    if (file_exists($file)) {
        unlink($file);
    }
    mysqli_query($con, "DELETE FROM documents WHERE doc_id = $doc_id");
}

header("Location: view_docs.php?case_id=$case_id");
exit();
