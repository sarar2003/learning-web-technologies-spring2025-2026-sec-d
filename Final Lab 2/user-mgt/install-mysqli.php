<?php
require_once 'model/mysql_conn.php';
require_once 'model/UserModelmysqli.php';

$model = new UserModel();
if ($model->createTable()) {
    echo "DB 'webtech_users' and table 'users' created using mysqli! Start XAMPP MySQL 3306.";
} else {
    echo "Error creating table.";
}
?>

