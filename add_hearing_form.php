<?php
include 'db.php';

// Handle add form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $case_id = $_POST['case_id'] ?? '';
    $date = $_POST['hearing_date'] ?? '';
    $location = $_POST['location'] ?? '';
    $notes = $_POST['notes'] ?? '';

    $stmt = mysqli_prepare($con, "INSERT INTO hearings (case_id, date, location, notes) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isss", $case_id, $date, $location, $notes);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
          alert('✅ Hearing added successfully!');
          window.location.href = 'add_hearing_form.php';
        </script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>❌ Add Failed: " . mysqli_error($con) . "</div>";
    }
}

// Fetch data
$cases = mysqli_query($con, "SELECT id, title FROM cases");
$hearings = mysqli_query($con, "
  SELECT h.hearing_id, h.date, h.location, h.notes, c.title AS case_title
  FROM hearings h
  JOIN cases c ON h.case_id = c.id
  ORDER BY h.date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Hearing</title>

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
  <h3 class="mb-4">Add Hearing</h3>

  <form action="add_hearing_form.php" method="POST" class="border p-4 rounded">
    <div class="mb-3">
      <label>Select Case</label>
      <select name="case_id" class="form-control" required>
        <option value="">-- Choose a Case --</option>
        <?php while($row = mysqli_fetch_assoc($cases)) { ?>
          <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?> (ID: <?= $row['id'] ?>)</option>
        <?php } ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Hearing Date</label>
      <input type="date" name="hearing_date" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Notes</label>
      <textarea name="notes" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Add Hearing</button>
  </form>

  <h3 class="mt-5 mb-3">All Hearings</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Case</th>
          <th>Date</th>
          <th>Location</th>
          <th>Notes</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($hearings)) { ?>
          <tr>
            <td><?= $row['hearing_id'] ?></td>
            <td><?= htmlspecialchars($row['case_title']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['location']) ?></td>
            <td><?= htmlspecialchars($row['notes']) ?></td>
            <td>
              <a href="edit_hearing.php?id=<?= $row['hearing_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="delete_hearing.php?id=<?= $row['hearing_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this hearing?');">Delete</a>
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
