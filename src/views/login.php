<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="/public/js/main-page.js" defer></script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <section class="login-section">
        <div class="logo-part">
            <div class="logo-text">
                <h1>Camagru</h1>
                <p>Welcome to Camagru! Share your best shots, and explore moments with friends.</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="login-component">
            <form action="../login.php" method="post">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" class="login-button">Log in</button>
            </form>
            <?php 
                if (isset($_GET['action']) && $_GET['action'] === 'failed') {
                    echo '<div class="error-message">Incorrect password/email</div>';
                }
            ?>
            <div class="forget-password"><a href="forgotPasswordForm.php">Forgot password?</a></div>
        </div>
        <button id="register-button">Create new account</button>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
