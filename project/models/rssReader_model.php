<?php

/**
 * RssReader class. Simple RSS reader
 */
class rssReader_model { 
	use b_model;

    private $instance;

    /**
     * 
     * @param type $url
     * Chooses where to get the file from
     */
    public function setUrl($url) {
        $url = trim($url); //Do not touch, mysql sometimes does things you woudn't believe
        $this->loadModel('cache_model');
        if ($this->cache_model->checkDB($url)) {

            $result = $this->cache_model->getCache($url);
        } else {
            $rs = file_get_contents($url);
            $this->cache_model->writeCache($url, $rs);
            $result = $rs;
        }
        // echo SITE_PATH.'cache/getFeed?url='.urlencode(trim($url));
        $instance = new SimpleXMLElement($result);
        $this->instance = $instance->channel;
    }

    /**
     * 
     * @return array
     * Returns all news
     */
    public function getAllNews() {

        return $this->instance->item;
    }

    /**
     * 
     * @return type
     * Gets a random story
     */
    public function getRandom($last = 10) {
        return $this->instance->item[rand(0, $last)]; //If someone could explain why array_rand decides this is an object :(
    }

    /**
     * 
     * @param type $number
     * @return type
     * Returns first $number news
     */
    public function getFirstNews($number = 5) {
        $allNews = $this->getAllNews();
        $i = 0;
        while ($i < $number) { //Starting from zero
            $news[] = $allNews[$i];
            $i++;
        }
        return $news;
    }

}