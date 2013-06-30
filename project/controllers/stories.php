<?php
class stories extends b_controller{
    private $storiesCount=20; //TODO:User based result
    public function index(){
        $this->loadModel('stories_model');
        $feeds=$this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id']);
        echo '<pre>';
        //var_dump($feeds);
        $popularity=$this->stories_model->getCollectivePopulation($feeds->categories);
        $rs=$this->stories_model->getStoriesPerCategory($popularity,$this->storiesCount,$feeds->categories);
        var_dump($rs);
        
    }
}