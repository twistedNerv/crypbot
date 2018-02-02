<?php
class bootstrap {

    function __construct() {
        
        $url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : null;
        //var_dump($url);

        $url[0] = empty($url[0]) ? 'index' : $url[0];
        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $controller = new error();
            $controller->file_not_exist($file);
            return false;
        }
        
        $controller = new $url[0];
        $controller->load_model($url[0]);
        
        if(isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } elseif(isset($url[1])) {
                $controller->{$url[1]}();
        } else {
            $controller->index();
        }
    }
}
