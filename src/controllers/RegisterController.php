<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    require_once __DIR__ . '/../config/Database.php';
    require_once  __DIR__ . '/../models/UserModel.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class RegisterController {

        private $userModel;
        private $database;

        public function __construct() {
            $this->database = (new Database())->getConnection();
            if (!$this->database)
                echo ("Error with the database");
            $this->userModel = new UserModel($this->database);
        }

        public function showErrorPage() {
            require 'src/views/errorPage.php';
        }

        // private function verifyEmailBeforeSave($email) {
        //     $regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';

        //     if (!preg_match($regex, $email)) {
        //         echo "Email invalide";
        //         return (false);
        //     }

        //     require 'vendor/autoload.php';

        //     $mail = new PHPMailer(true);

        //     try {

        //         $mail->isSMTP();
        //         $mail->Host = 'smtp.gmail.com';
        //         $mail->SMTPAuth = true;
        //         $mail->Username = 'camagruehalliez@gmail.com';
        //         $mail->Password = '42424242quarentedeux';
        //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //         $mail->Port = 587;


        //         $mail->setFrom('camagruehalliez@gmail.com', 'Verification CAMAGRU');
        //         $mail->addAddress($user_email);
        //         $mail->addReplyTo('no-reply@example.com', 'No Reply');


        //         $mail->isHTML(true);
        //         $mail->Subject = 'Confirmation de votre email';
        //         $mail->Body    = "Cliquez sur ce lien pour confirmer votre email : 
        //                         <a href='http://votre-site.com/confirm.php?token=$token'>Confirmer votre email</a>";
                
        //         $mail->send();
        //         echo 'Email de confirmation envoyé';
        //     } catch (Exception $e) {
        //         echo "Erreur : {$mail->ErrorInfo}";
        //     }

        //     return (true);
        // }

        public function handleRegister() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->userModel->username = $_POST['username'];
                $this->userModel->email = $_POST['email'];
                $this->userModel->password = $_POST['password'];
                if ($this->userModel->registerUser($this->userModel->username, $this->userModel->email, $this->userModel->password))
                {
                    echo "User registered successfully.";
                    header("Location: views/registrationsuccess.php");
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