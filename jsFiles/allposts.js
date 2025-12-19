function loadAdminPosts() {
    const listContainer = document.getElementById('admin-post-list');
    listContainer.innerHTML = '<tr><td colspan="6" class="empty-state">Loading posts...</td></tr>';

    axios.get('http://localhost:8000/api/getAllPosts')
    .then(res => {
        const posts = res.data.posts;
        if (!posts || posts.length === 0) {
            listContainer.innerHTML = '<tr><td colspan="6" class="empty-state">No posts available.</td></tr>';
            return;
        }

        listContainer.innerHTML = posts.map(post => `
            <tr id="admin-post-${post.id}">
                <td><img src="${post.image}" class="post-thumbnail"></td>
                <td><div class="post-title-text">${post.title}</div></td>
                <td><span class="badge-category">${post.category}</span></td>
                <td>${post.author}</td>
                <td>${new Date(post.date).toLocaleDateString()}</td>
                <td>
                    <button onclick="adminDeletePost('${post.id}')" class="btn-delete">
                        Delete
                    </button>
                </td>
            </tr>
        `).join('');
    })
    .catch(err => {
        listContainer.innerHTML = '<tr><td colspan="6" class="empty-state">Error loading data.</td></tr>';
    });
}

function adminDeletePost(id) {
    if (confirm("Are you sure you want to permanently delete this post?")) {
        axios.post('http://localhost:8000/api/deletePost', { id: id })
        .then(res => {
            const row = document.getElementById(`admin-post-${id}`);
            if (row) row.remove();
        })
        .catch(err => alert("Failed to delete post."));
    }
}

// Call function on page load
loadAdminPosts();
