<!DOCTYPE html>
<html>

<?php 
    require_once __DIR__ . '/controllers/RegisterController.php';
    $action = isset($_GET['action']) ? $_GET['action'] : 'null';

    $controller = new RegisterController($action);

    if ($controller->verifyCode($action))
    {
        $controller->redirectUser("views/login.php?action=VerificationGranted");
    }
    else
    {
        $controller->redirectUser("views/login.php?action=VerificationFailed");
    }

?>
</html>