<!DOCTYPE html>
<html>

<?php 
    include 'views/passwordConfirmation.php';
    
    require_once __DIR__ . '/controllers/PasswordController.php';

    $action = isset($_GET['action']) ? $_GET['action'] : 'forgotPassword';

    $controller = new PasswordController();

    if ($action === 'forgotPassword' && $_POST) {
        $controller->handleFormSubmission();
    }

?>
</html>