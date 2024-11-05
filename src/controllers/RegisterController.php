<?php
    
    require_once 'config/Database.php';
    require_once 'models/UserModel.php';

    class RegisterController {

        private $userModel;
        private $database;

        public function __construct() {
            $this->database = (new Database())->getConnection();
            $this->userModel = new UserModel($this->database);
        }

        public function showRegistrationForm() {
            require '../views/register.php';
        }

        public function handleRegister() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->userModel->username = $_POST['username'];
                $this->userModel->email = $_POST['email'];
                $this->userModel->password = $_POST['password'];
                if ($this->userModel->registerUser($this->userModel->username, $this->userModel->email, $this->userModel->password))
                {
                    echo "User registered successfully.";
                    header("Location: navbar.php");
                    exit();
                } else {
                    echo "User registration failed.";
                    header("Location: footer.php");
                    exit();
                }
            }
            return (1);
        }
    }
?>