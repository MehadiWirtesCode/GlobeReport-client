<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GlobeReport</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;600;700&display=swap"
    rel="stylesheet">

  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="cssFiles/navbar.css">
  <link rel="stylesheet" href="cssFiles/footer.css">
  <link rel="stylesheet" href="cssFiles/loginModal.css">
  <script src="jsFiles/index.js" defer></script>

</head>

<body>

  <nav class="navbar">
    <div class="container">
      <!-- Logo Section -->
      <div class="logo">
        <a href="#">Globe<span>Report</span></a>
      </div>

      <!-- Hamburger Menu Button (for mobile) -->
      <div class="hamburger" onclick="toggleMenu()">
        &#9776;
      </div>

      <!-- Navigation Menu and Search Bar -->
      <ul class="nav-menu" id="navMenu">
        <li class="nav-item"><a href="#home">Home</a></li>
        <li class="nav-item"><a href="#national">National</a></li>
        <li class="nav-item"><a href="#international">International</a></li>
        <li class="nav-item"><a href="#sports">Sports</a></li>
        <li class="nav-item"><a href="#business">Business</a></li>
        <li class="nav-item"><a href="#lifestyle">Lifestyle</a></li>

        <li class="nav-item profile-icon">
          <a href="#" title="User Profile" id="profile-id">
            <i class="fas fa-user-circle fa-lg"></i>
          </a>
        </li>
        <li class="nav-item search-container md-visible">
          <input type="text" placeholder="Search News...">
          <button type="submit">Search</button>
        </li>

      </ul>
    </div>
  </nav>

  <!-- Content section -->
  <!-- Content section -->


  <!-- footer Section -->
  <footer class="main-footer">
    <div class="footer-container">

      <!-- Logo and About-->
      <div class="footer-section about">
        <h3>Globe<span>Report</span></h3>
        <p>We are committed to providing true and unbiased news. Our mission is to deliver news from every corner of the
          world quickly and impartially to the reader.</p>
        <div class="social-links">
          <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- Quick Links  -->
      <div class="footer-section links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="reviews.php">Reviews</a></li>
          <li><a href="privacy.php">Privacy Policy</a></li>
          <li><a href="terms.php">Terms & Conditions</a></li>
          <li><a href="sitemap.php">Sitemap</a></li>
        </ul>
      </div>

      <!-- Contact Info-->
      <div class="footer-section contact">
        <h3>Contact Information</h3>
        <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
        <p><i class="fas fa-phone-alt"></i> +880 1724953889</p>
        <p><i class="fas fa-envelope"></i> info@globereport.com</p>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom">
      &copy; <?php echo date('Y'); ?> GlobeReport. All rights reserved.
    </div>
  </footer>


  <!-- Login Modal -->
  <div id="loginModal" class="modal omn">
    <div class="modal-content omn-content">
      <span class="close" id="closeLoginModal">&times;</span>
      <h2>Login</h2>
      <input type="text" placeholder="Username" id="username" class="omn-input">
      <input type="password" placeholder="Password" id="password" class="omn-input">
      <button id="submitLogin" class="omn-btn">Login</button>

      <div class="signup-text">
        Don't have an account? <a href="#" id="signupLink">Sign Up</a>
      </div>
    </div>
  </div>

  <!-- Signup Modal -->
  <div id="signupModal" class="modal omn">
    <div class="modal-content omn-content">
      <span class="close" id="closeSignupModal">&times;</span>
      <h2>Sign Up</h2>
      <input type="text" placeholder="Username" id="signupUsername" class="omn-input">
      <input type="email" placeholder="Email" id="signupEmail" class="omn-input">
      <input type="password" placeholder="Password" id="signupPassword" class="omn-input">
      <input type="password" placeholder="Confirm Password" id="signupConfirmPassword" class="omn-input">
      <button id="submitSignup" class="omn-btn">Sign Up</button>

      <div class="signup-text">
        Already have an account? <a href="#" id="loginLink">Login</a>
      </div>
    </div>
  </div>


</body>

</html>
