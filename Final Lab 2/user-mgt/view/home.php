<?php
    session_start();
    if(!isset($_COOKIE['status']) || !isset($_SESSION['username'])){
         header('location: login.php');
         exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome Home! <?php echo $_SESSION['username']; ?></h1>
    <a href='user_list.php'>User List</a> |
    <button onclick="logout()">Logout</button>

    <script>
        async function logout() {
            try {
                const response = await fetch('../controller/logout.php', {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const result = await response.json();
                alert(result.message);
                if (result.success) {
                    window.location.href = result.redirect;
                }
            } catch (err) {
                alert('Logout error: ' + err.message);
                window.location.href = 'login.php';
            }
        }
    </script>
</body>
</html>

