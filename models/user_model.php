<?php

class user_model extends model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserById($id) {
        $this->db->result = $this->db->prepare('SELECT * FROM cb_users WHERE id = :id');
        $this->db->result->bindParam(':id', $id);
        $this->db->result->execute();
        return $this->db->result->fetch(PDO::FETCH_ASSOC);
    }
}