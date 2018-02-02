<?php

class view {

    function __construct() {
        
    }
    
    public function render($name, $custom = false) {
        
        if($custom) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

}