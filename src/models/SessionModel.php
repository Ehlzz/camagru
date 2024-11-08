<?php
    class SessionModel {

        private $logged_in = false;
        private $username = 'undefined';
        private $email = 'undefined';
        private $created_at = 'undefined';
        private $updated_at = 'undefined';
        private $userid = 'undefined';

        public function __construct() {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            if (isset($_SESSION['logged_in'])) {
                $this->logged_in = $_SESSION['logged_in'];
            }
            if (isset($_SESSION['username'])) {
                $this->username = $_SESSION['username'];
            }
            if (isset($_SESSION['user_email'])) {
                $this->email = $_SESSION['user_email'];
            }
            if (isset($_SESSION['created_at'])) {
                $this->created_at = $_SESSION['created_at'];
            }
            if (isset($_SESSION['updated_at'])) {
                $this->updated_at = $_SESSION['updated_at'];
            }
            if (isset($_SESSION['user_id'])) {
                $this->userid = $_SESSION['user_id'];
            }
        }

        public function getUsername() {
            return ($this->username);
        }

        public function getEmail() {
            return ($this->email);
        }

        public function getLogged() {
            return ($this->logged_in);
        }

        public function getCreatedAt() {
            return ($this->created_at);
        }

        public function getUpdatedAt() {
            return ($this->updated_at);
        }

        public function getUserId() {
            return ($this->userid);
        }

        public function getAllData() {
            return [
                'username' => $this->getUsername(),
                'email' => $this->getEmail(),
                'logged_in' => $this->getLogged(),
                'created_at' => $this->getCreatedAt(),
                'updated_at' => $this->getUpdatedAt(),
                'user_id' => $this->getUserId()
            ];
        }        
       
    }
?>