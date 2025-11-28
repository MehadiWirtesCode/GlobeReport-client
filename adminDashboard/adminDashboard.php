<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Content Management System</title>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../cssFiles/admin.css" />
  <script src="../jsFiles/admin.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="font-sans">

  <!-- Mobile Menu Button -->
  <button id="menu-toggle" class="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar-->
  <aside id="sidebar" class="sidebar sidebar-mobile-hidden">

    <!-- Logo-->
    <div class="sidebar-header">
      CMS Dashboard
    </div>

    <!-- Navigation Links -->
    <nav class="flex-grow">
      <a href="#" class="nav-link active">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
      <a href="#" class="nav-link">
        <i class="fas fa-pen-nib"></i>
        <span>Create New Post</span>
      </a>
      <a href="#" class="nav-link">
        <i class="fas fa-list"></i>
        <span>All Posts</span>
      </a>
      <a href="#" class="nav-link">
        <i class="fas fa-users"></i>
        <span>Users</span>
      </a>
    </nav>

    <!-- Logout Link -->
    <div style="padding-top: 1.5rem; border-top: 1px solid var(--border-light); margin-top: 1.5rem;">
      <a href="#" class="nav-link logout-link">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </div>
  </aside>

  <!-- Main Content Area -->
  <div class="main-content">

    <!-- Header -->
    <header class="header-bar mb-8">
      <h1 class="header-title">Welcome, Admin!</h1>
      <div style="display: flex; align-items: center;">
        <span style="color: var(--text-dark);">John Doe</span>
        <div class="user-avatar">JD</div>
      </div>
    </header>

    <!-- Section 1: Post Creation Form -->
    <section class="content-section mb-8">
      <h2 class="section-heading">
        <i class="fas fa-plus-circle" style="margin-right: 0.5rem;"></i> Create New Post
      </h2>

      <form id="post-form" class="space-y-6">

        <!-- Post Title -->
        <div>
          <label for="post-title" class="form-label">Post Title</label>
          <input type="text" id="post-title" placeholder="Enter the title of your article" class="form-input" required>
        </div>

        <!-- Author Name -->
        <div>
          <label for="post-author" class="form-label">Author Name</label>
          <input type="text" id="post-author" placeholder="Enter the author's name" class="form-input" required>
        </div>

        <!-- Category Select -->
        <div>
          <label for="post-category" class="form-label">Category</label>
          <select id="post-category" class="form-select" required>
            <option value="" disabled selected>Select a Category</option>
            <option value="technology">Technology</option>
            <option value="finance">Finance & Economy</option>
            <option value="politics">Politics</option>
            <option value="lifestyle">Lifestyle & Culture</option>
            <option value="opinion">Opinion</option>
            <option value="sports">Sports</option>
          </select>
        </div>

        <!-- Tags -->
        <div>
          <label for="post-tags" class="form-label">Tags (Comma Separated)</label>
          <input type="text" id="post-tags" placeholder="e.g., AI, regulation, privacy, innovation" class="form-input"
            required>
        </div>

        <!-- Post Content -->
        <div>
          <label for="post-content" class="form-label">Content</label>
          <textarea id="post-content" rows="8" placeholder="Write your full article content here..."
            class="form-textarea" required></textarea>
        </div>

        <!-- Image Upload Section -->
        <div class="upload-area">
          <label for="post-image" class="form-label" style="margin-bottom: 1rem;">Upload Featured Image (Preview
            below)</label>
          <input type="file" id="post-image" accept="image/*" style="display: none;" onchange="previewImage(event)"
            required>

          <div style="display: flex; flex-direction: column; align-items: center;">
            <button type="button" onclick="document.getElementById('post-image').click()" class="btn-upload">
              <i class="fas fa-upload" style="margin-right: 0.5rem;"></i> Select Image
            </button>
            <p id="file-name" style="color: #6b7280; font-size: 0.875rem; margin-top: 1rem;">No file selected.</p>

            <!-- Image Preview Area -->
            <div id="image-preview-container">
              <img id="image-preview" src="#" alt="Image Preview">
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div>
          <button type="submit" class="btn-publish" id="btn-publish">
            Publish Post
          </button>
        </div>
      </form>
    </section>


    <!-- Recent Posts Table -->
    <section class="content-section">
      <h2 class="section-heading">
        <i class="fas fa-history" style="margin-right: 0.5rem;"></i> Recent Posts
      </h2>

      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Author</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Mock Post 1 -->
            <tr>
              <td style="color: var(--accent-primary); font-weight: 500;">AI Regulation Pact Signed</td>
              <td style="color: #2563eb;">Technology</td>
              <td>Jamil Hossain</td>
              <td style="font-size: 0.875rem; color: #6b7280;">2024-10-27</td>
              <td><span class="badge badge-published">Published</span></td>
              <td>
                <button class="btn-action btn-edit"><i class="fas fa-edit"></i></button>
                <button class="btn-action btn-delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </section>

  </div>

</body>

</html>
