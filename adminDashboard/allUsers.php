<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>allUsers-GlobeReport</title>
  <link rel="stylesheet" href="../cssFiles/all useres.css">
  <link rel="stylesheet" href="../cssFiles/footer.css">

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../jsFiles/allusers.js " defer></script>
</head>

<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <div>
        <h1>User Management</h1>
        <p>Manage system users and permissions without any frameworks.</p>
      </div>
      <div class="stats-badge">
        Total Users: <span id="userCount"></span>
      </div>
    </div>

    <!-- Table Container -->
    <div class="table-wrapper">
      <table class="user-table">
        <thead>
          <tr>
            <th>User</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody id="userTableBody">
        </tbody>
      </table>
    </div>
  </div>

  <!-- Simple Custom Modal -->
  <div id="deleteModal" class="modal">
    <div class="modal-content">
      <h2>Confirm Removal</h2>
      <p>Are you sure you want to remove this user? This action cannot be undone.</p>
      <div class="modal-footer">
        <button class="btn-cancel" onclick="closeModal()">Cancel</button>
        <button class="btn-confirm" id="confirmDelete">Remove Now</button>
      </div>
    </div>
  </div>


  <!-- footer section -->
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

  <!-- Handle modal -->
  <script>
  let rowToDelete = null;

  function openModal(button) {
    rowToDelete = button.parentElement.parentElement;
    document.getElementById('deleteModal').style.display = 'flex';
  }

  function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
    rowToDelete = null;
  }

  // Confirm delete button
  document.getElementById('confirmDelete').onclick = function() {
    if (!rowToDelete) return;

    // Get the user id from data attribute
    const userId = rowToDelete.querySelector('.btn-remove').dataset.userId;

    // Axios DELETE request
    axios.delete('http://localhost:8000/api/delete_user', {
        data: {
          id: userId
        }
      })
      .then(response => {
        console.log(response.data.message);
        // Remove row from table
        rowToDelete.remove();
        updateCount();
        closeModal();
      })
      .catch(error => {
        console.error("Error deleting user:", error);
        alert("Failed to delete user. Check console for details.");
      });
  };

  function updateCount() {
    const count = document.querySelectorAll('#userTableBody tr').length;
    document.getElementById('userCount').textContent = count;
  }
  </script>

</body>

</html>