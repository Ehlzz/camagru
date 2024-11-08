<?php
    require_once __DIR__ . '/../controllers/SessionController.php';
    session_start();
    $sessionController = new SessionController();
    $isLoggedIn = $sessionController->getLogged(); // Utiliser la méthode getLogged directement
    if ($isLoggedIn) {
        $username = $sessionController->getUsername();
    }
?>


<div class="navbar-component" >
    <ul class="navbar-menu-left">
        <li><a href="/src/views/index.php">Home</a></li>
        <li><a href="/src/views/gallery.php">Gallery</a></li>
    </ul>
    <ul class="navbar-menu-right">
        <?php if ($isLoggedIn): ?>
            <li><a href="/src/views/profile.php"><?= htmlspecialchars($username) ?></a></li>
            <li><a href="/src/logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="/src/views/login.php">Login</a></li>
            <li><a href="/src/views/register.php">Register</a></li>
        <?php endif; 
    var_dump($_SESSION);
        ?>
    </ul>
</div>
