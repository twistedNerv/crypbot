<?php

class help extends controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('help/index');
    }
    
    public function sample1($arg = false) {
        $this->view->sample1 = "Inside sample1 <br> Optional: " . $arg . "<br>";
        $this->view->render('help/sample1');
    }
    
    public function sample2() {
        require 'models/help_model.php';
        $model = new help_model();
        $this->view->sample2 = $model->sample2();
        $this->view->render('help/sample2');
    }
}