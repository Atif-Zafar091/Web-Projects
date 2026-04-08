<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];

mysqli_query($con, "UPDATE clients SET 
  client_name = '$name', 
  client_contact = '$contact', 
  client_address = '$address' 
WHERE client_id = $id");

  echo "<script>
      alert('✅ Client updated successfully!');
      window.location.href = 'add_client_form.php';
    </script>";
?>
