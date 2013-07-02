<?php
class api extends b_controller{
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
}
