<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact - Legal Case Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap and Icons -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<?php if (isset($_SESSION['status'])): ?>
  <div class="container mt-3">
    <div class="alert alert-info text-center">
      <?php 
        echo $_SESSION['status']; 
        unset($_SESSION['status']); 
      ?>
    </div>
  </div>
<?php endif; ?>


<section id="contact" class="contact section">
  <div class="container section-title" data-aos="fade-up">
    <span>Get in Touch</span>
    <h2>Contact</h2>
    <p>If you have any questions or need support regarding the case management system, feel free to reach out to us.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <!-- Contact Info -->
      <div class="col-lg-5">
        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p>Mirpur, Azad Kashmir (Pakistan)</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+9230989898983</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>info@example.com</p>
            </div>
          </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53448.20783111786!2d73.7006222298884!3d33.14815688308642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391feb8b4d030e19%3A0x4ec2b8053d7b1051!2sNew%20Mirpur%20City!5e0!3m2!1sen!2s!4v1750214734080!5m2!1sen!2s" width="450" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-7">
        <?php if (isset($_SESSION['msg'])): ?>
          <div class="alert alert-info"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
        <?php endif; ?>

        <form action="messages.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <label for="name-field" class="pb-2">Your Name</label>
              <input type="text" name="name" id="name-field" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label for="email-field" class="pb-2">Your Email</label>
              <input type="email" class="form-control" name="email" id="email-field" required>
            </div>

            <div class="col-md-12">
              <label for="subject-field" class="pb-2">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject-field" required>
            </div>

            <div class="col-md-12">
              <label for="message-field" class="pb-2">Message</label>
              <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
