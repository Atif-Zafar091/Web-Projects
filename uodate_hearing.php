<?php
include 'db.php';

$id = $_POST['hearing_id'];
$case_id = $_POST['case_id'];
$date = $_POST['date'];
$loc = $_POST['location'];
$notes = $_POST['notes'];

$sql = "UPDATE hearings SET date='$date', location='$loc', notes='$notes' WHERE hearing_id=$id";
mysqli_query($con, $sql);

header(\"Location: view_hearings.php?case_id=$case_id\");
?>
