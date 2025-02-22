<?php
session_start(); // Start the session

// Check if the logout request is made
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Log out the user and destroy the session
    session_unset();
    session_destroy();
    // Redirect to home page after logging out
    header("Location: index.php"); // Adjust the location to where you want to redirect
    exit();
}
?>
<nav>
    <ul>
      <li><a href="?page=home">Home</a></li>
      <li><a href="?page=products">Products</a></li>
      <li><a href="?page=cart">Cart</a></li>
      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
            <!-- If logged in, show Log Out -->
            <li><a href="?logout=true" id="logout">Log Out</a></li>
        <?php else: ?>
            <!-- If not logged in, show Log In -->
            <li><a href="?page=login" id="login">Log In</a></li>
            <li><a href="?page=signup" id="signup">Sign Up</a></li>
        <?php endif; ?>
    </ul>
  </nav>