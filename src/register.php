<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // include 'views/index.php';
    
    require_once __DIR__ . '/controllers/RegisterController.php';

    $action = isset($_GET['action']) ? $_GET['action'] : 'showRegister';

    $registerController = new RegisterController();
    
    if ($action === 'register') {
        $registerController->handleRegister();
    } else {
        $registerController->showErrorPage();
    }

?>