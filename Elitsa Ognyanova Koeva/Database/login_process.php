<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: login.php");
        exit();
    }

    // Check user credentials
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: login.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Login failed: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?> 