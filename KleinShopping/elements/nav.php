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
<nav style="background-color:rgb(17, 40, 57); padding: 10px 0;">
    <ul style="list-style-type: none; display: flex; justify-content: center;">
        <li style="margin: 0 20px;"><a href="?page=home" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Home</a></li>
        <li style="margin: 0 20px;"><a href="?page=products" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Products</a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
            <!-- If logged in, show Log Out -->
            <li style="margin: 0 20px;"><a href="?logout=true" id="logout" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Log Out</a></li>
        <?php else: ?>
            <!-- If not logged in, show Log In and Sign Up -->
            <li style="margin: 0 20px;"><a href="?page=login" id="login" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Log In</a></li>
            <li style="margin: 0 20px;"><a href="?page=signup" id="signup" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Sign Up</a></li>
        <?php endif; ?>
    </ul>
</nav>
<style>
    nav ul li a:hover {
    background-color: #1E4C6D; /* Sky Blue */
    color: #fff;
    transform: translateX(5px);
     /* Optional, adds a little movement */
}

</style>
