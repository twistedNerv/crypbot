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
        //echo "<pre>";$this->db->result->debugDumpParams();die;
        //var_dump($this->db->result);die;
        $data = $this->db->result->fetch(PDO::FETCH_ASSOC);
        //var_dump($data);die;
        $this->rowCount = $this->db->result->rowCount();
        if($this->rowCount == 1) {
            $this->session = new session();
            $this->session->set('loggedIn', true);
            $this->session->set('userId', $data[0]['id']);
            //var_dump($data[0]['id']);die;
            header('location: ../index');
        } else {
            //echo "out";
            header('location: ../login');
        }
    }
}