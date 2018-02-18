<?php

class help extends controller {

    function __construct() {
        parent::__construct();
        $this->view->config->setPluginStyle('help','default.css');
        $this->view->config->setPluginScript('help','default.js');
    }
    
    public function index() {
        $this->view->render('help/index');
    }
    
    public function sample1($arg1 = false, $arg2 = false) {
        $this->view->sample1 = "Optional1: " . $arg1 . "<br> Optional2: " . $arg2 . "<br>";
        $this->view->render('help/sample1');
    }
    
    public function sample2() {
        $model = new help_model();
        $this->view->sample2 = $model->sample2();
        $this->view->render('help/sample2');
    }
}