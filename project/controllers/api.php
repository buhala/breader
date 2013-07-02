<?php
class api extends b_controller{
    /**
     * Since all the API returns is JSON, might as well set the header here
     */
    public function __construct() {
        parent::__construct();
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        
    }
    /**
     * 
     * @param type $username
     * @param type $password
     * Generates the key nessesary for authorized API operations
     */
    public function getKey($username,$password){
        $this->loadModel('api_model');
        $key=$this->api_model->getKey($username,$password);
        var_dump($key);
        if($key==false){
            $return['success']=false;
            $return['error']='INVALID_DATA';
        }
        else{
            $return['success']=true;
            $return['key']=$key;
        }
        $this->loadView('JsonDisplay',$return);
    }
    /**
     * 
     * @param type $username
     * Shows the user likes
     */
    public function getUserLikes($username){
        $this->loadModel('api_model');
        $rs=$this->api_model->getUserLikes($username);
        if($rs==false){
            $rs['success']=false;
            $rs['error']='UNEXSISTENT_USER';
        }
        $this->loadView('JsonDisplay',$rs);
    }
}
