const tBody = document.getElementById('userTableBody');
const userCount = document.getElementById('userCount');

axios.get('http://localhost:8000/api/users')
  .then(response => {

    const users = response.data.users;

    if (!Array.isArray(users)) {
      console.error("Invalid users data", users);
      return;
    }

    userCount.textContent = users.length;
    tBody.innerHTML = '';

    users.forEach(user => {
      const row = document.createElement('tr');

      row.innerHTML = `
        <td>
          <div class="user-info">
            <strong>${user.name}</strong>
          </div>
        </td>
        <td>${user.email}</td>
        <td>
          <span class="badge ${user.role === 1 ? 'badge-admin' : 'badge-user'}">
            ${user.role === 1 ? 'Admin' : 'User'}
          </span>
        </td>
        <td>${new Date(user.createdAt).toLocaleDateString()}</td>
        <td style="text-align: center;">
          <button
            class="btn-remove"
            data-user-id="${user.id}"
            onclick="openModal(this)">
            Remove
          </button>
        </td>
      `;

      tBody.appendChild(row);
    });
  })
  .catch(error => {
    console.error("Error fetching users:", error);
  });
