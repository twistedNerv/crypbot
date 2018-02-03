<?php

class login extends controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('index');
    }
    
    public function run() {
        $this->model->run();
    }
    
    public function logout() {
        session::destroy();
        header('location: ../login');
        exit;
    }
}