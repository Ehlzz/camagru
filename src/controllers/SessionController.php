<?php 

require_once __DIR__ . "/../models/SessionModel.php";

class SessionController {

    public $sessionModel;

    public function __construct() {
        $this->sessionModel = new SessionModel();
    }

    public function getUsername() {
        return $this->sessionModel->getUsername();
    }

    public function getEmail() {
        return $this->sessionModel->getEmail();
    }

    public function getLogged() {
        return $this->sessionModel->getLogged();
    }

    public function getCreatedAt() {
        return $this->sessionModel->getCreatedAt();
    }

    public function getUpdatedAt() {
        return $this->sessionModel->getUpdatedAt();
    }

    public function getUserId() {
        return $this->sessionModel->getUserId();
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
