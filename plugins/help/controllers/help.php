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
        $this->view->sample2 = "Passed arg. 1: " . $arg1 . "<br> Passed arg. 2: " . $arg2;
        $this->view->sampleModel = $model->sample2();
        $this->view->render('help/sample2');
    }
    
    public function btcchart() {
        $this->view->render('help/btcchart');
    }
    
    public function btcbasic() {
        $this->view->render('help/btcbasic');
    }
    
    public function coinlist() {
        $this->view->render('help/coinlist');
    }
    
    public function btcdominance() {
        $this->view->render('help/btcdominance');
    }
}