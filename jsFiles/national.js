document.addEventListener('DOMContentLoaded', () => {
    loadNews();
});

function loadNews() {
    let news = [];

    axios.get('http://localhost:8000/api/getNationalNews.php')
        .then(res => {
            console.log(`All news loaded successfully`);
            news = res.data.news;
            console.log(news);
            const cardContainer = document.getElementById('national-card-container');
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
                            <span class="category-badge ${categoryClass}">
                                ${item.category}
                            </span>

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

