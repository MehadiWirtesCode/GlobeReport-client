document.addEventListener('DOMContentLoaded', () => {
    loadNews();
});

function loadNews() {
    let news = [];

    axios.get('http://localhost:8000/api/getSportsNews.php')
        .then(res => {
            console.log(`All news loaded successfully`);
            news = res.data.news;
            console.log(news);
            const cardContainer = document.getElementById('sports-card-container');
            cardContainer.innerHTML = "";

            news.forEach(item => {

                let categoryClass = '';
                switch (item.category?.toLowerCase()) {
                    case "national": categoryClass = "bg-national"; break;
                    case "international": categoryClass = "bg-international"; break;
                    case "sports": categoryClass = "bg-sports"; break;
                    case "business": categoryClass = "bg-business"; break;
                    default: categoryClass = "bg-national";
                }

        cardContainer.innerHTML += `
            <div class="card">
                <div class="card-image-wrapper">
                    <img src="${item.image}" alt="${item.title}">
                </div>
                <div class="card-content">
                    <div class="card-top-row" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="category-badge ${categoryClass}">
                            ${item.category}
                        </span>

                        <button onclick="addToWatchLater('${item.id}')" class="watch-later-btn">
                           <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 5px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                           </svg>
                           Watch Later
                        </button>
                    </div>

                    <h3 class="card-title">
                        <a href="/news/${item.id}">
                            ${item.title}
                        </a>
                    </h3>
                    <p class="card-excerpt">
                        ${item.excerpt?.substring(0, 120) || ""}
                    </p>
                    <div class="card-meta">
                        <span>${item.author || "Unknown"}</span>
                        <span class="separator">•</span>
                        <span>${item.date || "N/A"}</span>
                    </div>
                </div>
            </div>
        `;
            });
        })
        .catch(err => console.error(err));
}

function addToWatchLater(newsId) {

    if(localStorage.getItem("user")){
        const storedUser = localStorage.getItem("user");
        const userEmail = storedUser ? JSON.parse(storedUser) : null;
    axios.post('http://localhost:8000/api/addToWatchLater', { id: newsId,
        userEmail: userEmail
     })
        .then(response => {
            console.log("Added to watch later:", newsId)
    alert("Saved to Watch Later!");})
        .catch(error => {
            console.error("Error adding to watch later:", error);
            alert("Failed to save to Watch Later.");
        });
}

else{
    alert('please login first');
}}
