<?php

class login_model extends model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function run() {
        //TODO: password_hash
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $this->db->result = $this->db->prepare('SELECT * FROM cb_users WHERE username = :username AND password = :password');
        $this->db->result->execute(array(
            ":username" => $username,
            ":password" => $password
        ));
        $data = $this->db->result->fetchAll(PDO::FETCH_ASSOC);
        $this->rowCount = $this->db->result->rowCount();
        if($this->rowCount == 1) {
            $this->session = new session();
            $this->session->set('loggedIn', true);
            $this->session->set('userId', $data[0]['id']);
            header('location: ../index');
        } else {
            header('location: ../login');
        }
    }
}