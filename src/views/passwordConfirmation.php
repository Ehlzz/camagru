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
        <div class="validation-text">
            <h2>Password Reset</h2>
            <p>We have sent an email to your address. Click the link in that email to reset your password.</p>
            <div class="mail-logo">
                <div class="mail-animation"></div>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <p>Once done, <a href="login.php">log in here</a> with your new password.</p>
        </div>
    </section>
    <?php include 'footer.php'?>
</body>
</html>
