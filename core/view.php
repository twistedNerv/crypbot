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
        // TODO: get template
        $template = 'default/';
        if($customTemplate) {
            require $prePath . 'views/' . $template . $name . '.php';
        } else {
            require 'views/' . $template . 'header.php';
            require $prePath . 'views/' . $template . $name . '.php';
            require 'views/' . $template . 'footer.php';
        }
    }

}