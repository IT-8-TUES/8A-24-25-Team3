<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Not logged in.']);
    exit();
}
require_once 'db_connect.php';
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($ext), $allowed)) {
            $new_name = 'user_' . $user_id . '_' . time() . '.' . $ext;
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $upload_path = $upload_dir . $new_name;
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                $stmt = $conn->prepare('UPDATE users SET profile_pic = ? WHERE user_id = ?');
                $stmt->bind_param('si', $new_name, $user_id);
                $stmt->execute();
                $stmt->close();
                echo json_encode(['success' => true, 'filename' => $new_name]);
                exit();
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to move uploaded file.']);
                exit();
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid file type.']);
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'File upload error.']);
        exit();
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No file uploaded.']);
    exit();
} 