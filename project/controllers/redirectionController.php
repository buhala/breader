<?php
/**
 * Controller for redirects after/before login. Should be the initial controller called.
 */
class redirectionController extends b_controller{
    public function index(){
        $this->redirection->redirectIfNotLogged('login');
        $this->redirection->redirectIfLogged('redirectionController/loggedRedirect');
    }
    public function loggedRedirect(){
        $this->redirection->redirectIfNotLogged('login');
         $this->loadModel('redirection_model');
         $hasLiked=$this->redirection_model->checkForLikes($_SESSION);
         if($hasLiked==false){
             $this->redirection->r('categories/chooseCategories');
         }
         else{
             $this->redirection->r('stories');
         }
    }
}
