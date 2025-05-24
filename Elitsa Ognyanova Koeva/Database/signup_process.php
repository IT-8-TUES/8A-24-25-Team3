<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: signup.php");
        exit();
    }

    // checks if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Username or email already exists.";
        header("Location: signup.php");
        exit();
    }

    //hashes the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //inserts the user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        $_SESSION['success'] = "User  registered successfully!";
        header("Location: login.php"); // Redirect to login page after successful signup
    } else {
        $_SESSION['error'] = "Error registering user.";
        header("Location: signup.php");
    }

    $stmt->close();
    $conn->close();
}
?>
