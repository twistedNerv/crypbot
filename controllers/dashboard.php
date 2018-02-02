<?php

class dashboard extends controller {

    function __construct() {
        parent::__construct();
        session::init();
        if(session::get('loggedIn') == false) {
            $this->logout();
        }
    }
    
    public function index() {
        $this->view->render('dashboard/index');
    }
    
    public function logout() {
        session::destroy();
        header('location: ../login');
        exit;
    }
}