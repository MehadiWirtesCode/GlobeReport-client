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
  <script src="https://cdn.jsdelivr.net/npm/jwt-decode/build/jwt-decode.min.js"></script>

  <link rel="stylesheet" href="cssFiles/navbar.css">
  <link rel="stylesheet" href="cssFiles/footer.css">
  <link rel="stylesheet" href="cssFiles/loginModal.css">
  <link rel="stylesheet" href="cssFiles/toast.css">
  <link rel="stylesheet" href="cssFiles/mainContent.css">
  <script src="jsFiles/index.js" defer></script>
  <script src="jsFiles/loginSignup.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

  <nav class="navbar">
    <div class="container relative">
      <div class="hamburger" onclick="toggleMenu()">
        &#9776;
      </div>

      <div class="close-icon" onclick="toggleMenu()">
        <i class="fas fa-times"></i>
      </div>


      <div class="nav-utility-bar">

        <div class="utility-left utility-search-container">
          <div class="search-container">
            <input type="text" placeholder="Search...">
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>

        <div class="utility-right">
          <span class="text-xs text-gray-500 mr-4 hidden sm:block">Support: <a href="#"
              class="underline hover:no-underline text-black">Subscribe</a></span>

          <div class="profile-icon-wrapper">
            <a href="#" title="User Profile" id="profile-id">
              <i class="fas fa-user-circle fa-lg" style="font-size: 20px;"></i>
            </a>
          </div>
        </div>
      </div>


      <div class="nav-masthead container">
        <div class="masthead-info-left">

          <span id="current-date"></span>
          <span>Today's Paper</span>
        </div>

        <div class="masthead-logo">
          <a href="#">Globe<span>Report</span></a>
        </div>

        <div class="masthead-info-right">
          <span>S&P 500: +0.69% <i class="fas fa-arrow-up text-green-600"></i></span>
          <span class="text-xs">Market Data Provided by XYZ</span>
        </div>
      </div>


      <div class="nav-main-menu" id="navMenu">
        <ul class="main-menu-list container">

          <li class="mobile-search-item">
            <div class="search-container">
              <input type="text" placeholder="Search">
              <button type="submit">GO</button>
            </div>
          </li>
          <li class="main-menu-item"><a href="#home">Home</a></li>
          <li class="main-menu-item"><a href="#national">National</a></li>
          <li class="main-menu-item"><a href="#international">International</a></li>
          <li class="main-menu-item"><a href="#sports">Sports</a></li>
          <li class="main-menu-item"><a href="#business">Business</a></li>
          <li class="main-menu-item"><a href="#lifestyle">Lifestyle</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content section -->
  <main class="card-container" id="card-container">

  </main>
  <!-- END MAIN CONTENT SECTION -->


  <!-- Footer Section -->
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

      <!-- Quick Links -->
      <div class="footer-section links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#about">About Us</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="#reviews">Reviews</a></li>
          <li><a href="#privacy">Privacy Policy</a></li>
          <li><a href="#terms">Terms & Conditions</a></li>
          <li><a href="#sitemap">Sitemap</a></li>
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
      &copy; <span id="current-year"></span> GlobeReport. All rights reserved.
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
      <input type="text" placeholder="Username" id="signupUsername" class="omn-input" required>
      <input type="email" placeholder="Email" id="signupEmail" class="omn-input" required>
      <input type="password" placeholder="Password" id="signupPassword" class="omn-input" required>
      <input type="password" placeholder="Confirm Password" id="signupConfirmPassword" class="omn-input" required>
      <button id="submitSignup" class="omn-btn">Sign Up</button>

      <div class="signup-text">
        Already have an account? <a href="#" id="loginLink">Login</a>
      </div>
    </div>
  </div>

  <!-- toast -->
  <div id="toast-container"></div>
</body>

</html>
