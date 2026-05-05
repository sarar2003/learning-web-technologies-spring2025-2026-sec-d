<?php
session_start();
if (!isset($_COOKIE['status']) || !isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h1>All Users (AJAX CRUD)</h1>
    <button onclick="openModal('createModal')">Create User</button>
    <a href='home.php'>Back</a> | <button onclick="logout()">Logout</button>
    <br><br>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="userTbody">
            <!-- AJAX populated -->
        </tbody>
    </table>

    <!-- Create Modal -->
    <div id="createModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('createModal')">&times;</span>
            <h2>Create User</h2>
            <form id="createForm">
                <input type="text" id="newUsername" placeholder="Username" required><br><br>
                <input type="password" id="newPassword" placeholder="Password" required><br><br>
                <input type="email" id="newEmail" placeholder="Email" required><br><br>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h2>Edit User</h2>
            <form id="editForm">
                <input type="hidden" id="editId">
                <input type="text" id="editUsername" required><br><br>
                <input type="email" id="editEmail" required><br><br>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('deleteModal')">&times;</span>
            <h2>Confirm Delete</h2>
            <p id="deleteConfirmText"></p>
            <input type="hidden" id="deleteId">
            <button onclick="performDelete()">Confirm Delete</button>
            <button onclick="closeModal('deleteModal')">Cancel</button>
        </div>
    </div>

    <script src="asset/user-crud.js"></script>
    <script>
        window.onload = loadUsers;
        document.getElementById('createForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData();
            formData.append('submit', '1');
            formData.append('username', document.getElementById('newUsername').value);
            formData.append('password', document.getElementById('newPassword').value);
            formData.append('email', document.getElementById('newEmail').value);

            const response = await fetch('../controller/signup.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            alert(result.message);
            if (result.success) {
                closeModal('createModal');
                document.getElementById('createForm').reset();
                loadUsers();
            }
        });
        document.getElementById('editForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData();
            formData.append('submit', '1');
            formData.append('id', document.getElementById('editId').value);
            formData.append('username', document.getElementById('editUsername').value);
            formData.append('email', document.getElementById('editEmail').value);

            const response = await fetch('../controller/update.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            alert(result.message);
            if (result.success) {
                closeModal('editModal');
                loadUsers();
            }
        });
    </script>
</body>
</html>
