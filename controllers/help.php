<?php

class help extends controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('help/index', false);
    }
    
    public function sample1($arg1 = false, $arg2 = false) {
        $this->view->sample1 = "Optional1: " . $arg1 . "<br> Optional2: " . $arg2 . "<br>";
        $this->view->render('help/sample1', false);
    }
    
    public function sample2() {
        require 'models/help_model.php';
        $model = new help_model();
        $this->view->sample2 = $model->sample2();
        $this->view->render('help/sample2', false);
    }
}