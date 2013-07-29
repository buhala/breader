<?php

/**
 * Controller for redirects after/before login. Should be the initial controller called.
 * There should not be a model related to this controller, simply because all the redirects are inside the 
 * system, a model would just make everything more complicated than it should be
 */
class redirectionController {

    use b_controller;

    public function index() {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('redirection_model');
        $hasLiked = $this->redirection_model->checkForLikes($_SESSION);
        if ($hasLiked == false) {
            $this->redirection->r('categories/chooseCategories');
        } else {
            $this->redirection->r('stories');
        }
    }

}
