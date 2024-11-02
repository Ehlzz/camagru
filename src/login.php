<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label> <!-- Nouveau champ pour l'email -->
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Register">
    </form>

    <?php
    // Inclure le fichier .env
    require 'vendor/autoload.php';

    use Dotenv\Dotenv;

    // Charger le fichier .env
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Variables d'environnement pour la connexion à la base de données
    $dbHost = $_ENV['DB_HOST'];
    $dbUser = $_ENV['DB_USER'];
    $dbPass = $_ENV['DB_PASS'];
    $dbName = $_ENV['DB_NAME'];

    // Créer une connexion à la base de données
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    // Recuperer les données du formulaire de la page register.php

    $username = $_POST['username'];
    $email = $_POST['email']; // Nouvelle variable pour l'email
    $password = $_POST['password'];

    // Print the three variables
    echo $username . '<br>';
    echo $email . '<br>';
    echo $password . '<br>';
    

    $conn->exec("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    // $conn->exec("INSERT INTO users (username, email, password) VALUES ('test', 'test@gmail.com' , 'test')");
    ?>
</body>
</html>
