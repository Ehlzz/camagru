<?php
    class UserModel {

        private $_db;
        public $username;
        public $email;
        public $password;

        public function __construct($db) {
            $this->_db = $db;
        }

        private function checkIfUserExists($username, $email) {
            $stmt = $this->_db->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
            $stmt->execute(['username' => $username, 'email' => $email]);

            return ($stmt->rowCount() > 0);
        }

        public function checkUserLogs($email, $password)
        {
            $stmt = $this->_db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            
            if ($stmt->rowCount() == 0) {
                return false;
            }
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['created_at'] = $row['created_at'];
                $_SESSION['updated_at'] = $row['updated_at'];
                $_SESSION['logged_in'] = true;
                return true;
            }
            return false;
        }


        public function registerUser($username, $email, $password)
        {
            if ($this->checkIfUserExists($username, $email)) {
                return false;
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->_db->prepare("INSERT INTO users (username, email, password, created_at, updated_at) VALUES (:username, :email, :password, NOW(), NOW())");

            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $hashedPassword);
            mail('camagruehalliez@gmail.com', 'My Subject', 'pitie recoit le');
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }
?>