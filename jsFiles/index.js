function toggleMenu() {
  const navMenu = document.getElementById("navMenu");
  navMenu.classList.toggle("active");
}

//profile button handler in navbar

const profile = document.getElementById("profile-id");
const loginModal = document.getElementById("loginModal");

if (profile) {
    profile.addEventListener("click", function() {
const storedUser = localStorage.getItem("user");
const userEmail = storedUser ? JSON.parse(storedUser) : null;


console.log("Logged in user:", userEmail);

if (userEmail) {
    if (userEmail.trim() === "Mehedihassan6838@gmail.com") {
        window.location.href = '/client/adminDashboard/adminDashboard.php';
    } else {
        window.location.href = '/client/userDashboard/userDashboard.php';
    }
} else {
            // Not logged in, show modal
            loginModal.style.display = "flex";
        }
    });
}


//login modal close button handler
const loginCloseBtn = document.getElementById(`closeLoginModal`);
if (loginCloseBtn) {
  loginCloseBtn.addEventListener(`click`, function () {
    loginModal.style.display = `none`;
  });
}

//signup modal and close button find
const signupModal = document.getElementById(`signupModal`);
const closeSignupModal = document.getElementById(`closeSignupModal`);
const moveLoginPage = document.getElementById(`loginLink`);

//sign up link
const signupLink = document.getElementById(`signupLink`);
if (signupLink) {
  signupLink.addEventListener(`click`, function () {
    loginModal.style.display = `none`;
    signupModal.style.display = `flex`;
  });
}

//close signup modal handler
if (closeSignupModal) {
  closeSignupModal.addEventListener(`click`, function () {
    signupModal.style.display = `none`;
  });
}

//move login link handler
if (moveLoginPage) {
  moveLoginPage.addEventListener(`click`, function () {
    signupModal.style.display = `none`;
    loginModal.style.display = `flex`;
  });
}

//display current date
function displayCurrentDate() {
  const dateElement = document.getElementById("current-date");
  if (!dateElement) return;

  const date = new Date();
  // Format: "Wednesday, November 27, 2025"
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  const formattedDate = date.toLocaleDateString("en-US", options);

  dateElement.textContent = formattedDate;
}

// Add a listener to close the menu when a link is clicked
document.addEventListener("DOMContentLoaded", () => {
  displayCurrentDate();
  const navItems = document.querySelectorAll(".main-menu-item a");
  navItems.forEach((item) => {
    item.addEventListener("click", () => {
      const navMenu = document.getElementById("navMenu");

      if (window.innerWidth <= 768 && navMenu.classList.contains("active")) {
        navMenu.classList.remove("active");
      }
    });
  });
});


//load homepage news information
document.addEventListener('DOMContentLoaded', () => {
    loadNews();
});

function loadNews() {
    let news = [];

    axios.get('http://localhost:8000/api/getAllNews')
        .then(res => {
            console.log(`All news loaded successfully`);
            news = res.data.news;
            console.log(news);
            const cardContainer = document.getElementById('card-container');
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

//search functionality
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');

    searchBtn.addEventListener('click', () => {
        const keyword = searchInput.value.trim().toLowerCase();
        filterNews(keyword);
    });

    // Optional: search on Enter key press
    searchInput.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
            const keyword = searchInput.value.trim().toLowerCase();
            filterNews(keyword);
        }
    });
});



// Global variable to store all news

let allNews = [];

function loadNews() {
    axios.get('http://localhost:8000/api/getAllNews')
        .then(res => {
            allNews = res.data.news || [];
            displayNews(allNews);
        })
        .catch(err => console.error(err));
}

function displayNews(newsArray) {
    const cardContainer = document.getElementById('card-container');
    cardContainer.innerHTML = "";

    newsArray.forEach(item => {
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
    loginModal.style.display = "flex"
}}

// let allNews = [];

// function loadNews() {
//     axios.get('http://localhost:8000/api/getAllNews')
//         .then(res => {
//             allNews = res.data.news || [];
//             displayNews(allNews);
//         })
//         .catch(err => console.error(err));
// }

// function displayNews(newsArray) {
//     const cardContainer = document.getElementById('card-container');
//     cardContainer.innerHTML = "";

//     newsArray.forEach(item => {
//         let categoryClass = '';
//         switch (item.category?.toLowerCase()) {
//             case "national": categoryClass = "bg-national"; break;
//             case "international": categoryClass = "bg-international"; break;
//             case "sports": categoryClass = "bg-sports"; break;
//             case "business": categoryClass = "bg-business"; break;
//             default: categoryClass = "bg-national";
//         }

//         cardContainer.innerHTML += `
//             <div class="card">
//                 <div class="card-image-wrapper">
//                     <img src="${item.image}" alt="${item.title}">
//                 </div>
//                 <div class="card-content">
//                     <span class="category-badge ${categoryClass}">
//                         ${item.category}
//                     </span>
//                     <h3 class="card-title">
//                         <a href="/news/${item.id}">
//                             ${item.title}
//                         </a>
//                     </h3>
//                     <p class="card-excerpt">
//                         ${item.excerpt?.substring(0, 120) || ""}
//                     </p>
//                     <div class="card-meta">
//                         <span>${item.author || "Unknown"}</span>
//                         <span class="separator">•</span>
//                         <span>${item.date || "N/A"}</span>
//                     </div>
//                 </div>
//             </div>
//         `;
//     });
// }

function filterNews(keyword) {
    if (!keyword) {
        displayNews(allNews);
        return;
    }

    const filtered = allNews.filter(item =>
        (item.title?.toLowerCase().includes(keyword)) ||
        (item.excerpt?.toLowerCase().includes(keyword)) ||
        (item.category?.toLowerCase().includes(keyword)) ||
        (item.author?.toLowerCase().includes(keyword))
    );

    displayNews(filtered);
}

const subsBtn = document.getElementById('subsBtn');
subsBtn.addEventListener('click',function (){
    if(localStorage.getItem("user")){
        window.location.href ="../../client/pages/subscription.php"
    }

    else {
        loginModal.style.display = "flex"
    }
})
