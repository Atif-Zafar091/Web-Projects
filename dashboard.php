<?php
// dashboard.php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>

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

  <!-- Main CSS -->
  <link href="assets/css/main.css" rel="stylesheet">

  <style>
    .dashboard {
      padding: 40px 20px;
    }
    .dashboard .card {
      transition: transform 0.2s;
      cursor: pointer;
    }
    .dashboard .card:hover {
      transform: scale(1.03);
    }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<main class="dashboard container">
  <h2 class="text-center mb-5">📊 Dashboard</h2>

  <div class="row g-4">

    <div class="col-md-4">
      <a href="add_client_form.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-people fs-1 text-success mb-3"></i>
          <h5>Client Management</h5>
          <p class="text-muted">Manage client records and details.</p>
        </div>
      </a>
    </div>

        <div class="col-md-4">
      <a href="manage_cases.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-folder2-open fs-1 text-primary mb-3"></i>
          <h5>Case Management</h5>
          <p class="text-muted">Add, view, edit, or delete legal cases.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="add_hearing_form.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-calendar-event fs-1 text-warning mb-3"></i>
          <h5>Hearing & Schedule</h5>
          <p class="text-muted">Set hearing dates and manage schedule.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="upload_form.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-upload fs-1 text-info mb-3"></i>
          <h5>Upload Documents</h5>
          <p class="text-muted">Upload case-related files & records.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="search_cases.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-search fs-1 text-danger mb-3"></i>
          <h5>Search & Filter</h5>
          <p class="text-muted">Find cases or clients by name or status.</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="reports.php" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 text-center p-4">
          <i class="bi bi-bar-chart-line fs-1 text-secondary mb-3"></i>
          <h5>Reports</h5>
          <p class="text-muted">Generate summaries and statistics (future feature).</p>
        </div>
      </a>
    </div>

  </div>
</main>

<?php include('footer.php'); ?>

</body>
</html>
