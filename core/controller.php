<?php

class controller {

    protected $url;
    
    function __construct() {
        $this->view = new view();
        $page = isset($_GET['url']) ? strtok(filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL), '/') : '';
        if($this->view->config->getParam('login_active') == true && $page != 'login' ) {
            $this->session = new session();
            if(!$this->session->get('loggedIn')) {
                $this->session->destroy();
                header('location: login');
            }
        } 
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