<?php
/**
 * Login controller, handles the login page and the ajax requests from it
 */
class login extends b_controller{
    protected $database,$hash; //They are appended from parent
    /**
     * Defines libraries for use later
     */
        /**
         * Shows login page
         * @todo Redirect if logged in
         */
    public function index(){
        $this->redirection->redirectIfLogged('profile');
        $this->loadView('login');
    }
    /**
     * Handles the login
     */
    public function ajaxLogin(){
        
        $this->loadModel('login_model');
        $escaped_data=$this->login_model->escapeData($_POST);
        //echo 'qwe';
        //echo $password;
        if($this->login_model->checkData($escaped_data)){
            $this->login_model->createSession();
            $return['success']=true;
        }
        else{
            $return['success']=false;
            $return['error']='INVALID_DATA';
            }
        //print_r($return);
        $this->loadView('JsonDisplay',$return);
    }
    /**
     * Handles ajax register
     * @return type
     */
    public function ajaxRegister(){
        $this->loadModel('register_model');
        
        $rs=$this->register_model->validateData($_POST);
        if($rs['success']==false){
            
            $this->loadView('JsonDisplay',$rs);
            return;
        }
        else{
            $insertingData=$this->register_model->escapeData($_POST);
            $this->register_model->doRegister($insertingData);
            $this->loadView('JsonDisplay',$rs);
        }
    }
    public function ajaxForgotPassword(){
        
        $this->loadModel('forgot_model');
        $escapedData=$this->forgot_model->escapeData($_POST);
        $rs=$this->forgot_model->validateData($escapedData);
        if($rs['success']==false){
            $this->loadView('JsonDisplay',$rs);
        }
        else{

            $rs=$this->forgot_model->doChange($escapedData);
            $mailText='Activate your new password at '.SITE_PATH.'/login/restorePass/'.$key;
        }
    }
    public function destroy_session(){
        //TODO:Delete after actual logout
        session_destroy();
    }

    
}