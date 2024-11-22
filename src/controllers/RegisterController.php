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

        public function verifyCode($code)
        {
            $stmt = $this->database->prepare("
                SELECT * FROM user_verification
                WHERE verification_code = :code 
                AND expiration_date > NOW() 
                AND verified = 0
            ");
            $stmt->bindValue(':code', $code);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $updateStmt = $this->database->prepare("
                    UPDATE user_verification 
                    SET verified = 1 
                    WHERE verification_code = :code
                ");
                $updateStmt->bindValue(':code', $code);
                $updateStmt->execute();

                return true;
            } else {
                return false;
            }
        }

        private function sendEmail($email) {
            $regex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';

            if (!preg_match($regex, $email)) {
                echo "Email invalide";
                return (false);
            }

            require '../vendor/autoload.php';

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'camagruehalliez@gmail.com';
                $mail->Password = 'sekz lunc rypd irua';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                
                $mail->setFrom('camagruehalliez@gmail.com', 'Votre Nom');
                $mail->addAddress($email);
                
                $verificationCode = uniqid('verify_', true);
                
                $verificationLink = 'http://localhost:3000/src/verification.php?action=' . urlencode($verificationCode);
                
                $mail->isHTML(true);
                $mail->Subject = 'Camagru Account Verification';
                $mail->Body    = "
                    <h1>Welcome to Camagru</h1>
                    <p>Thank you for signing up. To verify your account, please click the link below:</p>
                    <p><a href='$verificationLink'>Click here to verify your account</a></p>
                    <p>If you did not request this registration, you can ignore this email.</p>
                    <p>Verification Code: <strong>$verificationCode</strong></p>
                    <p>Thank you,</p>
                    <p>The Camagru Team</p>
                ";
                $this->userModel->registerVerification($email, $verificationCode);
                
                if (!$mail->send()) {
                    echo 'The message could not be sent.';
                    echo 'Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Verification email sent successfully!';
                }
                    
            } catch (Exception $e) {
                echo "L'e-mail n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
                return (false);
            }


            return (true);
        }

        public function handleRegister() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->userModel->username = $_POST['username'];
                $this->userModel->email = $_POST['email'];
                $this->userModel->password = $_POST['password'];
                if ($this->userModel->registerUser($this->userModel->username, $this->userModel->email, $this->userModel->password))
                {
                    echo "User registered successfully.";
                    $this->sendEmail($this->userModel->email);
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

        public function redirectUser($url) {
            header("Location: $url");
            exit();
        }
    }
?>