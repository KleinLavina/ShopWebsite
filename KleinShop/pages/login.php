 <style>
    .login-backg{
        display:flex;
        justify-content:center;
        align-items: center;
        margin: 50px;
    }
    .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .form-input:focus {
            outline: none;
            border-color: #007BFF;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .forgot-password {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
        }
 </style>
 <div class="login-backg">
 <div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <input type="text" name="username" placeholder="Username" class="form-input" required>
            <input type="password" name="password" placeholder="Password" class="form-input" required>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>
    </div>