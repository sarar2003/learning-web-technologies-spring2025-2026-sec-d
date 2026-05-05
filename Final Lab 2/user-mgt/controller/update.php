<?php
session_start();
$isAjax = true;

if(isset($_POST['submit'])){
    require_once '../model/User.php';

    $userModel = new UserModel();
    $id = $_POST['id'] ?? '';
    $u = $_POST['username'] ?? '';
    $e = $_POST['email'] ?? '';

    if($id === '' || $u === '' || $e === ''){
        $response = ['success' => false, 'message' => 'Null value found!'];
    } else if ($userModel->update($id, $u, $e)) {
        $response = ['success' => true, 'message' => 'User updated!'];
    } else {
        $response = ['success' => false, 'message' => 'Update failed'];
    }

    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        echo $response['message'] ?? 'Invalid request';
        if($response['success']){
            header('location: ../view/user_list.php');
        }
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request! Please submit form'];
    if($isAjax){
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        echo $response['message'];
    }
}
?>

