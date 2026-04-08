<?php
include 'db.php';

$case_id = $_POST['case_id'];
$date = $_POST['hearing_date'];
$location = $_POST['location'];
$notes = $_POST['notes'];

if (!$case_id || !$date || !$location) {
    echo " Please fill all required fields. <a href='add_hearing_form.php'>⬅Go Back</a>";
    exit;
}

$check = mysqli_query($con, "SELECT id FROM cases WHERE id = $case_id");
if (mysqli_num_rows($check) == 0) {
    echo " Case not found. <a href='add_hearing_form.php'>⬅Go Back</a>";
    exit;
}

mysqli_query($con, "INSERT INTO hearings (case_id, date, location, notes)
                    VALUES ('$case_id', '$date', '$location', '$notes')");

echo "✅ Hearing added successfully. <a href='add_hearing_form.php'>⬅ Go Back</a>";
?>
