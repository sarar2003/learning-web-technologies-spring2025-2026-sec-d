<?php
$host = '127.0.0.1';
$port = '3306';
$dbname = 'webtech_users';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $dbname, $port);

if (!$conn) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'DB Connection failed: ' . mysqli_connect_error()]);
        exit;
    }
    die('DB Connection failed: ' . mysqli_connect_error());
}
$GLOBALS['conn'] = $conn;

function closeConn($conn) {
    mysqli_close($conn);
}
?>

