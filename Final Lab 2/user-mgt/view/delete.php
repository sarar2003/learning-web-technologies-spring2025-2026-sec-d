<?php
    session_start();
    $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    $user = [];

    foreach ($users as $u) {
        if($u['id'] == $id){
            $user = $u;
            break;
        }
    }

    if(empty($user)){
        header('location: user_list.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete User</title>
</head>
<body>

        <h1>Delete User</h1>
        <a href='user_list.php'>Back </a> |
        <a href='../controller/logout.php'>logout</a> 
        <br>

        <p>Are you sure you want to delete this user?</p>

        <table border=1>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
            </tr>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['username']?></td>
                <td><?=$user['email']?></td>
            </tr>
        </table>
        <br>

        <form method="post" action="../controller/delete.php">
            <input type="hidden" name="id" value="<?=$user['id']?>"/>
            <input type="submit" name="submit" value="Confirm Delete"/>
        </form>
</body>
</html>

