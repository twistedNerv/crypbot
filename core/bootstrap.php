<?php
class bootstrap {
    
    protected $controller = 'index';
    protected $method = 'index';
    protected $params = [];
    protected $path = '';

    function __construct() {
        
        $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : null;
        
        $file = 'controllers/' . $url[0] . '.php';
        $this->slug = 'index';
        if(file_exists($file) || file_exists('plugins/' . $url[0] . '/' .  $file)) {
            $this->path = (file_exists($file)) ? '' :'plugins/' . $url[0] . '/';
            $this->controller = $this->slug = $url[0];
            unset($url[0]);
        }
        
        require $this->path . 'controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
        $this->controller->load_model($this->slug, $this->path);
        
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
