<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Game$hop</title>
    <link rel="stylesheet" href="../Frontend/Elitsa_css2.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <?php
    session_start();
    
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    ?>
    <header>
        <nav>
            <div class="nav-content">
                <a href="../Frontend/Elitsa_html1.html" class="logo">Game$hop</a>
                <div class="nav-links">
                    <a href="../Frontend/Elitsa_html1.html">Home</a>
                    <a href="../../Zhivko/frontend/zhivkoHTML.html">Games</a>
                    <a href="../../Zhivko/frontend/zhivkoHTML-2.html">Categories</a>
                    <a href="../../Nikolа/Frontend/nikola.html">About</a>
                </div>
                <div class="nav-buttons">
                    <a href="logout.php" class="nav-btn">Log Out</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="dashboard-container">
        <div class="welcome-section">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h1>
            <p>Manage your account and explore our gaming world</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>Account Information</h3>
                <p>Email: <?php echo htmlspecialchars($_SESSION['email'] ?? 'Not available'); ?></p>
                <p>Member since: <?php echo date('F Y'); ?></p>
            </div>

            <div class="dashboard-card">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="../../Zhivko/frontend/zhivkoHTML.html">Browse Games</a></li>
                    <li><a href="../../Zhivko/frontend/zhivkoHTML-2.html">View Categories</a></li>
                    <li><a href="../../Nikolа/Frontend/nikola.html">About Us</a></li>
                </ul>
            </div>

            <div class="dashboard-card">
                <h3>Account Actions</h3>
                <a href="logout.php" class="logout-btn">Log Out</a>
            </div>
        </div>
    </div>

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