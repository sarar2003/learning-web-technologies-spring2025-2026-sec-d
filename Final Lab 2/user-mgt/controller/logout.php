<?php
    session_start();
    unset($_SESSION['status']);
    unset($_SESSION['username']);
    //session_destroy();
    setcookie('status', true, time() - 10, '/');
    
$isAjax = true;

    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Logged out successfully', 'redirect' => '../view/login.php']);
        exit;
    } else {
        header('location: ../view/login.php');
    }
?>
