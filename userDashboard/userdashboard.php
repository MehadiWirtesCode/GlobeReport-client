<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard - Daily News</title>
  <!-- Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../jsFiles/userdashboard.js" defer></script>
  <style>
  :root {
    --primary: #2563eb;
    --bg-gray: #f8fafc;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --border: #e2e8f0;
    --white: #ffffff;
    --success: #22c55e;
    --danger: #ef4444;
    --modal-overlay: rgba(15, 23, 42, 0.5);
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  body {
    background-color: var(--bg-gray);
    color: var(--text-main);
    display: flex;
    min-height: 100vh;
  }

  /* Sidebar Styling */
  aside {
    width: 260px;
    background: var(--white);
    border-right: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 0;
    height: 100vh;
  }

  .sidebar-header {
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
    font-weight: bold;
    font-size: 1.25rem;
  }

  nav {
    padding: 10px 16px;
    flex: 1;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    text-decoration: none;
    color: var(--text-muted);
    border-radius: 8px;
    font-size: 0.95rem;
    margin-bottom: 4px;
    transition: 0.2s;
    cursor: pointer;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
  }

  .nav-item:hover {
    background-color: #f1f5f9;
  }

  .nav-item.active {
    background-color: #eff6ff;
    color: var(--primary);
    font-weight: 600;
  }

  .logout-section {
    padding: 24px;
    border-top: 1px solid var(--border);
  }

  .btn-logout {
    color: var(--danger);
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    font-weight: 500;
    width: 100%;
    border: none;
    background: none;
    cursor: pointer;
  }

  /* Main Content */
  main {
    flex: 1;
    padding: 40px;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
  }

  .welcome-text h1 {
    font-size: 1.75rem;
    margin-bottom: 4px;
  }

  .user-avatar {
    width: 45px;
    height: 45px;
    background: #dbeafe;
    color: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    border: 2px solid #bfdbfe;
  }

  /* Stats Grid */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
  }

  .card {
    background: var(--white);
    padding: 24px;
    border-radius: 16px;
    border: 1px solid var(--border);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }

  .card-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
  }

  .icon-box {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .green-box {
    background: #f0fdf4;
    color: #16a34a;
  }

  .blue-box {
    background: #eff6ff;
    color: var(--primary);
  }

  .stat-label {
    color: var(--text-muted);
    font-size: 0.875rem;
  }

  .stat-value {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 4px;
  }

  .status-badge {
    font-size: 0.75rem;
    background: #f0fdf4;
    color: #16a34a;
    padding: 2px 8px;
    border-radius: 4px;
    margin-left: 8px;
  }

  /* Table/Detail Section */
  .detail-section {
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--border);
    overflow: hidden;
  }

  .section-title {
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
    font-weight: bold;
    font-size: 1.1rem;
  }

  .list-item {
    padding: 20px 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
  }

  .list-item:last-child {
    border-bottom: none;
  }

  .item-info {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .item-icon {
    width: 40px;
    height: 40px;
    background: #f1f5f9;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-weight: bold;
  }

  .item-name {
    font-weight: bold;
    margin-bottom: 2px;
  }

  .item-date {
    font-size: 0.8rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .item-price {
    text-align: right;
  }

  .price-text {
    font-weight: bold;
  }

  .paid-tag {
    font-size: 0.75rem;
    color: var(--success);
  }

  .empty-state {
    padding: 60px;
    text-align: center;
    color: var(--text-muted);
  }

  /* Logout Modal Styles */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--modal-overlay);
    display: none;
    /* Hidden by default */
    align-items: center;
    justify-content: center;
    z-index: 1000;
    backdrop-filter: blur(4px);
  }

  .modal {
    background: var(--white);
    width: 90%;
    max-width: 400px;
    padding: 32px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    animation: modalFadeIn 0.3s ease-out;
  }


  /* কন্টেইনারকে গ্রিড বানানো */
  #content-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    /* পাশাপাশি কার্ড বসাবে */
    gap: 20px;
    /* কার্ডের মাঝখানের গ্যাপ */
    padding: 20px 0;
  }

  /* কার্ডের ডিজাইন */
  .watch-later-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    border: 1px solid #eee;
    display: flex;
    flex-direction: column;
    /* কার্ডের ভিতরের এলিমেন্ট উপর-নিচ থাকবে */
    transition: transform 0.3s ease;
  }

  .watch-later-card:hover {
    transform: translateY(-5px);
  }

  .watch-later-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .card-body {
    padding: 15px;
  }

  .card-category {
    font-size: 12px;
    color: #1a73e8;
    font-weight: bold;
    text-transform: uppercase;
  }

  .btn-remove {
    width: 100%;
    background: #fff;
    color: #dc3545;
    /* লাল রং */
    border: 1px solid #dc3545;
    padding: 10px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    margin-top: 10px;
    transition: all 0.3s ease;
  }

  .btn-remove:hover {
    background: #dc3545;
    color: #fff;
  }

  .card-title {
    font-size: 16px;
    margin: 8px 0;
    color: #333;
    line-height: 1.4;
  }

  .btn-read {
    display: inline-block;
    margin-top: 10px;
    color: #1a73e8;
    text-decoration: none;
    font-weight: 500;
  }

  @keyframes modalFadeIn {
    from {
      opacity: 0;
      transform: scale(0.95);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .modal-icon {
    width: 60px;
    height: 60px;
    background: #fef2f2;
    color: var(--danger);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
  }

  .modal h2 {
    font-size: 1.25rem;
    margin-bottom: 8px;
    color: var(--text-main);
  }

  .modal p {
    color: var(--text-muted);
    font-size: 0.95rem;
    margin-bottom: 24px;
  }

  .modal-actions {
    display: flex;
    gap: 12px;
  }

  .btn {
    flex: 1;
    padding: 12px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
    border: none;
  }

  .btn-cancel {
    background: #f1f5f9;
    color: var(--text-main);
  }

  .btn-cancel:hover {
    background: #e2e8f0;
  }

  .btn-confirm {
    background: var(--danger);
    color: var(--white);
  }

  .btn-confirm:hover {
    background: #dc2626;
  }

  @media (max-width: 768px) {
    aside {
      display: none;
    }

    main {
      padding: 20px;
    }
  }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <aside>
    <div class="sidebar-header">
      <i data-lucide="layout"></i>
      <span>Daily News</span>
    </div>
    <nav>
      <button class="nav-item active" onclick="switchTab('overview')">
        <i data-lucide="user"></i> Overview
      </button>
      <button class="nav-item" onclick="switchTab('subscriptions')">
        <i data-lucide="credit-card"></i> Subscriptions
      </button>
      <button class="nav-item" onclick="switchTab('watch-later')">
        <i data-lucide="bookmark"></i> Watch Later
      </button>
    </nav>
    <div class="logout-section">
      <button class="btn-logout" onclick="showLogoutModal()">
        <i data-lucide="log-out"></i> Logout
      </button>
    </div>
  </aside>

  <!-- Main Content -->
  <main>
    <header>
      <div class="welcome-text">
        <h1 id="welcome-msg">User Dashboard</h1>
        <p class="stat-label" id="user-email-display">Welcome back!</p>
      </div>
      <div class="user-avatar" id="avatar-initial">U</div>
    </header>

    <!-- Stats Grid -->
    <div class="stats-grid">
      <div class="card">
        <div class="card-header">
          <div class="icon-box green-box"><i data-lucide="credit-card"></i></div>
          <span class="stat-label">STATUS</span>
        </div>
        <div class="stat-label">Active Subscription</div>
        <div class="stat-value" id="current-plan-display">
          Free <span id="active-badge" style="display:none" class="status-badge">Active</span>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="icon-box blue-box"><i data-lucide="bookmark"></i></div>
          <span class="stat-label">LIBRARY</span>
        </div>
        <div class="stat-label">Watch Later Items</div>
        <div class="stat-value" id="total-watch-items"></div>
      </div>
    </div>

    <!-- Detail Section -->
    <div class="detail-section">
      <div class="section-title" id="tab-title">Billing History</div>
      <div id="content-list">
        <!-- Data dynamically inserted here -->
        <div class="empty-state">Loading data...</div>
      </div>
    </div>
  </main>

  <!-- Logout Confirmation Modal -->
  <div class="modal-overlay" id="logoutModal">
    <div class="modal">
      <div class="modal-icon">
        <i data-lucide="log-out" style="width: 32px; height: 32px;"></i>
      </div>
      <h2>Logout Confirmation</h2>
      <p>Apni ki sure j apne account theke logout korte chan?</p>
      <div class="modal-actions">
        <button class="btn btn-cancel" onclick="hideLogoutModal()">Cancel</button>
        <button class="btn btn-confirm" onclick="handleLogout()">Logout</button>
      </div>
    </div>
  </div>

  <script>
  // Modal Functions
  function showLogoutModal() {
    document.getElementById('logoutModal').style.display = 'flex';
  }

  function hideLogoutModal() {
    document.getElementById('logoutModal').style.display = 'none';
  }

  function handleLogout() {
    localStorage.removeItem("user");
    window.location.href = "/client/index.php";
  }

  // Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById('logoutModal');
    if (event.target == modal) {
      hideLogoutModal();
    }
  }
  </script>
</body>

</html>
