<?php

/**
 * Redirector, logs stuff
 */
class link {

    use b_controller;

    /**
     * 
     * @param type $cat
     * Simpliest logger, uses $_GET, because it glitches when not
     */
    public function visit($cat) {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('logging_model');
        $this->logging_model->logVisit((int) $cat, $_SESSION['user'][0]['id']);
        $this->logging_model->logClick($_GET['url'], $_SESSION['user'][0]['id']);
        $this->redirection->r($_GET['url'], false);
    }

}