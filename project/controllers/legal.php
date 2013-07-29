<?php

class legal {
    use b_controller;
    public function privacy() {
        $this->loadView('siteTop');
        $this->loadView('privacy');
        $this->loadView('siteFooter');
    }

    public function tos() {
        $this->loadView('siteTop');
        $this->loadView('terms');
        $this->loadView('siteFooter');
    }

}