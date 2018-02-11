<?php
class index_model extends model {

    public $userid = '1';
    public $pageid = '1';
    public $slug = 'index';
    public $viewpath = 'elements/empty_box';
    public $position = '99';
    public $width = '300';
    public $height = '200';
    
    function __construct() {
        parent::__construct();
    }
    
    public function getBoxData($id) {
        $this->db->result = $this->prepare('SELECT * FROM cb_boxes WHERE id = :id');
        $this->db->result->bindParam(':id', $id);
        $this->db->result->execute();
        return $this->db->result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBoxesWithAttributesArray() {
        return $this->db->selectAllResults('SELECT * FROM cb_boxes ORDER BY position');
    }
    
    public function addNewBox() {
        $this->position = $this->db->selectResult('SELECT MAX(position) as max_position FROM cb_boxes');
        $this->position = $this->position['max_position'] + 1;
        $this->db->result = $this->db->prepare('
                                INSERT INTO cb_boxes (
                                userid,
                                pageid,
                                slug,
                                viewpath,
                                position,
                                width,
                                height
                                ) VALUES (
                                :userid,
                                :pageid,
                                :slug,
                                :viewpath,
                                :position,
                                :width,
                                :height)');
        $this->db->result->bindParam(':userid', $this->userid);
        $this->db->result->bindParam(':pageid', $this->pageid);
        $this->db->result->bindParam(':slug', $this->slug);
        $this->db->result->bindParam(':viewpath', $this->viewpath);
        $this->db->result->bindParam(':position', $this->position);
        $this->db->result->bindParam(':width', $this->width);
        $this->db->result->bindParam(':height', $this->height);
        $this->db->result->execute();
    }
    
    public function deleteBox($boxId) {
        $this->db->result = $this->db->prepare('DELETE FROM cb_boxes WHERE id = :id');
        $this->db->result->bindParam(':id', $boxId);
        $this->db->result->execute();
    }
    
    public function updateViewPath($boxId, $viewPath) {
        $this->db->result = $this->db->prepare('UPDATE cb_boxes SET viewpath = :viewpath WHERE id = :id');
        $this->db->result->bindParam(':id', $boxId);
        $this->db->result->bindParam(':viewpath', $viewPath);
        $this->db->result->execute();
    }
    
    public function getLastBoxData() {
        return $this->db->selectResult('SELECT id as last_id, position as max_position FROM cb_boxes WHERE userid = 1 AND pageid = 1 ORDER BY id DESC');
    }
    
    public function savePageState($paramsArray) {
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        foreach($paramsArray as $singleParam) {
            $this->id = $singleParam[0];
            $this->width = $singleParam[1];
            $this->height = $singleParam[2];
            $this->position = $singleParam[3];
            $this->db->result = $this->db->prepare('UPDATE cb_boxes SET width = :width, height = :height, position = :position WHERE id = :id;');
            $this->db->result->bindParam(':id', $this->id);
            $this->db->result->bindParam(':width', $this->width);
            $this->db->result->bindParam(':height', $this->height);
            $this->db->result->bindParam(':position', $this->position);
            $this->db->result->execute();
        }
    }
}