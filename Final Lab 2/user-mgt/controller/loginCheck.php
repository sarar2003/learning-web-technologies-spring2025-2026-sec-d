<?php
    session_start();
    if(isset($_POST['submit'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        if($username == "" || $password == ""){
                echo "null username/password!";
        }else{
            $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
            $found = false;

            foreach($users as $user){
                if($user['username'] == $username && $user['password'] == $password){
                    $found = true;
                    $_SESSION['username'] = $username;
                    // setcookie('status', true, time()+3000, '/');
                    header('location: ../view/home.php');
                    break;
                }
            }

            if(!$found){
                echo "invalid user!";
            }
        }
    }else{
        echo "invalid request! please submit form...";
    }

?>
