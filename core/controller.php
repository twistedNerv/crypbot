<?php

class controller {

    function __construct() {
        $this->view = new View();
    }

    public function load_model($name) {
        $file = 'models/' . $name . '_model.php';

        if(file_exists($file)) {
            require 'models/' . $name . '_model.php';
            $modelName = $name . '_model';
            $this->model = new $modelName();
        } 
    }
}