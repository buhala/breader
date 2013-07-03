<?php

/**
 * Class for all things categories
 */
class categories extends b_controller {

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

    public function change() {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('categories_model');
        $this->categories_model->deleteUserLikes($_SESSION['user'][0]['id']);
        $this->categories_model->setNewLikes($_SESSION['user'][0]['id'], $_POST);
        $this->redirection->r('redirectionController');
    }

    public function deleteRecommendation($id) {
        $this->loadModel('categories_model');
        $this->categories_model->disableRecommendation((int) $id, $_SESSION['user'][0]['id']);
    }

}