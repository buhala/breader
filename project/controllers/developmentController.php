<?php
/**
 * Development/Testing class
 */
class developmentController extends b_controller{
    public function rssTest(){
        $this->loadModel('rssReader_model');
        echo '<pre>';
        $this->rssReader_model->setUrl('http://rss.cnn.com/rss/edition_world.rss');
        $result=$this->rssReader_model->getFirstNews(5);
        foreach($result as $r){
            print_r($r);
    }
    
        
    }
    public function designTest(){
        $this->loadView('siteTop');
        $this->loadView('siteFooter');
    }
    public function getFeed(){
        echo file_get_contents('http://www.thetimes.co.uk/tto/sport/football/rss');
    }
}
