<?php
class errors extends b_controller{
    public function index(){
        $this->loadView('siteTop');
        $this->loadView('errorPage');
        $this->loadView('siteFooter');
    }
}