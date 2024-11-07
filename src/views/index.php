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
    <?php include 'footer.php'; ?>
    <?php 
        require_once __DIR__ . '/../controllers/PasswordController.php';

        $controller = new PasswordController();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $controller->handleFormSubmission();
        } else {
            $controller->showForm();
        }

    ?>
</body>
</html>
