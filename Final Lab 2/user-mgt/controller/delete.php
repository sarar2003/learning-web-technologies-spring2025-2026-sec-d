<?php
    session_start();
    
    $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
    
    if($id !== null){
        
        
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
