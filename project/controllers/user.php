<?php
class user extends b_controller{
    public function changeDetails(){
        $this->redirection->redirectIfNotLogged('login');
        $this->loadView('siteTop');
        $this->loadView('changeDetails');
        $this->loadView('siteFooter');
    }
    public function doPassChange(){
        $this->loadView('siteTop');
        $this->loadModel('user_model');
        $result=$this->user_model->checkOldPass($_SESSION['user'][0]['id'],$_POST['curpass']);
        if($result['success']==true){
           $result=$this->user_model->checkMatch($_POST['newpass'],$_POST['newpassrep']);
           if($result['success']==true){
               $result=$this->user_model->doChange($_POST['newpass'],$_SESSION['user'][0]['id']);
               $result['type']=1;
               $this->loadView('changeDetails',$result);
           }
           else{
               $result['type']=1;
               $this->loadView('changeDetails',$result);
           }
        }
        else{
            $result['type']=1;
            $this->loadView('changeDetails',$result);
        }
        $this->loadView('siteFooter');
    }
    
    
}