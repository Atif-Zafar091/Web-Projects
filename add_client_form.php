<?php
include 'db.php';

// Fetch all clients
$clients = mysqli_query($con, "SELECT * FROM clients ORDER BY client_id DESC");
if (!$clients) {
  die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Client</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Raleway&family=Ubuntu&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container mt-5">
  <h2>Add New Client</h2>

  <form action="insert_client.php" method="POST" class="border p-4 rounded">
    <div class="mb-3">
      <label>Client Name</label>
      <input type="text" name="client_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Contact Information</label>
      <input type="text" name="client_contact" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Address (optional)</label>
      <textarea name="client_address" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn" style="background-color: #10bc69; color: black;">Add Client</button>
  </form>
</div>

<div class="container mt-5">
  <h2 class="mb-4"> All Clients</h2>

  <div class="border p-4 rounded">
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; while($row = mysqli_fetch_assoc($clients)) { ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['client_name']) ?></td>
          <td><?= htmlspecialchars($row['client_contact']) ?></td>
          <td><?= htmlspecialchars($row['client_address']) ?></td>
          <td>
            <a href="edit_client.php?id=<?= $row['client_id'] ?>" class="btn btn-sm btn-primary">✏️ Edit</a>
            <a href="delete_client.php?id=<?= $row['client_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">🗑️ Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
