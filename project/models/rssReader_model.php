<?php
/**
 * RssReader class. Simple RSS reader
 */
class rssReader_model extends b_model{
    private $instance;
    /**
     * 
     * @param type $url
     * Chooses where to get the file from
     */
    public function setUrl($url){
        $instance=new SimpleXMLElement(file_get_contents(trim($url)));
        $this->instance=$instance->channel;
    }
    /**
     * 
     * @return array
     * Returns all news
     */
    public function getAllNews(){
        
        return $this->instance->item[1];
    }
    /**
     * 
     * @return type
     * Gets a random story
     */
    public function getRandom(){      
        return $this->instance->item[rand(0,10)]; //If someone could explain why array_rand decides this is an object :(
    }
    /**
     * 
     * @param type $number
     * @return type
     * Returns first $number news
     */
    public function getFirstNews($number=5){
        $allNews=$this->getAllNews();
        $i=0;
        while($i<$number){ //Starting from zero
            $news[]=$allNews[$i];
            $i++;
            
        }
        return $news;
    }
}