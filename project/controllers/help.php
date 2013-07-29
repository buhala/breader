<?php

/**
 * Help system 
 */
class help {

    use b_controller;

    /**
     * Shows all help topics&contact form
     */
    public function index() {
        $this->redirection->redirectIfNotLogged('login');
        $this->loadView('siteTop');
        $this->loadModel('help_model');
        $list = $this->help_model->getTopicsList();
        $this->loadView('showTopics', $list);
        $this->loadView('siteFooter');
    }

    /**
     * 
     * @param type $id
     * Shows an article
     */
    public function viewArc($id) {
        $this->loadModel('help_model');
        $this->loadView('siteTop');
        $data = $this->help_model->getArcticle($id);
        if (!$data->topic) {
            //  $this->redirection->r('error');
        }
        $this->loadView('singleTopic', $data);
        $this->loadView('siteFooter');
    }

    public function submitRequest() {

        $this->loadView('success');
        $this->loadLibrary('mailer');
        $this->mailer->sendMail($_POST['title'], $_POST['email'], $GLOBALS['config']['system']['email'], $_POST['msg']);
    }

}