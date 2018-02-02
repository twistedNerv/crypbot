<?php

class login extends controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        require 'models/login_model.php';
        $model = new login_model();
        $this->view->render('login/index');
    }
}