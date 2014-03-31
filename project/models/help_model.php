<?php

class help_model { 
	use b_model;
	/**
	* Gets all the topics
	* @return array 
	**/
    public function getTopicsList() {
        $this->database->query('SELECT id,topic FROM help');
        return $this->database->returnObject();
    }
    /**
    * @param int id
    * Gets an article by id
    **/
    public function getArcticle($id) {
        $this->database->query('SELECT topic,content FROM help WHERE id=' . (int) $id);
        return $this->database->returnObject()[0];
    }

}