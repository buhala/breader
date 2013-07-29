<?php

/**
 * Development/Testing class
 */
class developmentController {

    use b_controller;

    public function rssTest() {
        $this->loadModel('rssReader_model');
        echo '<pre>';
        $this->rssReader_model->setUrl('http://rss.cnn.com/rss/edition_world.rss');
        $result = $this->rssReader_model->getFirstNews(5);
        foreach ($result as $r) {
            print_r($r);
        }
    }

    public function designTest() {
        $this->loadView('siteTop');
        $this->loadView('siteFooter');
    }

    public function sendMail() {
        $this->loadLibrary('mailer');
        $this->mailer->sendMail('b', 'fix288@gmail.com', 'me@buhala.uchenici.bg', 'asdfa');
    }

    public function getFeed() {
        echo file_get_contents('http://www.thetimes.co.uk/tto/sport/football/rss');
    }

}
