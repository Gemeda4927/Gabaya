<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #2E86C1, #58D68D);
        }
        .login-container {
            background: #fff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .login-container h2 {
            color: #222;
            margin-bottom: 25px;
        }
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }
        .input-group input {
            width: 100%;
            padding: 14px;
            border: 2px solid #2E86C1;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
            background: #f9f9f9;
        }
        .input-group input:focus {
            border-color: #1F618D;
            outline: none;
            background: #fff;
        }
        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #1F618D, #2E86C1);
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        .login-btn:hover {
            background: linear-gradient(to right, #154360, #1F618D);
            transform: scale(1.05);
        }
        .login-container p {
            margin-top: 15px;
            color: #555;
        }
        .login-container a {
            color: #1F618D;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .login-container a:hover {
            color: #154360;
        }
        .social-login {
            margin-top: 20px;
        }
        .social-login button {
            width: 100%;
            padding: 12px;
            border: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s, transform 0.2s;
        }
        .social-login button img {
            width: 20px;
            margin-right: 10px;
        }
        .google-btn {
            background: #4285F4;
            color: white;
        }
        .google-btn:hover {
            background: #2A56C6;
            transform: scale(1.05);
        }
        .facebook-btn {
            background: #4267B2;
            color: white;
        }
        .facebook-btn:hover {
            background: #365899;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="../Backend/Login.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <p>Don't have an account? <a href="#">Sign Up</a></p>
    </div>
</body>

</html>