<?php
include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM clients WHERE client_id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Client</title>
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Edit Client</h2>


    <form action="update_client.php" method="POST" class="border p-4 rounded">

      <input type="hidden" name="id" value="<?= $data['client_id'] ?>">

      <div class="mb-3">
        <label class="form-label">Client Name</label>
        <input type="text" name="name" class="form-control" value="<?= $data['client_name'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Contact</label>
        <input type="text" name="contact" class="form-control" value="<?= $data['client_contact'] ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3"><?= $data['client_address'] ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Update Client</button>
      
    </form>
  </div>
</body>
</html>
