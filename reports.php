<?php
include 'db.php';
include 'navbar.php';

// Get counts
$total_cases = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM cases"))['count'];
$total_clients = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM clients"))['count'];
$total_hearings = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM hearings"))['count'];

// Case status breakdown
$open_cases = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM cases WHERE status = 'Open'"))['count'];
$closed_cases = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM cases WHERE status = 'Closed'"))['count'];
$pending_cases = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as count FROM cases WHERE status = 'in Progress'"))['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .card-summary {
      transition: transform 0.2s;
    }
    .card-summary:hover {
      transform: scale(1.02);
    }
  </style>
</head>
<body>

<main class="container my-5">
  <h2 class="text-center mb-4">📊 Reports Summary</h2>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-folder2-open fs-1 text-primary mb-2"></i>
        <h5>Total Cases</h5>
        <p class="display-6"><?= $total_cases ?></p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-people fs-1 text-success mb-2"></i>
        <h5>Total Clients</h5>
        <p class="display-6"><?= $total_clients ?></p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-calendar-event fs-1 text-warning mb-2"></i>
        <h5>Total Hearings</h5>
        <p class="display-6"><?= $total_hearings ?></p>
      </div>
    </div>

  </div>

  <h4 class="mt-5 mb-3">📁 Case Status Breakdown</h4>
  <div class="row g-4">
    
   <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-play-circle fs-1 text-primary mb-2"></i>
        <h5>Open</h5>
        <p class="fs-3"><?= $open_cases ?></p>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-hourglass-split fs-1 text-info mb-2"></i>
        <h5>in progress</h5>
        <p class="fs-3"><?= $pending_cases ?></p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-summary shadow-sm text-center p-4">
        <i class="bi bi-check-circle fs-1 text-success mb-2"></i>
        <h5>Closed</h5>
        <p class="fs-3"><?= $closed_cases ?></p>
      </div>
    </div>

   
  </div>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
