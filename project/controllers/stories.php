<?php
/**
 * Controller for showing stories
 */
class stories extends b_controller{
    /**
     * Shows a loading page before doing stuff -_-
     */
    public function index(){
        $this->loadView('siteTop');
        $this->loadView('fake_stories');
        $this->loadModel('stories_model'); //We want it here, too
        $feeds=$this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id']);
        if(count($feeds->categories)==0){
            $this->redirection->r('redirectionController'); //Just to be sure
        }
        $this->loadView('siteFooter');
    }
    private $storiesCount=20; //TODO:User based result
    /**
     * Shows needed stories. Should be an AJAX call
     */
    
    
    public function showStories(){
        $this->loadModel('stories_model');
        $feeds=$this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id']);
        if(count($feeds->categories)==0){
            $this->redirection->r('redirectionController'); //Just to be sure
        }
        //var_dump($feeds);
        $popularity=$this->stories_model->getCollectivePopulation($feeds->categories);
        $rs=$this->stories_model->getStoriesPerCategory($popularity,$this->storiesCount,$feeds->categories);
       // var_dump($rs);
        $final=$this->stories_model->getRandomStories($rs,$feeds->feeds);
        $this->loadView('stories',$final);
        
    }
}