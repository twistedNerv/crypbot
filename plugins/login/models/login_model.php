<?php

class login_model extends model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run() {
        
        //TODO: password_hash
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        $this->db->link = $this->db->prepare('SELECT * FROM cb_users WHERE username = :username AND password = :password');
        $this->db->link->execute(array(
            ":username" => $username,
            ":password" => $password
        ));
        
        //$this->result = $this->db->link->fetchAll();
        $this->numRows = $this->db->link->rowCount();
        if($this->numRows == 1) {
            session::init();
            session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }
    }

    public function logoutUser() {
        
    }
}