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

<nav style="background-color: rgb(17, 40, 57); padding: 10px 0;">
    <ul style="list-style-type: none; display: flex; justify-content: center;">
        <li style="margin: 0 20px;"><a href="?page=home" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Home</a></li>
        <li style="margin: 0 20px;"><a href="?page=products" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Storage Units</a></li>
        <li style="margin: 0 20px;"><a href="?page=products1" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Surface Furniture</a></li>
        <li style="margin: 0 20px;"><a href="?page=products2" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Lounges</a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true'): ?>
            <!-- If logged in, show Log Out -->
            <li style="margin: 0 20px;"><a href="?logout=true" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Log Out</a></li>
        <?php else: ?>
            <!-- If not logged in, show Log In and Sign Up -->
            <li style="margin: 0 20px;"><a href="?page=login" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Log In</a></li>
            <li style="margin: 0 20px;"><a href="?page=signup" class="nav-link" style="color: white; text-decoration: none; font-size: 18px; padding: 5px 10px; display: block; border-radius: 4px;">Sign Up</a></li>
        <?php endif; ?>
    </ul>
</nav>

<style>
    nav ul li a {
        position: relative;
        text-decoration: none;
        color: white;
        padding: 5px 10px;
        display: block;
        font-size: 18px;
        border-radius: 4px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Hover effect */
    nav ul li a:hover {
        background-color: #1E4C6D; /* Sky Blue */
        color: #fff;
        transform: translateX(5px); /* Optional, adds a little movement */
    }

    /* Active link */
    nav ul li a.active, nav ul li a.active:hover {
        background-color: #1E4C6D; /* Keep the same hover color even after click */
        color: #fff;
        transform: translateX(5px); /* Keeps the hover effect active */
    }

    /* Underline effect */
    nav ul li a.active::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: rgb(22, 195, 201); /* Underline color */
        transition: width 0.3s ease, left 0.3s ease;
    }

    /* Sliding underline effect when hovering */
    nav ul li a:hover::after {
        width: 100%;
        left: 0;
    }

    /* Underline effect stays even when link is active */
    nav ul li a.active::after {
        width: 100%;
        left: 0;
    }
</style>

<script>
    // Get all navigation links
    const navLinks = document.querySelectorAll('.nav-link');

    // Function to set the active class on the clicked link
    function setActiveLink() {
        // Remove active class from all links
        navLinks.forEach(link => link.classList.remove('active'));

        // Add active class to the clicked link
        this.classList.add('active');
    }

    // Add click event listener to each link
    navLinks.forEach(link => link.addEventListener('click', setActiveLink));

    // Optional: Check the current page from the URL and set active class accordingly
    const currentPage = window.location.search; // Consider query parameters
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
</script>
