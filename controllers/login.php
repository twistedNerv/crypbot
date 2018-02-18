<?php

class login extends controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('login/index', false);
    }
    
    public function run() {
        $this->model->run();
    }
    
    public function logout() {
        $this->session = new session();
        $this->session->set('loggedIn', false);
        $this->session->set('userId', false);
        session_destroy();
        header('location: ../login');
        die;
    }
}