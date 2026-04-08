<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Services - Legal Case Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Raleway:wght@400;700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">

  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

  <!-- Header -->
  <?php include('navbar.php'); ?>
  </header>
  <!-- End Header -->

  <!-- Main content -->
  <main class="main py-5" style="min-height: 80vh; background-color: #f8f9fa;">

    <!-- Services Section -->
    <section class="services section">
      <div class="container section-title text-center" data-aos="fade-up">
        <span>Services</span>
        <h2>Services</h2>
        <p>Explore the core features that simplify legal tasks, enhance productivity, and streamline daily operations.</p>
      </div>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-activity"></i></div>
            <a href="add_client_form.php" class="stretched-link">
              <h3>Client Management</h3>
            </a>
            <p>Add, edit, or delete client records with ease, and keep all client information organized in one place.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-broadcast"></i></div>
            <a href="manage_cases.php" class="stretched-link">
              <h3>Case Management</h3>
            </a>
            <p>Create, track, and update cases linked to specific clients with clear status indicators and detailed records.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-easel"></i></div>
            <a href="add_hearing_form.php" class="stretched-link">
              <h3>Hearing Scheduling</h3>
            </a>
            <p>Schedule upcoming hearings and receive reminders for important court dates to avoid missed deadlines.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-bounding-box-circles"></i></div>
            <a href="upload_form.php" class="stretched-link">
              <h3>Document Management</h3>
            </a>
            <p>Securely upload, view, and manage legal documents for each case, with support for multiple file formats.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <a href="dashboard.php" class="stretched-link">
              <h3>Dashboard Overview</h3>
            </a>
            <p>Get instant summaries of your legal activity—clients, cases, hearings—right after login.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-chat-square-text"></i></div>
            <a href="search_cases.php" class="stretched-link">
              <h3>Search & Filters</h3>
            </a>
            <p>Easily find clients or cases using intelligent search and filter options by title, name, or status.</p>
          </div>
        </div>

      </div>
    </section>

  </main>

  <?php include 'footer.php'; ?>

  <!-- JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
