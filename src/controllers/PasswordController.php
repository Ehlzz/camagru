<?php 
    class PasswordController {
        public function showForm() {
            include 'src/views/forgotPasswordForm.php';
        }

        public function handleFormSubmission() {
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
                $email = $_POST['email'];
                UserModel::sendPasswordResetEmail($email);
                include 'src/views/passwordConfirmation.php';
            }
        }
    }
?>