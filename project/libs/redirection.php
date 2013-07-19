<?php

/**
 * All redirects
 */
class redirection {
    use b_library;
    /**
     * 
     * @param type $link
     * Plain redirect
     */
    public function r($link, $appendSitePath = true) {
        if ($appendSitePath == true) {
            header('Location:' . SITE_PATH . $link);
        } else {
            header('Location:' . $link);
        }
    }

    /**
     * 
     * @param string $link
     * @param type $appendSitePath
     * Redirect if logged
     */
    public function redirectIfLogged($link, $appendSitePath = true) {

        if (isset($_SESSION['il'])) {
            $this->r($link, $appendSitePath);
        }
    }

    /**
     * 
     * @param string $link
     * @param type $appendSitePath
     * Redirects if not logged
     */
    public function redirectIfNotLogged($link, $appendSitePath = true) {
        if (!isset($_SESSION['il'])) {

            $this->r($link, $appendSitePath);
        }
    }

}
