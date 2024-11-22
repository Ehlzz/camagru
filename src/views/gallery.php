<?php
    require_once __DIR__ . '/../controllers/SessionController.php';
    session_start();
    $sessionController = new SessionController();
    $isLoggedIn = $sessionController->getLogged();
    if ($isLoggedIn) {
        $userData = $sessionController->getAllData();
    }
    else { 
        $sessionController->redirectUser("index.php");
    }
?>

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
    <?php include 'footer.php';
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    ?>
    <section class="profile-section">
        <div class="logo-part">
            <div class="logo-text">
                <h1>Camagru</h1>
                <!-- <p>Welcome to Camagru! Share your best shots, and explore moments with friends.</p> -->
            </div>
        </div>
        <div class="gallery-section">
            <div class="title">Your Photo(s)</div>
            <div class="album-photo">
                <img class="photos" src="../../public/images/aranger.jpg"></img>
                <img class="photos" src="../../public/images/aranger.jpg"></img>
                <img class="photos" src="../../public/images/aranger.jpg"></img>
            </div>
            <div class="gallery-actions">
                <button class="add-photo-btn">Ajouter une photo</button>
            </div>

        </div>
        <div class="settings-section">

        </div>
    </section>
</body>
</html> 
