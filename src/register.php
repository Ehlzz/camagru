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
                <p>Welcome to Camagru! Join our community, share your best shots, and explore moments with friends.</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="login-component">
            <form action="../src/register.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="name" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register">Register</button>
                <div>Already have an account? <a href="login.php">Login</a></div>
            </form>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
