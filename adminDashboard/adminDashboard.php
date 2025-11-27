<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GlobeReport - Admin Dashboard</title>
  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
  /* --- General Reset & Base Styles --- */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8f8f8;
    /* Light gray canvas */
    color: #1F2937;
    /* Dark gray text */
    display: flex;
    min-height: 100vh;
  }

  a {
    text-decoration: none;
    color: inherit;
  }

  /* --- Primary Colors (Blue Accent for Tailwind Feel) --- */
  :root {
    --primary-blue-dark: #1E40AF;
    /* Deep Indigo */
    --primary-blue-light: #3B82F6;
    /* Standard Blue */
    --sidebar-dark: #1E293B;
    /* Navy/Slate for sidebar */
  }

  /* --- 1. Sidebar Styles --- */
  #sidebar {
    background-color: darkslategray;
    color: white;
    width: 256px;
    padding: 28px 16px;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 50;
    transform: translateX(-100%);
    transition: transform 0.2s ease-in-out;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    gap: 24px;
  }

  #sidebar .logo-header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 24px;
    font-weight: 900;
    padding-bottom: 16px;
    border-bottom: 1px solid #334155;
    /* Lighter border for distinction */
  }

  #sidebar .logo-header span:last-child {
    color: var(--primary-blue-light);
  }

  .sidebar-link {
    display: block;
    padding: 10px 16px;
    border-radius: 8px;
    /* More rounded */
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.2s;
    margin-top: 8px;
    color: #D1D5DB;
    /* Light gray text */
  }

  .sidebar-link:hover {
    background-color: #334155;
    color: white;
  }

  .sidebar-link.active {
    background-color: #334155;
    border-left: 4px solid var(--primary-blue-light);
    /* Blue accent */
    padding-left: 12px;
    font-weight: 600;
    color: white;
  }

  .sidebar-link span.user-id {
    margin-left: auto;
    font-size: 10px;
    font-family: monospace;
    background-color: #4B5563;
    padding: 2px 8px;
    border-radius: 4px;
    opacity: 0.85;
  }

  /* Logout Link */
  #sidebar nav a:last-child {
    margin-top: auto;
    /* Push to bottom */
    color: #9CA3AF;
  }

  /* --- 2. Main Content & Header Styles --- */
  #main-content {
    flex-grow: 1;
    transition: margin-left 0.2s ease-in-out;
    margin-left: 0;
  }

  header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 24px;
    background-color: white;
    border-bottom: 1px solid #E5E7EB;
    position: sticky;
    top: 0;
    z-index: 40;
  }

  header h1 {
    font-size: 22px;
    font-weight: 600;
  }

  #sidebarToggle {
    border: none;
    background: none;
    color: #4B5563;
    padding: 8px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 20px;
  }

  #sidebarToggle:hover {
    background-color: #F3F4F6;
  }

  .admin-profile {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .admin-profile img {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary-blue-light);
    /* Blue ring */
  }

  /* --- Dashboard Body --- */
  main {
    padding: 32px;
    /* Added constraint and centering for better wide-screen positioning */
    max-width: 1400px;
    margin: 0 auto;
  }

  #loading {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(2px);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99;
  }

  #loading span {
    margin-left: 12px;
    font-size: 18px;
    font-weight: 600;
    color: #4B5563;
  }

  /* --- Analytics Cards --- */
  .analytics-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
    margin-bottom: 40px;
  }

  .card {
    background-color: white;
    padding: 24px;
    border-radius: 8px;
    /* More rounded */
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
    /* Softer shadow */
    border-bottom: 4px solid var(--primary-blue-dark);
    /* Blue accent */
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
  }

  .card-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card-content p {
    font-size: 12px;
    color: #6B7280;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  .card-content h2 {
    font-size: 36px;
    font-weight: 800;
    margin-top: 4px;
    color: #1F2937;
  }

  .card-content i {
    font-size: 40px;
    color: #D1D5DB;
  }

  .card-footer {
    margin-top: 16px;
    font-size: 12px;
    color: #6B7280;
    display: flex;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid #F3F4F6;
  }

  .card-footer i {
    margin-right: 4px;
    font-size: 10px;
  }

  .card-footer .fa-arrow-up {
    color: #047857;
  }

  /* Tailwind green */
  .card-footer .fa-arrow-down {
    color: #DC2626;
  }

  /* Tailwind red */


  /* --- Form/Content Section --- */
  .content-section {
    background-color: white;
    padding: 32px;
    border-radius: 8px;
    /* More rounded */
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
    margin-bottom: 40px;
  }

  .content-section h2 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 24px;
    padding-bottom: 12px;
    border-bottom: 1px solid #E5E7EB;
    display: flex;
    align-items: center;
    gap: 8px;
    color: #1F2937;
  }

  .form-group {
    margin-bottom: 16px;
  }

  .form-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
  }

  .form-group input,
  .form-group select,
  .form-group textarea {
    width: 100%;
    padding: 10px 14px;
    background-color: white;
    color: #1F2937;
    border: 1px solid #D1D5DB;
    border-radius: 6px;
    /* Slightly rounded for inputs */
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    resize: vertical;
  }

  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    border-color: var(--primary-blue-light);
    box-shadow: 0 0 0 1px var(--primary-blue-light);
  }

  .form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
  }

  /* --- Buttons --- */
  .btn-group {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 24px;
  }

  .btn {
    padding: 12px 24px;
    font-weight: 600;
    border-radius: 8px;
    /* More rounded */
    cursor: pointer;
    border: none;
    transition: background-color 0.2s, box-shadow 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  #saveDraftBtn {
    background-color: #F3F4F6;
    /* Light gray */
    color: #4B5563;
    border: 1px solid #D1D5DB;
  }

  #saveDraftBtn:hover {
    background-color: #E5E7EB;
  }

  #publishBtn {
    background-color: var(--primary-blue-dark);
    /* Primary Blue */
    color: white;
    font-weight: 700;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  #publishBtn:hover {
    background-color: #1D4ED8;
  }

  /* --- Table Styles --- */
  .table-container {
    overflow-x: auto;
    border: 1px solid #E5E7EB;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead {
    background-color: #F9FAFB;
    border-bottom: 2px solid #E5E7EB;
  }

  th {
    padding: 12px 24px;
    text-align: left;
    font-size: 12px;
    font-weight: 700;
    color: #6B7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  tbody tr {
    border-bottom: 1px solid #F3F4F6;
  }

  tbody tr:hover {
    background-color: #FAFAFB;
  }

  td {
    padding: 16px 24px;
    font-size: 14px;
    color: #374151;
  }

  td button {
    color: #EF4444;
    /* Tailwind Red */
    background: none;
    border: 1px solid transparent;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 6px;
    transition: background-color 0.2s, border-color 0.2s;
    font-size: 13px;
    font-weight: 500;
  }

  td button:hover {
    background-color: #FEF2F2;
    border-color: #EF4444;
  }

  .status-badge {
    padding: 4px 10px;
    font-size: 11px;
    font-weight: 600;
    border-radius: 9999px;
    display: inline-flex;
    align-items: center;
    text-transform: capitalize;
  }

  .status-badge.published {
    background-color: #ECFDF5;
    /* Light green */
    color: #059669;
    /* Dark green */
    border: 1px solid #A7F3D0;
  }

  .status-badge.draft {
    background-color: #F3F4F6;
    color: #6B7280;
    border: 1px solid #D1D5DB;
  }


  /* --- Toast Notification --- */
  #toast-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 100;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .toast {
    padding: 16px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    color: white;
    display: flex;
    align-items: center;
    gap: 12px;
    opacity: 0;
    transition: opacity 0.3s;
    min-width: 280px;
    font-weight: 500;
  }

  .toast.success {
    background-color: var(--primary-blue-dark);
  }

  .toast.error {
    background-color: #DC2626;
  }

  /* Tailwind Red */
  .toast.info {
    background-color: #6B7280;
  }

  .toast.warning {
    background-color: #FBBF24;
    color: #374151;
  }

  /* --- Media Queries for Responsiveness --- */
  @media (min-width: 768px) {
    #sidebar {
      position: relative;
      transform: translateX(0);
    }

    #main-content {
      /* FIX: Removed redundant margin-left, as sidebar is now in flow (relative) */
      margin-left: 0;
    }

    .analytics-grid {
      grid-template-columns: repeat(3, 1fr);
    }

    .form-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    #sidebarToggle {
      display: none;
    }

    header h1 {
      display: block;
    }
  }
  </style>
