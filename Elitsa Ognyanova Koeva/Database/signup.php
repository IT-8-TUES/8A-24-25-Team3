<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../Frontend/Elitsa_css2.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
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
                    <a href="../Database/login.php" class="nav-btn">Log In</a>
                    <a href="../Database/signup.php" class="nav-btn primary">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="signup-container">
        <div class="signup-content">
            <h1>Sign Up</h1>
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="success-message">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            ?>
            <form action="signup_process.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            </form>
            <p class="login-link">Already have an account? <a href="login.php">Log In</a></p>
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
           <div class = "right-section">
                <p>All rights reserved &copy; 2025 Game$hop</p>
            </div>
        </div>
    </footer>
</body>
</html>