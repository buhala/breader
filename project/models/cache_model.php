<?php

/**
 * Cache model
 * This is different because it is from another project.
 */
class cache_model { 
	use b_model;

    private $cacheTime = 7200;
    private $query;

    /**
     * 
     * @param type $url
     * @return boolean
     * Checks if it is stored in the database
     */
    public function checkDB($url) {
        $lastPossible = time() - $this->cacheTime;
        $this->database->query('SELECT * FROM cache WHERE url="' . $this->database->escape($url) . '" AND time>' . $lastPossible);
        //echo 'SELECT * FROM `cache` WHERE url="'.$this->database->escape($url).'" AND time>'.$lastPossible;
        if ($this->database->getRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type $url
     * @return type
     * Gets The cached copy
     */
    public function getCache($url) {
        $this->database->query('SELECT * FROM cache WHERE url="' . $this->database->escape($url) . '"');
        return $this->database->returnObject()[0]->result;
    }

    /**
     * 
     * @param type $url
     * @param type $result
     * Writes a copy to the cache
     */
    public function writeCache($url, $result) {
        $this->database->query('INSERT INTO cache(url,result,time)
            VALUES("' . $this->database->escape($url) . '","' . $this->database->escape($result) . '",' . time() . ')');
    }

}