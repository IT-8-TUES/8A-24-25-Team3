<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    //checks if fields are empty
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: login.php");
        exit();
    }

    //checks user credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password_hash'])) {
            //sets session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            //redirects to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Login failed: " . $conn->error;
        header("Location: login.php");
        exit();
    }
}
?> 