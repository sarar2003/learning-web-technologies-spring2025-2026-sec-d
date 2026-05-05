const BACKEND = '../controller/';

function showMessage(msg) {
    alert(msg);
}

async function sendToServer(url, data = null) {
    let options = {
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    };
    if (data) {
        options.method = 'POST';
        options.body = data;
    }
    const res = await fetch(BACKEND + url, options);
    return await res.json();
}
async function getUsersList() {
    const result = await sendToServer('getUsers.php');
    if (result.success) {
        fillUserTable(result.data);
    } else {
        showMessage(result.message);
    }
}


function fillUserTable(users) {
    const tableBody = document.getElementById('userBody');
    tableBody.innerHTML = '';
    for (let user of users) {
        let row = tableBody.insertRow();
        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>
                <button onclick="showEditForm(${user.id}, '${user.username}', '${user.email}')">Edit</button>
                <button onclick="showDeleteConfirm(${user.id}, '${user.username}')">Delete</button>
            </td>
        `;
    }
}


async function addNewUser() {
    const formData = new FormData();
    formData.append('submit', '1');
    formData.append('username', document.getElementById('newUserName').value);
    formData.append('password', document.getElementById('newPass').value);
    formData.append('email', document.getElementById('newEmail').value);

    const result = await sendToServer('signupCheck.php', formData);
    showMessage(result.message);
    if (result.success) {
        closeCreateBox();
        document.getElementById('createForm').reset();
        getUsersList();
    }
}


async function saveEdit() {
    const formData = new FormData();
    formData.append('submit', '1');
    formData.append('id', document.getElementById('editId').value);
    formData.append('username', document.getElementById('editName').value);
    formData.append('email', document.getElementById('editEmail').value);

    const result = await sendToServer('updateCheck.php', formData);
    showMessage(result.message);
    if (result.success) {
        closeEditBox();
        getUsersList();
    }
}


async function doDelete() {
    const formData = new FormData();
    formData.append('id', document.getElementById('deleteId').value);
    formData.append('submit', '1');

    const result = await sendToServer('delete.php', formData);
    showMessage(result.message);
    if (result.success) {
        closeDeleteBox();
        getUsersList();
    }
}


// 8. Logout
async function doLogout() {
    const result = await sendToServer('logout.php');
    showMessage(result.message);
    if (result.success) {
        window.location = result.redirect;
    }
}

// Modals - Easy
function openBox(id) {
    document.getElementById(id).style.display = 'block';
}
function closeBox(id) {
    document.getElementById(id).style.display = 'none';
}

function showEditForm(id, name, email) {
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    openBox('editBox');
}
function showDeleteConfirm(id, name) {
    document.getElementById('deleteId').value = id;
    document.getElementById('deleteText').innerText = `Delete ${name}?`;
    openBox('deleteBox');
}

// Load on page ready
if (document.getElementById('userBody')) {
    getUsersList();
}
