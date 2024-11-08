<!DOCTYPE html>
<html>
<head>
    <title>Camagru - Password Reset</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/caab0f2dc7.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navbar.php'?>

    <section class="forgot-password">
        <div class="logo-text">
            <h1>Camagru</h1>
        </div>
        <div class="form-container">
            <h2>Password Reset</h2>
            <p>Enter your email address to receive a reset link:</p>
            <form action="../forgotPassword.php?action=forgotPassword" method="post">
                <input type="email" name="email" placeholder="Your email" required>
                <button type="submit">Send Reset Link</button>
            </form>
        </div>
    </section>
    <?php include 'footer.php'?>
</body>
</html>
