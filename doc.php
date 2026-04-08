<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) {
    die("Connection failed");
}

$case_id = $_POST['case_id'];
$title = $_POST['title'] ?? '';
$desc = $_POST['description'] ?? '';

$file = $_FILES['document'];
$original_name = basename($file['name']);
$unique_name = time() . "_" . $original_name;

$target_path = $unique_name;

if (move_uploaded_file($file['tmp_name'], $target_path)) {
    $sql = "INSERT INTO documents (case_id, doc_title, doc_description, file_name, file_path, upload_date)
            VALUES ('$case_id', '$title', '$desc', '$original_name', '$target_path', NOW())";

    if (mysqli_query($con, $sql)) {
           echo "<script>
     alert('✅ Document updated successfully!');
   window.location.href = 'manage_cases.php';
    </script>";
    } else {
        echo " Database error: " . mysqli_error($con);
    }
} else {
    echo " Upload failed.";
}
?>
