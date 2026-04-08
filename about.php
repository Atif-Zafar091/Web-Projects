<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About - Legal Case Manager</title>
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

  <!-- Custom Blur Box Styling -->
  <style>
 .about-box {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  padding: 25px;
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
  color: #000;
  font-size:16px;
  transition: background 0.3s ease, transform 0.3s ease;
}

.about-box:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateY(-3px);
}

  </style>
</head>
<body>

  <?php include 'navbar.php'; ?>

  <!-- About Section -->
  <section id="about" class="about section py-5">
    <div class="container" data-aos="fade-up">
      <div class="section-title text-center mb-4">
        <span data-aos="fade-up" data-aos-delay="100">About Us</span>
        <h2 data-aos="fade-up" data-aos-delay="200">About</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="about-box" data-aos="fade-up" data-aos-delay="300">
            <p>
              The Legal Case Management System is designed to help lawyers manage clients, cases, hearings, and documents efficiently. 
              It streamlines day-to-day legal operations, reduces manual workload, and ensures better time and data management. 
              With a secure, user-friendly interface, it empowers legal professionals to stay organized and focused on what matters most.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include ('footer.php');; 
  ?>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>
</html>
