<?php

/**
 * Model for writing feeds
 */
class feeds_model { 
	use b_model;

    /**
     * 
     * @param type $data
     * @return type
     * Escapes the input
     */
    public function escapeData($data) {
        $return['url'] = $this->database->escape($data['url']);
        $return['cat'] = (int) $data['cat'];
        return $return;
    }

    /**
     * 
     * @param type $data
     * @return boolean
     * Validates is the URL is good
     */
    public function validateData($data) {
        if (strlen($data['url']) < 3) {
            $return['success'] = false;
        } else {
            $return['success'] = true;
        }
        return $return;
    }

    /**
     * 
     * @param type $data
     * @return boolean
     * Inserts the URL into the fake feeds
     */
    public function insertData($data) {
        $this->database->query('INSERT INTO suggested_feeds(cat_id,url)
            VALUES(' . $data['cat'] . ',"' . $data['url'] . '")');
        return true;
    }

}