<?php

class db extends PDO {

    public $link;
    public $result;
    public $numRows;
    
    function __construct() {
        parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    
    public function selectResult($sql) {
        $this->result = $this->prepare($sql);
        $this->result->execute();
        return $this->result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function selectAllResults($sql) {
        $this->result = $this->prepare($sql);
        $this->result->execute();
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }
}