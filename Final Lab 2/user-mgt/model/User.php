<?php
require_once 'conn.php';

class UserModel {
    private $conn;

    function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL
        )";
        return mysqli_query($this->conn, $sql);
    }

    function getAll() {
        $result = mysqli_query($this->conn, "SELECT id, username, email FROM users ORDER BY id");
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

     function getById($id) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM users WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

     function create($username, $password, $email) {
        $stmt = mysqli_prepare($this->conn, "INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);
        return mysqli_stmt_execute($stmt);
    }

     function update($id, $username, $email) {
        $stmt = mysqli_prepare($this->conn, "UPDATE users SET username = ?, email = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $id);
        return mysqli_stmt_execute($stmt);
    }

     function delete($id) {
        $stmt = mysqli_prepare($this->conn, "DELETE FROM users WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }

     function findByUsernamePassword($username, $password) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM users WHERE username = ? AND password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
}
?>

