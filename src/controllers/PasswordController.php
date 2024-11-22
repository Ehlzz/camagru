<?php 
    class PasswordController {
        public function showForm() {
            include 'src/views/forgotPasswordForm.php';
        }

        private function sendPasswordResetEmail($email)
        {
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
                $mail->Subject = 'Camagru Password Reset Request';
                $mail->Body    = "
                    <h1>Password Reset Request</h1>
                    <p>Hello,</p>
                    <p>We received a request to reset your password. To proceed, please click the link below:</p>
                    <p><a href='$resetLink'>Click here to reset your password</a></p>
                    <p>If you did not request this, please ignore this email. Your password will not be changed.</p>
                    <p>The reset link will expire in 1 hour.</p>
                    <p>Thank you,</p>
                    <p>The Camagru Team</p>
                ";
                UserModel::storePasswordResetToken($email, $resetToken);
                
                if (!$mail->send()) {
                    echo 'The message could not be sent.';
                    echo 'Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Password reset email sent successfully!';
                }
                    
            } catch (Exception $e) {
                echo "L'e-mail n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
                return (false);
            }


            return (true);
        }

        public function handleFormSubmission() {
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
                $email = $_POST['email'];
                $this->sendPasswordResetEmail($email);
                include 'src/views/passwordConfirmation.php';
            }
        }
    }
?>