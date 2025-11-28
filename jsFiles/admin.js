        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-mobile-hidden');
            sidebar.classList.toggle('sidebar-mobile-visible');
        });

        // Close sidebar when clicking outside on mobile
        document.querySelector('.main-content').addEventListener('click', () => {
            if (window.innerWidth < 768 && sidebar.classList.contains('sidebar-mobile-visible')) {
                sidebar.classList.remove('sidebar-mobile-visible');
                sidebar.classList.add('sidebar-mobile-hidden');
            }
        });

        // Function to preview the selected image
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const fileNameDisplay = document.getElementById('file-name');

            if (fileInput.files && fileInput.files[0]) {
                const file = fileInput.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    fileNameDisplay.textContent = `Selected: ${file.name}`;
                }

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                preview.src = "#";
                previewContainer.style.display = 'none';
                fileNameDisplay.textContent = "No file selected.";
            }
        }

        // Form submission handler 
document.getElementById('post-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();

    formData.append("title", document.getElementById('post-title').value);
    formData.append("author", document.getElementById('post-author').value);
    formData.append("category", document.getElementById('post-category').value);
    formData.append("tags", document.getElementById('post-tags').value);
    formData.append("content", document.getElementById('post-content').value);

    const imageFile = document.getElementById('post-image').files[0];
    if (imageFile) {
        formData.append("image", imageFile);
    }

    axios.post("http://localhost:8000/api/posts", formData, {
        headers: {
            "Content-Type": "multipart/form-data"
        }
    })
    .then(response => {
        alert("Post created successfully!");

        document.getElementById('post-form').reset();
        document.getElementById('image-preview-container').style.display = "none";
    })
    .catch(error => {
        console.error(error);
        alert("Error publishing post.");
    });
});

