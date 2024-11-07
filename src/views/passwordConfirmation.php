<DOCTYPE html>
<html>
<head>
    <title>Camagru - Réinitialisation de mot de passe</title>
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
            <h2>Réinitialisation de mot de passe</h2>
            <p>Nous avons envoyé un email à ton adresse. Clique sur le lien dans cet email pour réinitialiser ton mot de passe.</p>
            <div class="mail-logo">
                <div class="mail-animation"></div>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <p>Une fois terminé, <a href="login.php">connecte-toi ici</a> avec ton nouveau mot de passe.</p>
        </div>
    </section>
    <?php include 'footer.php'?>
</body>
</html>
