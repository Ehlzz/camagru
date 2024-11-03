<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
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
            <form action="../src/login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <div>First time here? <a href="register.php">Register</a></div>
            </form>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
