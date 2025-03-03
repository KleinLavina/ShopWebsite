<div style="color:#f1e6c8; padding: 30px; padding-bottom:80px; display: flex; justify-content: center; align-items: center;">
    <div style="background-color: #c6a17d; padding: 20px; border-radius: 8px; width: 400px;">
        <form method="POST" action="pages/backend/check_login.php">
            <div style="text-align: center; color: #f1e6c8; font-size:30px; margin:0 0 20px 0; font-family: 'Garamond', serif;">
                <i>Log In</i>
            </div>
            <div style="margin-bottom: 5px;">
                <label for="username" style="display: block; margin-bottom: 5px; font-weight: bold; color: #f1e6c8; font-family: 'Garamond', serif;">USERNAME:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" 
                    style="width: 95%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e; font-family: 'Garamond', serif;" required>
            </div>

            <div style="margin-bottom: 5px;">
                <label for="passwords" style="display: block; margin-bottom: 5px; font-weight: bold; color: #f1e6c8; font-family: 'Garamond', serif;">PASSWORD:</label>
                <div style="position: relative;">
                    <input type="password" id="passwords" name="passwords" placeholder="Enter your password" 
                        style="width: 95%; padding: 10px; border-radius: 4px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e; font-family: 'Garamond', serif;" required>
                </div>
            </div>

            <div style="display: flex; align-items: center; margin:10px;">
                <img id="imgcap" onclick="reloadCaptcha();return false;" src="inc/captcha.php" alt="CAPTCHA" 
                    style="border-radius: 10px; height: 50px; width: 80px; cursor: pointer; border: 3px solid #888;">
                <input type="text" id="captcha" name="captcha" placeholder="Enter CAPTCHA" 
                    style="width: 70%; padding: 10px; margin-left: 10px; border-radius: 10px; border: 1px solid #888; background-color: #e0d6a0; color: #3e3e3e; font-family: 'Garamond', serif;" required>
            </div>

            <?php
            // Display error messages if there is any
            if (isset($_SESSION['error'])) {
                echo '<div style="color: #f0ad4e; text-align: center; margin-bottom: 10px;">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>

            <div>
                <input type="submit" value="Submit" 
                    style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #888; 
                    background-color: #8e5e3e; color: #f1e6c8; cursor: pointer; font-family: 'Garamond', serif; font-size: 16px;">
            </div>

        </form>
    </div>
</div>

<script>
// Reload CAPTCHA image
function reloadCaptcha() {
    var d = new Date();
    document.getElementById("imgcap").src = document.getElementById("imgcap").src.split('?')[0] + '?' + d.getMilliseconds();
}

// Toggle password visibility
function togglePasswordVisibility() {
    var passwordField = document.getElementById("passwords");
    var toggleIcon = document.getElementById("toggle-icon");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.className = "fa fa-eye-slash"; // Change icon to "eye-slash"
    } else {
        passwordField.type = "password";
        toggleIcon.className = "fa fa-eye"; // Change icon to "eye"
    }
}
</script>
<link href="https://fonts.googleapis.com/css2?family=Garamond&display=swap" rel="stylesheet">
<style>
    body, label, input, button {
        font-family: 'Garamond', serif; /* Apply Garamond font */
    }
</style>
