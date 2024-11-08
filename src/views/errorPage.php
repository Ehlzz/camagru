<!DOCTYPE html>
<html>
<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/caab0f2dc7.js" crossorigin="anonymous"></script>
    <script src="/public/js/main-page.js" defer></script>
</head>
<body>
    <?php include 'navbar.php'?>
    <section class="error-page">
        <div class="logo-text">
            <h1>Camagru</h1>
        </div>
        <div class="validation-text">
            <h2>Error</h2>
            <p>An error occurred, please return to the <a href="/src/views/index.php">home page</a></p>
        </div>
    </section>
    <?php include 'footer.php';
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
</body>
</html>
