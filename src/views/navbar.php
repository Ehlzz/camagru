<?php
    require_once __DIR__ . '/../controllers/SessionController.php';
    session_start();
    $sessionController = new SessionController();
    $isLoggedIn = $sessionController->getLogged();
    if ($isLoggedIn) {
        $username = $sessionController->getUsername();
    }
?>

<script src="https://kit.fontawesome.com/caab0f2dc7.js" crossorigin="anonymous"></script>
<div class="navbar-component" >
    <ul class="navbar-menu-left">
        <li><a href="/src/views/home.php"><i class="fa-solid fa-house"></i>Home</a></li>
        <li><a href="/src/views/gallery.php"><i class="fa-solid fa-images"></i>Gallery</a></li>
        <li><a href="/src/views/camera.php"><i class="fa-solid fa-camera"></i>Camera</a></li>
    </ul>
    <ul class="navbar-menu-right">
        <?php if ($isLoggedIn): ?>
            <li><a href="/src/views/profile.php"><i class="fa-solid fa-user"></i><?= htmlspecialchars($username) ?></a></li>
            <li><a href="/src/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        <?php endif ?>
    </ul>
</div>
