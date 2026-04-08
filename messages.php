<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "legal_case_db");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $subject = $_POST['subject'] ?? '';
  $message = $_POST['message'] ?? '';

  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $_SESSION['status'] = " All fields are required.";
    header("Location: contact.php");
    exit;
  }

  $name = mysqli_real_escape_string($conn, $name);
  $email = mysqli_real_escape_string($conn, $email);
  $subject = mysqli_real_escape_string($conn, $subject);
  $message = mysqli_real_escape_string($conn, $message);

  $sql = "INSERT INTO messages (name, email, subject, message)
          VALUES ('$name', '$email', '$subject', '$message')";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "✅ Message sent successfully!";
  } else {
    $_SESSION['status'] = " Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
  header("Location: contact.php");
  exit;
}
?>
