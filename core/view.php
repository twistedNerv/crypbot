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
        // TODO: get template from user
        $template = 'default/';
        if($customTemplate || $name != trim('index/index')) {
            require $prePath . 'views/' . $template . $name . '.php';
        } else {
            require 'views/' . $template . 'header/index.php';
            require 'views/' . $template . 'header/menu.php';
            foreach($this->boxesArray as $singleBoxArray) {
                $this->render_box($template, $singleBoxArray);
            }
            require 'views/' . $template . 'footer.php';
        }
    }
    
    public function render_box($template, $singleBoxArray) {
        $this->boxId        = $singleBoxArray['id'];
        $this->boxWidth     = $singleBoxArray['width'];
        $this->boxHeight    = $singleBoxArray['height'];
        $this->boxPosition  = $singleBoxArray['position'];
        if($singleBoxArray['viewpath'] != 'elements/new_empty_box')
            require 'views/' . $template . 'elements/box.php';
        
        echo file_get_contents(URL . $singleBoxArray['viewpath']);
    
        if($singleBoxArray['viewpath'] != 'elements/new_empty_box')
            require 'views/' . $template . 'elements/box_end.php';
    }

}