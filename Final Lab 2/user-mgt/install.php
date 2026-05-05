<?php
require_once 'model/db.php';
require_once 'model/UserModel.php';

$model = new UserModel();
$model->createTable();

echo "DB 'webtech_users' and table 'users' created! Run XAMPP MySQL first.";
?>

