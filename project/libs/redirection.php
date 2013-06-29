<?php
/**
 * All redirects
 */
class redirection extends b_library{
    /**
     * 
     * @param type $link
     * Plain redirect
     */
    public function r($link){
        header('Location:'.$link);
    }
    /**
     * 
     * @param string $link
     * @param type $appendSitePath
     * Redirect if logged
     */
    public function redirectIfLogged($link,$appendSitePath=true){
        if($appendSitePath==true){
            $link=SITE_PATH.$link;
        }
        if($_SESSION['il']){
            $this->r($link);
        }
    }
    /**
     * 
     * @param string $link
     * @param type $appendSitePath
     * Redirects if not logged
     */
    public function redirectIfNotLogged($link,$appendSitePath=true){
        if($appendSitePath==true){
            $link=SITE_PATH.$link;
        }
        if(!$_SESSION['il']){
            
            $this->r($link);
        }
    }
}
