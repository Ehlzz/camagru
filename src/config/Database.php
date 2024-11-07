<?php
    class Database {
        private $host = 'localhost';
        private $db_name = 'camagru_db';
        private $username = 'camagru_user';
        private $password = '42424242';
        private $conn;

        public function __construct()
        {
            $host = 'localhost';
            $db_name = 'camagru_db';
            $username = 'camagru_user';
            $password = '42424242';
            $conn;
    

        }

        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>