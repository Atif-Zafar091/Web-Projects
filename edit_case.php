<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];

    $sql = "UPDATE cases SET title='$title', status='$status' WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        echo "<script>
          alert('✅ Case updated successfully!');
          window.location.href = 'manage_cases.php';
        </script>";
        exit();
    } else {
        echo "<div class='alert alert-danger'>Update failed: " . mysqli_error($con) . "</div>";
    }
} else {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM cases WHERE id=$id");
    $case = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Case</title>

  <!-- Bootstrap & Main CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/img/favicon.png" rel="icon">

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

<main class="flex-grow-1">
  <div class="container mt-5">
    <h3 class="mb-4">Edit Case (ID: <?= $case['id'] ?>)</h3>

    <form method="POST" action="edit_case.php" class="border p-4 rounded bg-light shadow-sm">
      <input type="hidden" name="id" value="<?= $case['id'] ?>">

      <div class="mb-3">
        <label class="form-label">Case Title</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($case['title']) ?>" required>
      </div>
        <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($case['description'] ?? '') ?></textarea>
  </div>

      <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
          <option value="Open" <?= $case['status'] == 'Open' ? 'selected' : '' ?>>Open</option>
          <option value="In Progress" <?= $case['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
          <option value="Closed" <?= $case['status'] == 'Closed' ? 'selected' : '' ?>>Closed</option>
        </select>
      </div>

<button type="submit" class="btn btn-success">Update Case</button>
      <a href="manage_cases.php" class="btn btn-secondary ms-2">Cancel</a>
    </form>
  </div>
</main>

<?php include('footer.php'); ?>
</body>
</html>
