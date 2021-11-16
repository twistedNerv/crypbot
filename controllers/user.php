<?php

class user extends controller {

    public $id;
    public $username;
    public $password;
    public $nickname;
    public $location;
    public $description;
    public $level;
    public $active;
    public $lastloginDT;
    public $lastloginIP;
    public $createdDT;
    public $createdIP;
    public $theme;
    
    function __construct() {
        $this->model = new user_model();
        $this->fillLoggedUser();
    }
    
    public function getById($id) {
        return $this->model->getUserById($id);
    }
    
    public function fillLoggedUser() {
        $this->session = new session();
        $userData = $this->getById($this->session->get('userId'));
        $this->id           = $userData['id'];  
        $this->username     = $userData['username'];
        $this->password     = $userData['password'];
        $this->nickname     = $userData['nickname'];
        $this->location     = $userData['location'];
        $this->description  = $userData['description'];
        $this->level        = $userData['level'];
        $this->active       = $userData['active'];
        $this->lastloginDT  = $userData['lastloginDT'];
        $this->lastloginIP  = $userData['lastloginIP'];
        $this->createdDT    = $userData['createdDT'];
        $this->createdIP    = $userData['createdIP'];
        $this->theme        = $userData['theme'];
        return $this;
    }
}