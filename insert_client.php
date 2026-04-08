<?php
include 'db.php';
session_start();



$name = $_POST['client_name'];
$contact = $_POST['client_contact'];
$address = $_POST['client_address'];

mysqli_query($con, "INSERT INTO clients ( client_name, client_contact, client_address)
                    VALUES ('$name', '$contact', '$address')");

echo"<script>
alert(' ✅ Client Added Successfully');
window.location.href='add_client_form.php';
</script>";
?>
