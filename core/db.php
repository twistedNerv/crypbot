<?php

class db extends PDO {

    public $link;
    public $result;
    public $numRows;
    
    function __construct() {
        parent::__construct(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    
}