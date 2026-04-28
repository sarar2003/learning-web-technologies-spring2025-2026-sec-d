<?php
    session_start();
    if(isset($_POST['submit'])){
        $username   = $_REQUEST['username'];
        $password   = $_REQUEST['password'];
        $email      = $_REQUEST['email'];

        if($username == "" || $password == "" || $email == ""){
                echo "null username/password/email!";
        }else{
           
           $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
           
           
           $newId = count($users) + 1;
           
           
           $user = [
               'id' => $newId,
               'username' => $username,
               'password' => $password,
               'email' => $email
           ];
           
           
           $users[] = $user;
           
           
           $_SESSION['users'] = $users;
           $_SESSION['username'] = $username;
           
           header('location: ../view/user_list.php');
        }
    }else{
        echo "invalid request! please submit form...";
    }

?>
