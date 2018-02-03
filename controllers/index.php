<?php

class index extends controller {

    function __construct() {
        parent::__construct();
        session::init();
        if(session::get('loggedIn') == false) {
            $this->logout();
        }
    }
    
    public function index() {
        $this->view->render('index/index', false);
    }

}