<?php
$isAjax = true;


require_once '../model/User.php';
$userModel = new UserModel();

$id = $_POST['id'] ?? $_GET['id'] ?? null;

if($id !== null){
    if ($userModel->delete($id)) {
        $response = ['success' => true, 'message' => 'User deleted!'];
    } else {
        $response = ['success' => false, 'message' => 'Delete failed'];
    }
} else {
    $response = ['success' => false, 'message' => 'No ID'];
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
