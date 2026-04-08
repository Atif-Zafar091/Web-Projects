<?php
// view_docs.php

$con = mysqli_connect("localhost", "root", "", "legal_case_db");
if (!$con) {
    die("Database connection failed");
}

$case_id = isset($_GET['case_id']) ? intval($_GET['case_id']) : 0;

$result = mysqli_query($con, "SELECT * FROM documents WHERE case_id = $case_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
 

  <meta charset="UTF-8">
  <title>Documents for Case #<?= $case_id ?></title>
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Raleway&family=Ubuntu&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="assets/css/main.css" rel="stylesheet">
  
</head>
<body class="container mt-5">
   <?php
  include('navbar.php');
  ?>
  <h2 class="mb-4">Documents for Case #<?= $case_id ?></h2>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>File Name</th>
          <th>Uploaded On</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($doc = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= htmlspecialchars($doc['doc_title']) ?></td>
            <td><?= htmlspecialchars($doc['file_name']) ?></td>
            <td><?= $doc['upload_date'] ?></td>
            <td>
              <a class="btn btn-sm btn-success" href="<?= $doc['file_path'] ?>" target="_blank">View</a>
              <a class="btn btn-sm btn-danger" href="delete_doc.php?id=<?= $doc['doc_id'] ?>&case_id=<?= $case_id ?>" onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No documents uploaded for this case.</p>
  <?php endif; ?>

  <a href="manage_cases.php" class="btn btn-secondary mt-3">← Back to Cases</a>
    <?php
  include('footer.php');
  ?>
</body>
</html>
