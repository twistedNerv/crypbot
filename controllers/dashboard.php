<?php

class dashboard extends controller {

    function __construct() {
        parent::__construct();
        session::init();
        $logged = session::get('loggedIn');
        if($logged == false) {
            session::destroy();
            header('location: login');
            exit;
        }
    }
    
    public function index() {
        $this->view->render('dashboard/index', false);
    }
    
    public function logout() {
        session::destroy();
        header('location: ../login');
        exit;
    }
}