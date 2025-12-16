<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>International-GlobeReport</title>
  <link rel="stylesheet" href="../cssFiles/footer.css">
  <link rel="stylesheet" href="../cssFiles/mainContent.css">
  <link rel="stylesheet" href="../cssFiles/navbar.css">
  <script src="../jsFiles/international.js"></script>
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
          <li class="main-menu-item"><a href="pages/National.php">National</a></li>
          <li class="main-menu-item"><a href="#international">International</a></li>
          <li class="main-menu-item"><a href="#sports">Sports</a></li>
          <li class="main-menu-item"><a href="#business">Business</a></li>
          <li class="main-menu-item"><a href="#lifestyle">Lifestyle</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- card container -->
  <main class="card-container" id="international-card-container">

  </main>

  <!-- footer -->
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

</body>

</html>
