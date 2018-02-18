<?php

class index extends controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->boxesArray = $this->model->getBoxesWithAttributesArray();
        $this->view->render('index/index', false);
    }
    
    public function empty_box() {
        $this->view->render('elements/empty_box_content', false);
    }
    
    public function new_empty_box() {
        $latestBoxData = $this->model->getLastBoxData();
        $this->view->empty_id = $latestBoxData['last_id'];
        $this->view->empty_position = $latestBoxData['max_position'] + 1; 
        $this->view->render('elements/empty_box', false);
    }
    
    public function add_box() {
        $this->model->addNewBox();
    }
    
    public function remove_box($boxId) {
        $this->model->deleteBox($boxId);
    }
    
    public function update_box($data) {
        $data = explode('-v-', $data);
        $id = str_replace('box', '', $data[0]);
        $viewPath = str_replace('-o-', '/', $data[1]);
        $this->model->updateViewPath($id, $viewPath);
    }
    
    public function save_state() {
        $paramsArray = $_REQUEST['params'];
        $this->model->savePageState($paramsArray);
    }
}