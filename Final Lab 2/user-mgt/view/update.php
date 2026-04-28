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
    <title>Update User</title>
</head>
<body>

        <h1>Update User</h1>
        <a href='user_list.php'>Back </a> |
        <a href='../controller/logout.php'>logout</a> 
        <br>

    <form method="post" action="../controller/updateCheck.php">
        Id:         <input type="text" name="id" readonly value="<?=$user['id']?>"/> <br>
        Username:   <input type="text" name="username" value="<?=$user['username']?>"/> <br>
        Email:      <input type="email" name="email" value="<?=$user['email']?>"/> <br>
                    <input type="submit" name="submit" value="Update"/>
    </form>
</body>
</html>

