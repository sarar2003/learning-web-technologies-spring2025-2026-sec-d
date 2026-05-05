const BASE_URL = "../controller/";

function openModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}

async function loadUsers() {
  const response = await fetch(BASE_URL + "list.php");
  const result = await response.json();
  if (result.success) {
    populateTable(result.data);
  } else {
    alert(result.message);
  }
}

function populateTable(users) {
  const tbody = document.getElementById("userTbody");
  tbody.innerHTML = "";
  users.forEach((user) => {
    const tr = tbody.insertRow();
    tr.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>
                <button onclick="editUser(${user.id}, '${user.username.replace(/'/g, "\\'")}', '${user.email.replace(/'/g, "\\'")}')">Edit</button> |
                <button onclick="confirmDelete(${user.id}, '${user.username.replace(/'/g, "\\'")}')">Delete</button>
            </td>
        `;
  });
}

function editUser(id, username, email) {
  document.getElementById("editId").value = id;
  document.getElementById("editUsername").value = username;
  document.getElementById("editEmail").value = email;
  openModal("editModal");
}

function confirmDelete(id, username) {
  document.getElementById("deleteId").value = id;
  document.getElementById("deleteConfirmText").textContent =
    `Delete ${username}?`;
  openModal("deleteModal");
}

async function performDelete() {
  const id = document.getElementById("deleteId").value;
  const formData = new FormData();
  formData.append("id", id);
  formData.append("submit", "1");
  const response = await fetch(BASE_URL + "delete.php", {
    method: "POST",
    body: formData,
  });
  const result = await response.json();
  alert(result.message);
  if (result.success) {
    closeModal("deleteModal");
    loadUsers();
  }
}

async function logout() {
  const response = await fetch(BASE_URL + "logout.php", {
    method: "POST",
  });
  const result = await response.json();
  if (result.success) {
    window.location.href = result.redirect;
  }
}
