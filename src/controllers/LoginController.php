<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../config/Database.php';
    require_once  __DIR__ . '/../models/UserModel.php';

    class LoginController {

        private $userModel;
        private $database;

        public function __construct() {
            $this->database = (new Database())->getConnection();
            if (!$this->database)
                echo ("Error with the database");
            $this->userModel = new UserModel($this->database);
        }

        public function showForm() {
            include 'src/views/forgotPasswordForm.php';
        }

        public function logInUser() {
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $this->userModel = new UserModel($this->database);
                if ($this->userModel->checkUserLogs($email, $password))
                {
                    header("Location: views/home.php");
                    exit();
                } else {
                    header("Location: views/login.php?action=failed");
                    exit();
                }   
            }
        }

        public function logOut() {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        
            session_unset();
        
            session_destroy();
        
            header("Location: views/index.php");
            exit();
        }
        

    }
?>