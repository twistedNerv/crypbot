<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
require 'config/globals.php';

class config {

    public $configValues = [];
    public $pluginStyles = [];
    public $pluginScripts = [];
    
    public function __construct() {
        $this->configValues = 
            [
                'template' => 'default',
                'login_active' => true,
                'display_page_menu' => true
            ];
    }
    
    public function getParam($param) {
        return $this->configValues[$param];
    }
    
    public function setParam($param, $value) {
        $this->configValues[$param] = $value;
    }
    
    public function setPluginStyle($plugin, $filename) {
        array_push($this->pluginStyles, "<link rel='stylesheet' href='" . URL . "plugins/" . $plugin . "/public/css/" . $filename . "'>");
    }
    
    public function setPluginScript($plugin, $filename) {
        array_push($this->pluginScripts, "<script type='text/javascript' src='" . URL . "plugins/" . $plugin . "/public/js/" . $filename . "'></script>");
    }
    
    public function loadAssets() {
        foreach(array_merge($this->pluginStyles, $this->pluginScripts) as $singleAsset) {
            echo $singleAsset;
        }
    }
    
    public function includeStyle($filename) {
        echo "<link rel='stylesheet' href='" . URL . "public/" . $this->getParam('template') . "/css/" . $filename . "'>";
    }
    
    public function includeScript($filename) {
        echo "<script type='text/javascript' src='" . URL . "public/" . $this->getParam('template') . "/js/" . $filename . "'></script>";
    }
    
    public function includeBootstrap($flag = true) {
        echo $flag ? '<!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
            integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>'
                : '';
    }

}