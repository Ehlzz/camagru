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

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }
?>