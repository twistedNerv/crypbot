<?php

class error extends controller {

    function __construct() {
        parent::__construct();
    }
    
    public function file_not_exist($page) {
        $this->view->msg = "File: $page doesn't exist!<br />";
        $this->view->render('error/index');
    }

}

