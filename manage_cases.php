<?php
// manage_cases.php
include 'db.php';

$result = mysqli_query($con, "SELECT * FROM cases");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Cases</title>

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

  <style>
    .form-container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 20px;
    }
    table {
      margin-top: 30px;
    }
    .actions{
      align_
    }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="form-container">
  <h2 class="mb-4">Manage Cases</h2>

<?php
$clients = mysqli_query($con, "SELECT client_id, client_name FROM clients");
?>

<form action="add_case.php" method="POST" class="row g-3 border p-4 rounded mb-5">
  <div class="col-md-4">
    <input type="text" name="title" class="form-control" placeholder="Case Title" required>
  </div>

  <div class="col-md-4">
    <input type="text" name="description" class="form-control" placeholder="Case Description" required>
  </div>

  <div class="col-md-4">
    <select name="client_id" class="form-select" required>
      <option value="">-- Select Client --</option>
      <?php while ($row = mysqli_fetch_assoc($clients)) { ?>
        <option value="<?= $row['client_id'] ?>">
          <?= htmlspecialchars($row['client_name']) ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="col-md-4">
    <select name="status" class="form-select" required>
      <option value="">Select Status</option>
      <option value="Open">Open</option>
      <option value="In Progress">In Progress</option>
      <option value="Closed">Closed</option>
    </select>
  </div>

  <div class="col-md-4">
    <button type="submit" class="btn btn-success w-100">Add Case</button>
  </div>
</form>


  <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th>Documents</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) {
          $case_id = intval($row['id']);
          $docs = mysqli_query($con, "SELECT * FROM documents WHERE case_id = $case_id");
        ?>
        <tr>
          <td><?= $case_id ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= htmlspecialchars($row['status']) ?></td>
          <td class="text-start">
            <?php while ($doc = mysqli_fetch_assoc($docs)) { ?>
              <a href="<?= htmlspecialchars($doc['file_path']) ?>" target="_blank"><?= htmlspecialchars($doc['file_name']) ?></a><br>
            <?php } ?>
          </td>
         <td class="actions">
  <div class="row g-2">
    <div class="col-6">
      <a class="btn btn-sm btn-success w-100" href="edit_case.php?id=<?= $case_id ?>">Edit</a>
    </div>
    <div class="col-6">
      <a class="btn btn-sm btn-danger w-100" href="delete_case.php?id=<?= $case_id ?>" onclick="return confirm('Are you sure you want to delete this case?')">Delete</a>
    </div>
    <div class="col-6">
      <a class="btn btn-sm btn-primary w-100" href="upload_form.php?case_id=<?= $case_id ?>">Upload Document</a>
    </div>
    <div class="col-6">
      <a class="btn btn-sm btn-info w-100" href="view_docs.php?case_id=<?= $case_id ?>">View Documents</a>
    </div>
  </div>
</td>

        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>

<?php include('footer.php'); ?>

</body>
</html>
