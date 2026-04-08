<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "legal_case_db");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = trim($_POST['email'] ?? '');

  if (!empty($email)) {
    $email = mysqli_real_escape_string($conn, $email);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT id FROM newsletter WHERE email = '$email' LIMIT 1");

    if (mysqli_num_rows($check) > 0) {
      header("Location: index.html?status=exists");
    } else {
      $query = "INSERT INTO newsletter (email) VALUES ('$email')";
      if (mysqli_query($conn, $query)) {
        header("Location: index.html?status=success");
      } else {
        header("Location: index.html?status=error");
      }
    }
  } else {
    header("Location: index.html?status=empty");
  }

  exit;
}
?>
