<?php
include 'db.php';

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM clients WHERE client_id = $id");
echo"
<script>
alert(' ✅ Client deleted Successfully');
window.location.href='add_client_form.php';
</script>";

?>
