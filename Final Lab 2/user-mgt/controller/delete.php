<?php
    session_start();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        
        $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
        
        
        $newUsers = [];
        for($i = 0; $i < count($users); $i++){
            if($users[$i]['id'] != $id){
                $newUsers[] = $users[$i];
            }
        }
        
        
        $_SESSION['users'] = $newUsers;
    }
    

    header('location: ../view/user_list.php');
?>
