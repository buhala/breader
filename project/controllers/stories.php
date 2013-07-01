<?php
/**
 * Controller for showing stories
 */
class stories extends b_controller{
    /**
     * Shows a loading page before doing stuff -_-
     */
    private $storiesCount=20; //TODO:User based result
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
    /**
     * Adding a feed. 
     */
    public function addFeed(){
        if($_POST){
            $this->loadModel('feeds_model');
            $escaped=$this->feeds_model->escapeData($_POST);
            $response=$this->feeds_model->validateData($escaped);
            if($response['success']==true){
                $this->feeds_model->insertData($escaped);
            }
        }
        
        $this->loadView('siteTop');
        $this->loadModel('categories_model');
        $cat_list=$this->categories_model->getCategoryList();
        if(isset($response)){
            $cat_list['success']=$response['success'];
        }
        $this->loadView('addFeed',$cat_list);
        $this->loadView('siteFooter');
    }
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