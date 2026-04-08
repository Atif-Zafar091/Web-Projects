<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$client_id = $_POST['client_id'] ?? '';
$status = $_POST['status'] ?? '';


if (empty($title) || empty($description) || empty($client_id) || empty($status)) {
    die("Please fill all required fields.");
}


$title = mysqli_real_escape_string($con, $title);
$description = mysqli_real_escape_string($con, $description);
$status = mysqli_real_escape_string($con, $status);
$client_id = (int)$client_id; 


$sql = "INSERT INTO cases (title, description, status, client_id, created_at)
        VALUES ('$title', '$description', '$status', $client_id, NOW())";

if (mysqli_query($con, $sql)) {
    echo "<script>
     alert('✅ case added successfully!');
   window.location.href = 'manage_cases.php';
    </script>";
} else {
    echo "❌ Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
 
      