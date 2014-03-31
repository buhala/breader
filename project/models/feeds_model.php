<?php

/**
 * Model for feeds
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
     * Returns all the feeds
     * @return array
     */
    public function getFeeds(){
        $rq=$this->database->query('SELECT * FROM feeds');
        return $this->database->returnObject($rq);
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
    /**
     * Returns all of the suggested feeds
     * @return array
     */
    public function getSuggestedFeeds(){
        $rq=$this->database->query('SELECT * FROM suggested_feeds');
        return $this->database->returnObject($rq);
    }
    /**
     * Gets info for a single feed
     * @param type $id
     * @return type
     */
    public function getFeed($id){
        $rq=$this->database->query('SELECT * FROM feeds WHERE id='.(int)$id);
        return $this->database->returnObject($rq);
    }
    /**
     * 
     * @param int $id
     * @param str $link
     * @param int $cat_id
     * Updates the feed's database info
     */
    public function editFeed($id,$link,$cat_id){
        $this->database->query('UPDATE feeds SET link="'.$this->database->escape($link ).'",cat_id='.(int)$cat_id.' WHERE id='.(int)$id);
    }
    /**
     * Deletes a feed
     * @param int $id
     */
    public function deleteFeed($id){
        $this->database->query('DELETE FROM feeds WHERE id='.(int)$id);
    }
    /**
     * Approves a suggested feed
     * @param int $id
     */
    public function approveFeed($id){
        $rq=$this->database->query('SELECT * FROM suggested_feeds WHERE id='.(int)$id); //I am now realising how incredibly dumb it is storing them into seperate categories
        $feed=$this->database->returnObject()[0];
        $this->database->query('INSERT INTO feeds(link,cat_id)
            VALUES("'.$feed->url.'","'.$feed->cat_id.'")');
        $this->deleteSuggestedFeed($id);
    }
    /**
     * Deletes a suggested feed.
     * @param int $id
     */
    public function deleteSuggestedFeed($id){
        $this->database->query('DELETE FROM suggested_feeds WHERE id='.(int)$id);
        }
}