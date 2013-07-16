<?php

/**
 * Controller for listing the commits
 */
class commits {
    use b_controller;
    /**
     * Shows the commits
     */
    public function index() {
        $this->loadModel('github_model');
        $rs = $this->github_model->getCommits($GLOBALS['config']['extra']['github']['username'], $GLOBALS['config']['extra']['github']['project']);
        $this->loadView('siteTop');
        $this->loadView('commits', $rs);
        $this->loadView('siteFooter');
    }

}