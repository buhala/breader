<?php

class legal {
    use b_controller;
    /**
    * Shows the privacy policy
    **/
    public function privacy() {
        $this->loadView('siteTop');
        $this->loadView('privacy');
        $this->loadView('siteFooter');
    }
    /**
    * Shows the Terms Of Service
    **/
    public function tos() {
        $this->loadView('siteTop');
        $this->loadView('terms');
        $this->loadView('siteFooter');
    }

}