<?php
class link extends b_controller{
    public function visit($cat){
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('logging_model');
        $this->logging_model->logVisit((int)$cat,$_SESSION['user'][0]['id']);
        //$this->redirection->r($_GET['url'],false);
    }
}