<?php
session_start();
$isAjax = true;


if(isset($_POST['submit'])){
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';
    $e = $_POST['email'] ?? '';

    if($u === '' || $p === '' || $e === ''){
        $response = ['success' => false, 'message' => 'Null username/password/email!'];
    } else {
        require_once '../model/User.php';
        $userModel = new UserModel();
        if ($userModel->create($u, $p, $e)) {
            $_SESSION['username'] = $u;
            setcookie('status', true, time() + 3000, '/');
            $response = ['success' => true, 'message' => 'User created successfully'];
        } else {
            $response = ['success' => false, 'message' => 'Signup failed'];
        }

    }
    
    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        if($response['success']){
            header('location: ../view/user_list.php');
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

