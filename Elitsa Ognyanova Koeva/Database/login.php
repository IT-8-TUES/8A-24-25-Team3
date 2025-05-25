<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Frontend/Elitsa_css2.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" href="../../Logo(Nikola)/game-shop-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../Nikolа/Frontend/scroll-to-top.css">
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
                    <a href="../../Nikolа/Frontend/nikola1.html">Feedback</a>
                </div>
                <div class="nav-buttons">
                    <a href="../Database/login.php"><button class="nav-btn">Log In</button></a>
                    <a href="../Database/signup.php"><button class="nav-btn primary">Sign Up</button></a>
                </div>
            </div>
        </nav>
    </header>
    <button onclick="topFunction()" id="scroll-to-top" class="scroll-to-top-button" title="Scroll to top">&#11165;</button>
    <div class="signup-container">
        <div class="signup-content">
            <h1>Login</h1>
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
            <form action="login_process.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
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
    <script src="../Backend/scroll-to-top.js"></script>
</body>
</html>