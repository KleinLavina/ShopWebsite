<?php
// Initialize error and success messages
$message = "";

require "backend/database_connect.php";
$db = new Database();

// Query to get the highest existing ID
$result = $db->getData("SELECT MAX(p_id) AS max_id FROM persons");
$row = $result->fetch_assoc();
$next_id = $row['max_id'] + 1; // Increment the highest ID to get the next available ID

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $idno = $next_id; // Use the generated ID
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address']; // Corrected form field
    $username = $_POST['username'];
    $passwords = $_POST['passwords'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($passwords !== $confirm_password) {
        $_SESSION['message'] = "Error: Passwords do not match!";
    } else {
        // Insert new record into the database
        $sql1 = $db->prepare("INSERT INTO persons (p_id, p_fname, p_lname, address, username, passwords) VALUES (?, ?, ?, ?, ?, ?)");
        $sql1->bind_param("ssssss", $idno, $fname, $lname, $address, $username, $passwords);

        if ($sql1->execute()) {
            // Success message
            $_SESSION['message'] = "New record created successfully!";
        } else {
            // Error in execution
            $_SESSION['message'] = "Error: Failed to execute the query. " . $sql1->error;
        }
        $sql1->close();
    }
}

// Close the database connection
$db->close();
?>

<div style="color: #f1e6c8; padding: 30px; padding-bottom: 80px; display: flex; justify-content: center; align-items: center;">
    <div style="background-color: #c6a17d; padding: 20px; border-radius: 8px; width: 450px;">
        <form method="POST" action="" style="display: flex; flex-direction: column;">
            <div style="text-align: center; color: #f1e6c8; font-size: 30px; margin: 0 0 20px 0;">
                <i>Registration</i>
            </div>

            <!-- Display success or error message -->
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="message" style="margin: 5px 0 5px 0; display: flex; justify-content: center; padding: 5px; color: white; border-radius: 30px; <?php echo (strpos($_SESSION['message'], 'Error') !== false) ? 'background-color: red;' : 'background-color: #89f19d;'; ?>">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php unset($_SESSION['message']); ?> <!-- Clear the session message after displaying it -->
            <?php endif; ?>

            <!-- First Name and Last Name input fields -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <div style="flex: 1; margin-right: 10px;">
                    <label for="fname" style="display: block; margin-bottom: 5px; color: #f1e6c8;">First Name:</label>
                    <input type="text" id="fname" name="fname" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Enter First Name">
                </div>
                <div style="flex: 1; margin-left: 10px;">
                    <label for="lname" style="display: block; margin-bottom: 5px; color: #f1e6c8;">Last Name:</label>
                    <input type="text" id="lname" name="lname" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Enter Last Name">
                </div>
            </div>

            <!-- Address input field -->
            <div style="margin-bottom: 10px;">
                <label for="address" style="display: block; margin-bottom: 5px; color: #f1e6c8;">Address:</label>
                <input type="text" id="course" name="course" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Enter Address">
            </div>

            <!-- Username input field -->
            <div style="margin-bottom: 10px;">
                <label for="username" style="display: block; margin-bottom: 5px; color: #f1e6c8;">Username:</label>
                <input type="text" id="username" name="username" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Enter Username">
            </div>

            <!-- Password and Confirm Password fields -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <div style="flex: 1; margin-right: 10px;">
                    <label for="passwords" style="display: block; margin-bottom: 5px; color: #f1e6c8;">Password:</label>
                    <input type="password" id="passwords" name="passwords" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Enter Password">
                </div>
                <div style="flex: 1; margin-left: 10px;">
                    <label for="confirm_password" style="display: block; margin-bottom: 5px; color: #f1e6c8;">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e;" required placeholder="Confirm Password">
                </div>
            </div>

            <!-- Submit Button -->
            <div>
    <input type="submit" value="Submit" 
        style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; 
        background-color: #8e5e3e; color: #f1e6c8; cursor: pointer; font-family: 'Georgia', serif; font-size: 16px;">
    </div>

        </form>
    </div>
</div>
<link href="https://fonts.googleapis.com/css2?family=Garamond&display=swap" rel="stylesheet">
<style>
    body, label, input, button {
        font-family: 'Garamond', serif; /* Apply Garamond font */
    }
</style>