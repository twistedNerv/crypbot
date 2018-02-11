<?php

class controller {

    function __construct() {
        $this->view = new View();
    }

    public function load_model($name, $path) {
        $file = $path . 'models/' . $name . '_model.php';

        if(file_exists($file)) {
            require $path . 'models/' . $name . '_model.php';
            $modelName = $name . '_model';
            $this->model = new $modelName();
        } 
    }
}