<?php
class api_model extends b_model{
    public function getKey($username,$password){
        $username=$this->database->escape($username);
        $password=$this->hash->h($password);
        $this->loadModel('login_model');
        $data['username']=$username;
        $data['password']=$password;
        $isValid=$this->login_model->checkData($data);
        if($isValid==false){
            return false;
        }
        //I am doing this for readability's sake
        else{
            
            $apiKey=$this->writeKey($username);
            return $apiKey;
        }
    }
    private function writeKey($username){
        $key=$this->hash->h(rand());
        $this->database->query('SELECT * FROM `users` WHERE username="'.trim($username).'"');
        $realKey=$this->database->returnObject()[0]->api_key;
        if(strlen($realKey)<1){
        $this->database->query('UPDATE users SET api_key="'.$key.'" WHERE username="'.$username.'"'); 
        
        return $key;
        }
        else{
            return $realKey;
        }
    }
}