</head>

<body>

  <!-- 1. Sidebar -->
  <aside id="sidebar">
    <!-- Logo/Header -->
    <div class="logo-header">
      <i class="fas fa-globe-americas"></i>
      <span>Globe</span><span>Admin</span>
    </div>

    <!-- Navigation -->
    <nav style="display: flex; flex-direction: column; flex-grow: 1;">
      <a href="#" class="sidebar-link active">
        <i class="fas fa-chart-line"></i>
        <span>Dashboard</span>
      </a>
      <a href="#content" class="sidebar-link">
        <i class="fas fa-newspaper"></i>
        <span>Content Management</span>
      </a>
      <a href="#users" class="sidebar-link">
        <i class="fas fa-users"></i>
        <span>Users</span>
        <span id="displayUserId" class="user-id"></span>
      </a>
      <a href="#settings" class="sidebar-link">
        <i class="fas fa-cog"></i>
        <span>Settings</span>
      </a>
      <a href="#logout" class="sidebar-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </nav>
  </aside>

  <!-- 2. Main Content Area -->
  <div id="main-content">
    <!-- Header and Toggle Button -->
    <header>
      <button id="sidebarToggle" class="block">
        <i class="fas fa-bars"></i>
      </button>
      <h1 class="hidden">Dashboard Overview</h1>
      <!-- Admin Profile -->
      <div class="admin-profile">
        <div style="font-size: 14px; color: #374151; text-align: right;">
          <span style="font-weight: 500;">Admin</span>
          <p style="font-size: 12px; color: #6B7280;">Super User</p>
        </div>
        <img src="https://placehold.co/40x40/1E40AF/ffffff?text=AD" alt="Admin Avatar">
      </div>
    </header>

    <!-- Dashboard Body -->
    <main>
      <!-- Loading Screen -->
      <div id="loading">
        <i class="fas fa-spinner fa-spin" style="font-size: 32px; color: var(--primary-blue-dark);"></i>
        <span>Loading Data...</span>
      </div>

      <!-- Analytics Cards -->
      <div class="analytics-grid">

        <!-- Card 1: Total Users -->
        <div class="card">
          <div class="card-content">
            <div>
              <p>Total Users</p>
              <h2 id="totalUsers">5,620</h2>
            </div>
            <i class="fas fa-users"></i>
          </div>
          <p class="card-footer">
            <i class="fas fa-arrow-up"></i>
            <span style="color: #047857;">+12.5% last month</span>
          </p>
        </div>

        <!-- Card 2: Total Articles -->
        <div class="card">
          <div class="card-content">
            <div>
              <p>Total Articles</p>
              <h2 id="totalArticles">...</h2>
            </div>
            <i class="fas fa-newspaper"></i>
          </div>
          <p class="card-footer">
            <i class="fas fa-arrow-down"></i>
            <span style="color: #DC2626;">-2.1% yesterday</span>
          </p>
        </div>

        <!-- Card 3: Pending Review -->
        <div class="card">
          <div class="card-content">
            <div>
              <p>Pending Review</p>
              <h2 id="pendingReviews">...</h2>
            </div>
            <i class="fas fa-hourglass-half"></i>
          </div>
          <p class="card-footer">
            <i class="fas fa-circle-info" style="color: #6B7280;"></i>
            <span>3 new drafts today</span>
          </p>
        </div>
      </div>

      <!-- Content Management Section -->
      <section id="content" class="content-section">
        <h2>
          <i class="fas fa-plus-circle" style="color: #4B5563;"></i>
          <span>Add New Article</span>
        </h2>

        <form id="articleForm" onsubmit="handleArticleSubmit(event)">
          <!-- Title -->
          <div class="form-group">
            <label for="articleTitle">Title</label>
            <input type="text" id="articleTitle" name="title" placeholder="Enter article title..." required>
          </div>

          <!-- Category and Tags -->
          <div class="form-grid">
            <div class="form-group">
              <label for="articleCategory">Category</label>
              <select id="articleCategory" name="category" required>
                <option value="">Select a Category</option>
                <option value="Technology">Technology</option>
                <option value="Finance">Finance</option>
                <option value="Politics">Politics</option>
                <option value="Sports">Sports</option>
                <option value="Lifestyle">Lifestyle</option>
              </select>
            </div>
            <div class="form-group">
              <label for="articleTags">Tags (comma separated)</label>
              <input type="text" id="articleTags" name="tags" placeholder="e.g. AI, Tech, Regulation">
            </div>
          </div>

          <!-- Content -->
          <div class="form-group">
            <label for="articleContent">Content</label>
            <textarea id="articleContent" name="content" rows="10" placeholder="Write the main article content..."
              required></textarea>
          </div>

          <!-- Button Group -->
          <div class="btn-group">
            <button type="submit" id="saveDraftBtn" class="btn">
              <i class="fas fa-file-alt"></i>
              Save as Draft
            </button>
            <button type="submit" id="publishBtn" class="btn">
              <i class="fas fa-upload"></i>
              Publish
            </button>
          </div>
        </form>
      </section>

      <!-- Recent Articles Table -->
      <section id="recent-articles" class="content-section">
        <h2>
          <i class="fas fa-list-alt" style="color: #4B5563;"></i>
          <span>Recent Articles</span>
        </h2>

        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="articleTableBody">
              <!-- Real-time data will load here -->
            </tbody>
          </table>
        </div>
      </section>

    </main>

  </div>

  <!-- Toast Notification Modal -->
  <div id="toast-container">
    <!-- Toast notifications will appear here -->
  </div>


  <!-- JavaScript Logic (Firebase Integration) -->
  <script type="module">
  import {
    initializeApp
  } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
  import {
    getAuth,
    signInAnonymously,
    signInWithCustomToken,
    onAuthStateChanged
  } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
  import {
    getFirestore,
    addDoc,
    onSnapshot,
    collection,
    query,
    where,
    getDocs,
    deleteDoc,
    doc,
    setLogLevel
  } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

  // Firebase Setup and Initialization
  setLogLevel('Debug');
  const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
  const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');

  let app, db, auth;
  let userId = null;
  let isAuthReady = false;

  // Firestore paths (Public for News Content)
  const ARTICLES_COLLECTION_PATH = `/artifacts/${appId}/public/data/articles`;


  // Toast Notification Function
  function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    let typeClass;

    if (type === 'error') {
      typeClass = 'error';
    } else if (type === 'info') {
      typeClass = 'info';
    } else if (type === 'warning') {
      typeClass = 'warning';
    } else { // success
      typeClass = 'success';
    }

    toast.className = `toast ${typeClass} opacity-0`;
    toast.innerHTML = `<i class="fas ${getIcon(type)}"></i> <span>${message}</span>`;

    container.appendChild(toast);

    setTimeout(() => {
      toast.classList.remove('opacity-0');
    }, 10);

    setTimeout(() => {
      toast.classList.add('opacity-0');
      toast.addEventListener('transitionend', () => toast.remove());
    }, 4000);
  }

  function getIcon(type) {
    switch (type) {
      case 'error':
        return 'fa-times-circle';
      case 'info':
        return 'fa-info-circle';
      case 'warning':
        return 'fa-exclamation-triangle';
      default:
        return 'fa-check-circle';
    }
  }


  // Load Real-time Article Data
  function loadRecentArticles() {
    if (!isAuthReady || !db) return;

    const articlesRef = collection(db, ARTICLES_COLLECTION_PATH);
    const q = query(articlesRef);

    onSnapshot(q, (snapshot) => {
      const articles = [];
      let pendingCount = 0;
      let totalCount = 0;

      snapshot.forEach((doc) => {
        const data = doc.data();
        articles.push({
          id: doc.id,
          ...data
        });
        totalCount++;
        if (data.status === 'Draft') {
          pendingCount++;
        }
      });

      // Sort data by timestamp locally
      articles.sort((a, b) => {
        // Handle cases where timestamp might be missing or not a Firestore Timestamp
        const aTime = a.timestamp && typeof a.timestamp.toMillis === 'function' ? a.timestamp.toMillis() : 0;
        const bTime = b.timestamp && typeof b.timestamp.toMillis === 'function' ? b.timestamp.toMillis() : 0;
        return bTime - aTime;
      });


      // Update Analytics
      document.getElementById('totalArticles').textContent = totalCount.toLocaleString('en-US');
      document.getElementById('pendingReviews').textContent = pendingCount.toLocaleString('en-US');

      // Render Table
      renderArticleTable(articles);
    }, (error) => {
      console.error("Error loading articles:", error);
      showToast("Error loading articles.", 'error');
    });
  }

  // Table Render Function
  function renderArticleTable(articles) {
    const tbody = document.getElementById('articleTableBody');
    tbody.innerHTML = '';

    if (articles.length === 0) {
      tbody.innerHTML =
        `<tr><td colspan="5" style="padding: 16px 24px; text-align: center; color: #6B7280;">No articles found. Add a new article.</td></tr>`;
      return;
    }

    articles.forEach(article => {
      const statusText = article.status === 'Published' ? 'Published' : 'Draft';
      const statusClass = article.status === 'Published' ? 'published' : 'draft';

      const row = document.createElement('tr');

      row.innerHTML = `
                    <td>${article.title}</td>
                    <td style="color: #6B7280;">${article.category || 'N/A'}</td>
                    <td style="color: #6B7280;">${article.authorName || 'Admin'}</td>
                    <td>
                        <span class="status-badge ${statusClass}">
                            ${statusText}
                        </span>
                    </td>
                    <td>
                        <button onclick="deleteArticle('${article.id}')"><i class="fas fa-trash-alt"></i> Delete</button>
                    </td>
                `;
      tbody.appendChild(row);
    });
  }

  // Delete Article Function
  window.deleteArticle = async function(articleId) {
    console.log(`Attempting to delete article: ${articleId}`);
    try {
      const docRef = doc(db, ARTICLES_COLLECTION_PATH, articleId);
      await deleteDoc(docRef);
      showToast("Article deleted successfully.", 'info');
    } catch (e) {
      console.error("Error deleting document: ", e);
      showToast("Failed to delete article.", 'error');
    }
  }

  // Article Submit Handler
  window.handleArticleSubmit = async function(event) {
    event.preventDefault();

    const form = document.getElementById('articleForm');
    const title = form.querySelector('#articleTitle').value.trim();
    const category = form.querySelector('#articleCategory').value;
    const tags = form.querySelector('#articleTags').value.trim();
    const content = form.querySelector('#articleContent').value.trim();
    const submitButton = event.submitter;

    if (!title || !category || !content) {
      showToast("Please fill out all required fields.", 'error');
      return;
    }

    if (!db) {
      showToast("Failed to connect to the database.", 'error');
      return;
    }

    const status = (submitButton.id === 'publishBtn') ? 'Published' : 'Draft';

    const newArticle = {
      title: title,
      category: category,
      tags: tags.split(',').map(tag => tag.trim()).filter(tag => tag.length > 0),
      content: content,
      authorId: userId,
      authorName: 'Admin',
      status: status,
      timestamp: new Date(),
    };

    submitButton.disabled = true;
    const originalText = submitButton.id === 'publishBtn' ? 'Publish' : 'Save as Draft';
    const loadingText = status === 'Published' ? 'Publishing' : 'Saving';
    const originalIcon = submitButton.id === 'publishBtn' ? 'fa-upload' : 'fa-file-alt';

    submitButton.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${loadingText}...`;

    try {
      const articlesRef = collection(db, ARTICLES_COLLECTION_PATH);
      await addDoc(articlesRef, newArticle);

      showToast(`Article saved successfully as "${status}".`, 'success');
      form.reset();
    } catch (e) {
      console.error("Error adding document: ", e);
      showToast("Failed to save article.", 'error');
    } finally {
      submitButton.disabled = false;
      submitButton.innerHTML = `<i class="fas ${originalIcon}"></i> ${originalText}`;
    }
  }

  // Firebase Auth initialization and state listener
  async function initFirebase() {
    try {
      if (Object.keys(firebaseConfig).length === 0) {
        throw new Error("Firebase config not available.");
      }

      app = initializeApp(firebaseConfig);
      db = getFirestore(app);
      auth = getAuth(app);

      // Setup Auth state listener using the created 'auth' object
      onAuthStateChanged(auth, (user) => {
        if (user) {
          userId = user.uid;
          isAuthReady = true;
          console.log("User signed in:", userId);
          // Display user ID
          document.getElementById('displayUserId').textContent = user.uid.substring(0, 4) + '...';
          loadRecentArticles(); // Load data only after auth is ready
        } else {
          userId = null;
          isAuthReady = false;
          console.log("User signed out or anonymous.");
        }
        document.getElementById('loading').style.display = 'none';
      });

      // Set initial auth state (Sign in, which will trigger onAuthStateChanged)
      if (typeof __initial_auth_token !== 'undefined' && __initial_auth_token) {
        await signInWithCustomToken(auth, __initial_auth_token);
      } else {
        await signInAnonymously(auth);
      }

    } catch (error) {
      console.error("Firebase initialization failed:", error);
      showToast("Firebase connection error: Database may not function.", 'error');
      document.getElementById('loading').style.display = 'none';
    }
  }

  // --- UI Logic ---

  // Sidebar Toggle Logic (for mobile)
  function setupSidebarToggle() {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebarToggle');
    const mainContent = document.getElementById('main-content');

    // Check if we are on desktop initially
    if (window.innerWidth >= 768) {
      sidebar.style.transform = 'translateX(0)';
      // FIX: Removed this line as the sidebar being relative already pushes main content.
      // mainContent.style.marginLeft = '256px';
    }

    toggleButton.addEventListener('click', (e) => {
      e.stopPropagation();

      // For desktop, main content needs margin to sit next to sidebar
      const isDesktop = window.innerWidth >= 768;

      // Toggle state
      const isSidebarVisible = sidebar.style.transform === 'translateX(0px)';

      if (isSidebarVisible) {
        sidebar.style.transform = 'translateX(-100%)';
        if (isDesktop) mainContent.style.marginLeft = '0';
        document.removeEventListener('click', closeSidebarOutside);
      } else {
        sidebar.style.transform = 'translateX(0)';
        // On desktop, if toggled open, maintain margin
        // if (isDesktop) mainContent.style.marginLeft = '256px'; // Also removed from here.
        document.addEventListener('click', closeSidebarOutside);
      }
    });

    // Handle window resize for responsiveness
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 768) {
        sidebar.style.transform = 'translateX(0)';
        // mainContent.style.marginLeft = '256px'; // Removed
        document.removeEventListener('click', closeSidebarOutside);
      } else {
        mainContent.style.marginLeft = '0';
        if (sidebar.style.transform !== 'translateX(0)') {
          sidebar.style.transform = 'translateX(-100%)';
        }
      }
    });
  }

  // Logic to close sidebar when clicking outside (mobile only)
  function closeSidebarOutside(event) {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebarToggle');

    if (window.innerWidth < 768 && !sidebar.contains(event.target) && !toggleButton.contains(event.target) && sidebar
      .style.transform === 'translateX(0px)') {
      sidebar.style.transform = 'translateX(-100%)';
      document.removeEventListener('click', closeSidebarOutside);
    }
  }

  // Start Firebase and setup UI when app loads
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('loading').style.display = 'flex';
    setupSidebarToggle();
    initFirebase();
  });
  </script>
</body>

</html>
