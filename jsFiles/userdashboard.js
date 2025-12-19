const totalWatchItems = document.getElementById('total-watch-items');

document.addEventListener('DOMContentLoaded', () => {
    const storeUser = localStorage.getItem('user');
    if (storeUser) {
        const email = JSON.parse(storeUser).trim();
        loadWatchCount(email);
        switchTab('overview', null);
    }
});

function loadWatchCount(email) {
    axios.get('http://localhost:8000/api/getTotalWatchLaterItems', {
        params: { email: email }
    })
    .then(res => {
        if (totalWatchItems) totalWatchItems.textContent = res.data.totalWatchLaterItems;
    })
    .catch(err => console.error(err));
}

function switchTab(tab, event = null) {
    const listContainer = document.getElementById('content-list');
    const tabTitle = document.getElementById('tab-title');
    const storeUser = localStorage.getItem('user');

    if (!storeUser) return;
    const email = JSON.parse(storeUser).trim();

    document.querySelectorAll('.nav-item').forEach(btn => btn.classList.remove('active'));

    if (event && event.currentTarget) {
        event.currentTarget.classList.add('active');
    } else {
        const defaultBtn = document.querySelector(`.nav-item[onclick*="${tab}"]`);
        if (defaultBtn) defaultBtn.classList.add('active');
    }

    listContainer.innerHTML = '<div class="empty-state">Loading...</div>';

    if (tab === 'overview') {
        tabTitle.textContent = "Account Overview";
        listContainer.innerHTML = `
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <div style="background:#f8f9fa; padding:20px; border-radius:10px; border:1px solid #ddd;">
                    <h4 style="margin:0; font-size:14px; color:#666;">Total Library Items</h4>
                    <p style="font-size:24px; font-weight:bold; margin:10px 0;">${totalWatchItems.textContent || 0}</p>
                </div>
                <div style="background:#f8f9fa; padding:20px; border-radius:10px; border:1px solid #ddd;">
                    <h4 style="margin:0; font-size:14px; color:#666;">User Email</h4>
                    <p style="font-size:16px; font-weight:bold; margin:10px 0; word-break: break-all;">${email}</p>
                </div>
            </div>
        `;
    }
    else if (tab === 'subscriptions') {
        tabTitle.textContent = "My Subscriptions";
        axios.get('http://localhost:8000/api/getSubscriptionHistory', { params: { email } })
        .then(res => {
            const history = res.data.history;
            if (!history || history.length === 0) {
                listContainer.innerHTML = '<div class="empty-state">No subscriptions found.</div>';
                return;
            }

            let tableHtml = `
                <table style="width:100%; border-collapse: collapse; background:white;">
                    <thead>
                        <tr style="text-align:left; border-bottom:2px solid #eee;">
                            <th style="padding:12px;">Plan</th>
                            <th style="padding:12px;">Amount</th>
                            <th style="padding:12px;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            history.forEach(item => {
                const date = new Date(item.created_at).toLocaleDateString();
                tableHtml += `
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:12px;"><span style="background:#e3f2fd; color:#1a73e8; padding:4px 8px; border-radius:4px; font-weight:bold;">${item.level}</span></td>
                        <td style="padding:12px;">$${item.amount}</td>
                        <td style="padding:12px;">${date}</td>
                    </tr>
                `;
            });
            tableHtml += `</tbody></table>`;
            listContainer.innerHTML = tableHtml;
        })
        .catch(() => {
            listContainer.innerHTML = '<div class="empty-state">Failed to load subscriptions.</div>';
        });
    }
    else if (tab === 'watch-later') {
        tabTitle.textContent = "Watch Later Library";
        axios.get('http://localhost:8000/api/getUserWatchLater', { params: { email } })
        .then(res => {
            const news = res.data.news;
            if (!news || news.length === 0) {
                listContainer.innerHTML = `<div class="empty-state">Your watch later list is empty.</div>`;
                return;
            }

            listContainer.innerHTML = news.map(item => `
                <div class="watch-later-card" id="card-${item.id}">
                    <img src="${item.image}" alt="news">
                    <div class="card-body">
                        <span class="card-category">${item.category}</span>
                        <h4 class="card-title">${item.title}</h4>
                        <div class="card-actions">
                            <a href="news-details.php?id=${item.id}" class="btn-read">Read</a>
                            <button onclick="removeFromWatchLater('${item.id}')" class="btn-remove">Remove</button>
                        </div>
                    </div>
                </div>
            `).join('');
        })
        .catch(() => {
            listContainer.innerHTML = `<div class="empty-state">Failed to load data.</div>`;
        });
    }
}

function removeFromWatchLater(newsId) {
    const storeUser = localStorage.getItem('user');
    const email = JSON.parse(storeUser).trim();

    if (confirm("Remove this news from your list?")) {
        axios.post('http://localhost:8000/api/removeFromWatchLater', {
            id: newsId,
            userEmail: email
        })
        .then(() => {
            const card = document.getElementById(`card-${newsId}`);
            if (card) card.remove();
            loadWatchCount(email);
        })
        .catch(() => alert("Error removing item"));
    }
}
