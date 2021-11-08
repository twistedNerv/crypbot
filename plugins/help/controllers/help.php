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
    
    public function cryptopanic() {
        $this->view->sample1 = '';
        $this->view->render('help/sample1');
    }
    
    public function sample2($arg1 = false, $arg2 = false) {
        $model = new help_model();
        $this->view->sample2 = "Argument 1: " . $arg1 . "<br> Argumnt 2: " . $arg2;
        $this->view->sampleModel = $model->sample2();
        $this->view->render('help/sample2');
    }
    
    public function btcchart() {
        $this->view->render('help/btcchart');
    }
}