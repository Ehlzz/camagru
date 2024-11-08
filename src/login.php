<!DOCTYPE html>
<html>

<?php 
    require_once __DIR__ . '/controllers/LoginController.php';


    $action = isset($_GET['action']) ? $_GET['action'] : 'login';

    $controller = new LoginController();

    if ($action === 'login' && $_POST) {
        $controller->logInUser();
    }

?>
</html>