<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$hearing_id = $_GET['id'] ?? $_POST['hearing_id'] ?? null;

if (!$hearing_id || !is_numeric($hearing_id)) {
  die(" Invalid hearing ID.");
}

$result = mysqli_query($con, "SELECT * FROM hearings WHERE hearing_id = $hearing_id");
if (!$result || mysqli_num_rows($result) === 0) {
  die(" Hearing not found.");
}
$hearing = mysqli_fetch_assoc($result);

// Handle form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $date = $_POST['date'] ?? '';
  $location = $_POST['location'] ?? '';
  $notes = $_POST['notes'] ?? '';
  $case_id = $_POST['case_id'] ?? '';

  $stmt = mysqli_prepare($con, "UPDATE hearings SET date = ?, location = ?, notes = ?, case_id = ? WHERE hearing_id = ?");
  mysqli_stmt_bind_param($stmt, "sssii", $date, $location, $notes, $case_id, $hearing_id);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>
      alert('✅ Hearing updated successfully!');
      window.location.href = 'add_hearing_form.php';
    </script>";
    exit;
  } else {
    echo "<div class='alert alert-danger'>] Update failed: " . mysqli_error($con) . "</div>";
  }
}

$cases = mysqli_query($con, "SELECT id, title FROM cases");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Hearing</title>

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

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main.flex-grow-1 {
      flex: 1;
    }
  </style>
</head>
<body>
<?php include('navbar.php'); ?>

<main class="flex-grow-1 container mt-5">
  <h3 class="mb-4">Edit Hearing (ID: <?= $hearing['hearing_id'] ?>)</h3>

  <form method="POST" action="edit_hearing.php" class="border p-4 rounded">
    <input type="hidden" name="hearing_id" value="<?= $hearing['hearing_id'] ?>">

    <div class="mb-3">
      <label>Select Case</label>
      <select name="case_id" class="form-control" required>
        <option value="">-- Choose a Case --</option>
        <?php while ($row = mysqli_fetch_assoc($cases)) { ?>
          <option value="<?= $row['id'] ?>" <?= $row['id'] == $hearing['case_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($row['title']) ?> (ID: <?= $row['id'] ?>)
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Hearing Date</label>
      <input type="date" name="date" class="form-control" value="<?= $hearing['date'] ?>" required>
    </div>

    <div class="mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($hearing['location']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Notes</label>
      <textarea name="notes" class="form-control"><?= htmlspecialchars($hearing['notes']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Hearing</button>
    <a href="add_hearing_form.php" class="btn btn-secondary ms-2">Cancel</a>
  </form>
</main>

<?php include('footer.php'); ?>
</body>
</html>
