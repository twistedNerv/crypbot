<?php

class view {
    
    public $boxValue = [];
    
    function __construct() {
        $this->config = new config();
    }
    
    public function render($name, $isPlugin = true, $customTemplate = false) {
        $prePath = '';
        if($isPlugin) {
            $trace = debug_backtrace();
            $prePath = isset($trace[1]) ? 'plugins/' . $trace[1]['class'] . '/' : '';
        }
        
        if($customTemplate || $name != trim('index/index')) {
            require $prePath . 'views/' . $this->config->getParam('template'). '/' . $name . '.php';
        } else {
            require 'views/' . $this->config->getParam('template') . '/header/index.php';
            require 'views/' . $this->config->getParam('template') . '/header/menu.php';
            foreach($this->boxesArray as $singleBoxArray) {
                $this->render_box($this->config->getParam('template'), $singleBoxArray);
            }
            require 'views/' . $this->config->getParam('template') . '/footer.php';
        }
    }
    
    public function render_box($template, $singleBoxArray) {
        $this->boxValue = ['id'         => $singleBoxArray['id'], 
                            'width'     => $singleBoxArray['width'],
                            'height'    => $singleBoxArray['height'],
                            'position'  => $singleBoxArray['position']];
        if($singleBoxArray['viewpath'] != 'elements/new_empty_box')
            require 'views/' . $template . '/elements/box.php';
         $this->file_get_contents_curl(URL . $singleBoxArray['viewpath']);
        if($singleBoxArray['viewpath'] != 'elements/new_empty_box')
            require 'views/' . $template . '/elements/box_end.php';
    }
    
    private function file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        echo $data;
    }
}