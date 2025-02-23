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
<nav style="background-color: #F4F1E1; padding: 10px 0; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);"> <!-- Ivory background with shadow -->
    <ul style="list-style-type: none; display: flex; justify-content: center;">
        <li style="margin: 0 20px;">
            <a href="?page=home" style="color: #704214; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">Home</a> <!-- Sepia text with shadow -->
        </li>
        <li style="margin: 0 20px;">
            <a href="?page=products" style="color: #704214; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">Products</a> <!-- Sepia text with shadow -->
        </li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
            <!-- If logged in, show Log Out -->
            <li style="margin: 0 20px;">
                <a href="?logout=true" id="logout" style="color: #704214; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">Log Out</a> <!-- Sepia text with shadow -->
            </li>
        <?php else: ?>
            <!-- If not logged in, show Log In and Sign Up -->
            <li style="margin: 0 20px;">
                <a href="?page=login" id="login" style="color: #704214; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">Log In</a> <!-- Sepia text with shadow -->
            </li>
            <li style="margin: 0 20px;">
                <a href="?page=signup" id="signup" style="color: #704214; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">Sign Up</a> <!-- Sepia text with shadow -->
            </li>
        <?php endif; ?>
    </ul>
</nav>

<style>
    nav ul li a {
        color: #704214; /* Sepia text color */
        font-family: 'Baskerville', serif; /* Apply Baskerville font */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Light shadow for text */
        transition: all 0.3s ease; /* Smooth transition for scaling and italic */
    }

    nav ul li a:hover {
        background-color: #C4A484; /* Paper brown background on hover */
        color: #F4F1E1; /* Ivory text on hover */
        transform: scale(1.1); /* Scale the element when hovered */
        font-style: italic; /* Apply italic style on hover */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Darker shadow on hover */
    }
</style>
