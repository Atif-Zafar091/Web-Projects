<?php
include('navbar.php');
$case_id = isset($_GET['case_id']) ? intval($_GET['case_id']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

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

  <div class="container mt-5">
    <h2 class="mb-4">Upload Legal Document</h2>

    <form action="doc.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">

      <!-- ✅ Case ID Logic -->
      <?php if ($case_id == 0): ?>
        <?php
          $con = mysqli_connect("localhost", "root", "", "legal_case_db");
          $cases = mysqli_query($con, "SELECT id, title FROM cases");
        ?>
        <div class="mb-3">
          <label class="form-label">Select Case</label>
          <select class="form-select" name="case_id" required>
            <option value="">-- Select Case --</option>
            <?php while ($c = mysqli_fetch_assoc($cases)) { ?>
              <option value="<?= $c['id'] ?>"><?= $c['title'] ?> (Case #<?= $c['id'] ?>)</option>
            <?php } ?>
          </select>
        </div>
      <?php else: ?>
        <input type="hidden" name="case_id" value="<?= $case_id ?>">
      <?php endif; ?>

      <div class="mb-3">
        <label for="title" class="form-label">Document Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter title (optional)">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3" placeholder="Enter description (optional)"></textarea>
      </div>

      <div class="mb-3">
        <label for="document" class="form-label">Select Document</label>
        <input type="file" class="form-control" name="document" accept=".pdf,.docx,.jpg,.jpeg,.png" required>
      </div>

      <button type="submit" class="btn" style="background-color: #10bc69; color: black;">Upload</button>
    </form>
  </div>
     <?php
include('footer.php');
?>

</body>
</html>
