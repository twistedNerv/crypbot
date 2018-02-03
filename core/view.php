<?php

class view {

    function __construct() {
        
    }
    
    public function render($name, $isPlugin = true, $customTemplate = false) {
        
        $prePath = '';
        if($isPlugin) {
            $trace = debug_backtrace();
            $prePath = isset($trace[1]) ? 'plugins/' . $trace[1]['class'] . '/' : '';
        }
        
        if($customTemplate) {
            require $prePath . 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require $prePath . 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

}