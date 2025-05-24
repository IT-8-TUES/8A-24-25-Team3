<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'db_connect.php';

$user_id = $_SESSION['user_id'];
$profile_pic = '';

// Fetch current profile picture
$stmt = $conn->prepare('SELECT profile_pic FROM users WHERE user_id = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($profile_pic);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../Frontend/Elitsa_css2.css">
    <link rel="stylesheet" href="edit_profile.css">
</head>
<body>
<header>
        <nav>
            <div class="nav-content">
                <a href="user_home.html" class="logo">Game$hop</a>
                <div class="nav-links">
                    <a href="user_home.html">Home</a>
                    <a href="../../Zhivko/frontend/zhivkoHTML.html">Games</a>
                    <a href="../../Zhivko/frontend/zhivkoHTML-2.html">Categories</a>
                    <a href="../../Nikolа/Frontend/nikola.html">About</a>
                    <a href="dashboard.php">Profile</a>
                </div>
                <div class="nav-buttons">
                    <a href="logout.php" class="nav-btn">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="dashboard-container">
        <h1>Edit Profile</h1>
        <div id="message"></div>
        <form id="profileForm">
            <div style="margin-bottom: 1rem;">
                <label>Current Profile Picture:</label><br>
                <img id="profilePic" src="<?php echo ($profile_pic && file_exists('uploads/' . $profile_pic)) ? 'uploads/' . htmlspecialchars($profile_pic) : '';?>" alt="Profile Picture" style="max-width: 150px; border-radius: 50%; border: 2px solid #00ff88; <?php if (!$profile_pic || !file_exists('uploads/' . $profile_pic)) echo 'display:none;'; ?>">
                <span id="noPicMsg" <?php if ($profile_pic && file_exists('uploads/' . $profile_pic)) echo 'style=\"display:none;\"'; ?>>No profile picture uploaded.</span>
            </div>
            <input type="file" name="profile_pic" id="profileInput" accept="image/*" required>
            <br><br>
            <button type="submit" class="logout-btn">Upload</button>
        </form>
        <br>
        <a href="dashboard.php" class="dashboard-card">Back to Dashboard</a>
    </div>
    <script src="../Backend/edit_profile.js"></script>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@gameshop.com</p>
                <p>Phone: 123-456-7890</p>
                <p>Address: Sofia, Bulgaria</p>
            </div>
            <div class="right-section">
                <p>All rights reserved &copy; 2025 Game$hop</p>
            </div>
        </div>
    </footer>
</body>
</html> 