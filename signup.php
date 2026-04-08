<?php
$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) {
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO legaldata (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($con, $sql)) {
   echo "<script>
        alert('✅ Account created successfully! You are now logged in.');
        window.location.href = 'index.html';
    </script>";
} else {
    echo "Signup failed!";
}
?>
