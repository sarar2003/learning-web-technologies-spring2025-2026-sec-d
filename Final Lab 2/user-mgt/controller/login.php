<?php
session_start();
$isAjax = true;


if(isset($_POST['submit'])){
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';

    if($u === '' || $p === ''){
        $response = ['success' => false, 'message' => 'Null username/password!'];
    } else {
        require_once '../model/User.php';
        $userModel = new UserModel();
        $user = $userModel->findByUsernamePassword($u, $p);
        if ($user) {
            $_SESSION['username'] = $u;
            setcookie('status', true, time() + 3000, '/');
            $response = ['success' => true, 'message' => 'Login successful'];
        } else {
            $response = ['success' => false, 'message' => 'Invalid user!'];
        }

    }
    
    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        if($response['success'] ?? false){
            header('location: ../view/home.php');
        } else {
            echo $response['message'];
        }
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request!'];
    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        echo $response['message'];
    }
}

?>

