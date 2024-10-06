<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div class="content">
        <div class="text">
            Login Form
        </div>
        <form action="login.php" method="post">
            <div class="field">
                <input type="text" name="email_or_phone" required>
                <span class="fas fa-user"></span>
                <label>Email or Phone</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <span class="fas fa-lock"></span>
                <label>Password</label>
            </div>
            <div class="forgot-pass">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Sign in</button>
            <div class="sign-up">
                Not a member?
                <a href="reg.html">Signup now</a>
            </div>
        </form>
    </div>
    <script src="login.js"></script>
</body>
</html>

