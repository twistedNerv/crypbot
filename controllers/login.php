<?php

class login extends controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('login/index');
    }
    
    public function run() {
        $this->model->run();
    }
}