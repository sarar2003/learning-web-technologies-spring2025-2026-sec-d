<?php
require_once '../model/conn.php';
require_once '../model/User.php';

$userModel = new UserModel();
$users = $userModel->getAll();

if (!$GLOBALS['conn']) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'DB connection failed']);
    exit;
}

header('Content-Type: application/json');
echo json_encode(['success' => true, 'data' => $users]);
?>

