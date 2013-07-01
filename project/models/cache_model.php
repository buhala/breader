<?php
/**
 * Cache model
 * This is different because it is from another project.
 */
class cache_model extends b_model{
    
    private $cacheTime=7200;
    private $query;
    public function checkDB($url){
        $lastPossible=time()-$this->cacheTime;
        $this->database->query('SELECT * FROM cache WHERE url="'.$this->database->escape($url).'" AND time>'.$lastPossible);
        //echo 'SELECT * FROM `cache` WHERE url="'.$this->database->escape($url).'" AND time>'.$lastPossible;
        if($this->database->getRows()>0){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function getCache($url){
        $this->database->query('SELECT * FROM cache WHERE url="'.$this->database->escape($url).'"');
        return $this->database->returnObject()[0]->result;
    }
    public function writeCache($url,$result){
        $this->database->query('INSERT INTO cache(url,result,time)
            VALUES("'.$this->database->escape($url).'","'.$this->database->escape($result).'",'.time().')');
    }
}