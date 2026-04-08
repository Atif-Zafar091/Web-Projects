<?php
include('navbar.php');
require 'db.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$status = isset($_GET['status']) ? trim($_GET['status']) : '';

// Initialize result variable
$result = false;

// Run query only if search or status is set
if (!empty($search) || !empty($status)) {
    $sql = "SELECT cases.id, cases.title, clients.client_name, cases.status
            FROM cases
            JOIN clients ON cases.client_id = clients.client_id
            WHERE 1";

    if (!empty($search)) {
        $searchEsc = mysqli_real_escape_string($con, $search);
        $sql .= " AND (cases.title LIKE '%$searchEsc%' OR clients.client_name LIKE '%$searchEsc%')";
    }

    if (!empty($status)) {
        $statusEsc = mysqli_real_escape_string($con, $status);
        $sql .= " AND cases.status = '$statusEsc'";
    }

    $sql .= " ORDER BY cases.created_at DESC";

    $result = $con->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>


  <title>Search Cases</title>
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
<body class="bg-light">
  <div class="container py-4">
    <h2>Search & Filter Cases</h2>

    <form method="GET" class="row g-2 mb-3">
      <div class="col-md-5">
        <input type="text" name="search" class="form-control" placeholder="Search by title or client"
               value="<?= htmlspecialchars($search) ?>">
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select">
          <option value="">All</option>
          <option value="Open" <?= $status === 'Open' ? 'selected' : '' ?>>Open</option>
          <option value="Closed" <?= $status === 'Closed' ? 'selected' : '' ?>>Closed</option>
          <option value="In Progress" <?= $status === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn" style="background-color: #10bc69; color: black;" w-100">Search</button>
      </div>
    </form>

    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Case Title</th>
          <th>Client Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result === false): ?>
          <tr>
            <td colspan="3" class="text-center text-muted">
              Please enter a search term or select a status to see results.
            </td>
          </tr>
        <?php elseif ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['title']) ?></td>
              <td><?= htmlspecialchars($row['client_name']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center text-danger">
              No matching cases found.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
    <?php
include('footer.php');
?>
</body>
</html>
