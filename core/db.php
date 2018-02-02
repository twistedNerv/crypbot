<?php

class db extends PDO {

    function __construct() {
        try {
            $this->_link = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            $this->_errors[] = $e->getMessage();
        }
    }
    
    public function __destruct() {
        $this->_link = null;
    }
    
    public function selectResult() {
        return $this->_result->fetch(PDO::FETCH_ASSOC);
    }

    public function numRows() {
        return $this->_numRows;
    }

}