<?php
class feeds_model extends b_model{
    public function escapeData($data){
        $return['url']=$this->database->escape($data['url']);
        $return['cat']=(int)$data['cat'];
        return $return;
    }
    public function validateData($data){
        if(strlen($data['url'])<3)
        {
            $return['success']=false;
           
        }
        else{
            $return['success']=true;
        }
        return $return;
    }
    public function insertData($data){
        $this->database->query('INSERT INTO suggested_feeds(cat_id,url)
            VALUES('.$data['cat'].',"'.$data['url'].'")');
        return true;
    }
}