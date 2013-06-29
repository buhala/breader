<?php


/**
 * Model for forgot password
 *
 * @author buhala
 */
class forgot_model extends b_model{
    /**
     * 
     * @param type $data
     * @return type
     * Escapes the data
     */
    public function escapeData($data){
        $return['username']=$this->database->escape($data['username']); //For consistency's sake
        return $return;
    }
    public function validateData($data){
        if(filter_var($data['username'],FILTER_VALIDATE_EMAIL)==false){
            $return['success']=false;
            $return['error']='INVALID_MAIL';
        }
        else{
        $this->database->query('SELECT * FROM users WHERE username="'.$data['username'].'"');
        if($this->database->getRows()>0){
            $return['success']=true;
        }
        else{
            $return['success']=false;
            $return['error']='ACCOUNT_NOT_EXIST';
        }
        }
        return $return;
    }
    public function doChange($data){
        $key=$this->hash->h(rand());
        $this->database->query('UPDATE users SET `key`="'.$key.'" WHERE email="'.$data['email'].'"');
        $return['success']=true;
        $return['key']=$key;
    }
}

?>
