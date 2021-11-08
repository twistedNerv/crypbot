<?php

class view {
    
    public $boxValue = [];
    
    function __construct() {
        $this->config = new config();
        $this->session = new session();
        if($this->session->get('loggedIn')) {
            require 'controllers/user.php';
            require 'models/user_model.php';
            $this->user = new user();
        }
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
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
        session_write_close();
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERAGENT, $useragent);
        curl_setopt( $ch, CURLOPT_COOKIE, $strCookie );
        $data = curl_exec($ch);
        curl_close($ch);
        //var_dump($data);
        //echo "--" . $data . "--";
    }
}