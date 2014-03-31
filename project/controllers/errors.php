<?php

class errors {

    use b_controller;
    /**
    * Shows the error page
    */
    public function index() {
        $this->loadView('siteTop');
        $this->loadView('errorPage');
        $this->loadView('siteFooter');
    }

}