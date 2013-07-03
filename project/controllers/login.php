<?php

/**
 * Login controller, handles the login page and the ajax requests from it
 */
class login extends b_controller {

    protected $database, $hash; //They are appended from parent

    /**
     * Defines libraries for use later
     */

    /**
     * Shows login page
     * @todo Redirect if logged in
     */
    public function index() {
        $this->redirection->redirectIfLogged('redirectionController');
        $this->loadView('login');
    }

    /**
     * Handles the login
     */
    public function ajaxLogin($username = '', $password = '') {
        $this->loadModel('login_model');
        $escaped_data = $this->login_model->escapeData($_POST);
        //echo 'qwe';
        //echo $password;
        if ($this->login_model->checkData($escaped_data)) {
            $this->login_model->createSession();
            $return['success'] = true;
        } else {
            $return['success'] = false;
            $return['error'] = 'INVALID_DATA';
        }
        //print_r($return);
        $this->loadView('JsonDisplay', $return);
    }

    /**
     * Handles ajax register
     * @return type
     */
    public function ajaxRegister() {
        $this->loadModel('register_model');

        $rs = $this->register_model->validateData($_POST);
        if ($rs['success'] == false) {

            $this->loadView('JsonDisplay', $rs);
            return;
        } else {
            $insertingData = $this->register_model->escapeData($_POST);
            $this->register_model->doRegister($insertingData);
            $this->loadView('JsonDisplay', $rs);
        }
    }

    /**
     * Forgot password reset.
     */
    public function ajaxForgotPassword() {

        $this->loadModel('forgot_model');
        $escapedData = $this->forgot_model->escapeData($_POST);
        $rs = $this->forgot_model->validateData($escapedData);
        //var_dump($rs);
        if ($rs['success'] == false) {
            $this->loadView('JsonDisplay', $rs);
        } else {

            $rs = $this->forgot_model->doChange($escapedData);
            $mailText = 'Activate your new password at ' . SITE_PATH . 'login/restorePass/' . $key;
            $this->loadLibrary('mailer');
            $this->mailer->sendMail('bReader password reset', $GLOBALS['config']['system']['email'], $_POST['username'], $mailText);
            $this->loadView('JsonDisplay', $rs);
        }
    }

    public function restorePass($key) {
        $this->loadView('siteTop');
        $this->loadModel('forgot_model');
        $escapedKey = $this->forgot_model->escapeKey($key);
        $rs = $this->forgot_model->checkKey($escapedKey);
        $rs['key'] = $escapedKey;
        $this->loadView('resetPass', $rs);
        $this->loadView('siteFooter');
    }

    public function newPass($key) {
        $this->loadView('siteTop'); //So we load nessesary JS
        $this->loadModel('forgot_model');
        $rs = $this->forgot_model->changeFinal($_POST, $key);
        $this->loadView('changed', $rs);
    }

    public function destroy_session() {
        session_destroy();

        $this->redirection->r('redirectionController');
    }

}