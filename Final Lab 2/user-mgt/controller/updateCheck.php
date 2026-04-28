<?php
    session_start();
    
    if(isset($_POST['submit'])){
        $id         = $_POST['id'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        
        if($id == "" || $username == "" || $email == ""){
            echo "null value found!";
        } else {
            
            $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
            
            
            for($i = 0; $i < count($users); $i++){
                if($users[$i]['id'] == $id){
                    $users[$i]['username'] = $username;
                    $users[$i]['email'] = $email;
                    break;
                }
            }
            
            $_SESSION['users'] = $users;
            
            
            header('location: ../view/user_list.php');
        }
    } else {
        echo "invalid request! please submit form...";
    }
?>
