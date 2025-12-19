<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>allposts - GlobeReport</title>
  <link rel="stylesheet" href="../cssFiles/allposts.css" />
  <script src="../jsFiles/allposts.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
  <div class="admin-container">
    <div class="admin-header">
      <h2>News Management</h2>
      <p>Manage and monitor all published articles</p>
    </div>

    <div class="table-container">
      <table class="post-list-table">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="admin-post-list">
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
