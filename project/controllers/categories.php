<?php

/**
 * Class for all things categories
 */
class categories { 
		use b_controller;

    /**
     * Lists categories
     */
    public function chooseCategories() {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadView('siteTop');
        $this->loadModel('categories_model');
        $view['categories'] = $this->categories_model->getCategoryList();
        $view['likes'] = $this->categories_model->getUserLikes($_SESSION['user'][0]['id']);

        $this->loadView('categoryList', $view);
        $this->loadView('siteFooter');
    }
    /**
     * Saves the changes
     */
    public function change() {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('categories_model');
        $this->categories_model->deleteUserLikes($_SESSION['user'][0]['id']);
        $this->categories_model->setNewLikes($_SESSION['user'][0]['id'], $_POST);
        $this->redirection->r('redirectionController');
    }
    
    /**
     * 
     * @param type $id
     * Disables a recommendation
     */
    public function deleteRecommendation($id) {
        $this->loadModel('categories_model');
        $this->categories_model->disableRecommendation((int) $id, $_SESSION['user'][0]['id']);
    }
    /**
     * Gets a list of avaliable profiles
     */
    public function getProfiles(){
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('categories_model');
        $profiles=$this->categories_model->getProfiles($_SESSION['user'][0]['id']);
        $this->loadView('JsonDisplay',$profiles);
        
    }
    /**
     * Gets a single profile
     */
    public function getProfile($id){
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('categories_model');
        $profile=$this->categories_model->getProfile((int)$id);
        $this->loadView('JsonDisplay',$profile);
    }
    public function writeProfile(){
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('categories_model');
        $profile=$this->categories_model->writeProfile($_SESSION['user'][0]['id'],$_POST['categories'],$_POST['profileName']);
        $this->loadView('JsonDisplay',$profile);
    }

}