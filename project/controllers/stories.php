<?php

/**
 * Controller for showing stories
 */
class stories {

    use b_controller;

    /**
     * Shows a loading page before doing stuff -_-
     */
    private $storiesCount = 20; //TODO:User based result
    private $recommendedStoriesCount = 5;

    /*
     * Shows the stories needed
     */

    public function index() {
        $this->loadView('siteTop');
        $this->loadView('fake_stories');
        $this->loadModel('stories_model'); //We want it here, too
        $feeds = $this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id']);
        if (count($feeds->categories) == 0) {
            $this->redirection->r('redirectionController'); //Just to be sure
        }
        $this->loadView('siteFooter');
    }

    /**
     * 
     * @param type $url
     * @param type $rating
     * Writes the rating for a story
     */
    public function ajaxAddRating($rating) {
        $url=$_GET['url'];
        if($rating>5 || $rating<0){
            return false; //I don't care what cheaters see ;(
        }
        $this->redirection->redirectIfNotLogged('login');
        $this->loadModel('stories_model');
        $this->stories_model->addRating($url, (int) $rating);
    }

    /**
     * Adding a feed. 
     */
    public function addFeed() {
        if ($_POST) {
            $this->loadModel('feeds_model');
            $escaped = $this->feeds_model->escapeData($_POST);
            $response = $this->feeds_model->validateData($escaped);
            if ($response['success'] == true) {
                $this->feeds_model->insertData($escaped);
            }
        }

        $this->loadView('siteTop');
        $this->loadModel('categories_model');

        $cat_list = $this->categories_model->getCategoryList();

        if (isset($response)) {
            $cat_list['success'] = $response['success'];
        }
        $this->loadView('addFeed', $cat_list);
        $this->loadView('siteFooter');
    }

    /**
     * Shows needed stories. Should be an AJAX call(or call from another location)
     */
    public function showStories($sortby = 'random') {
        $this->loadModel('stories_model');
        $feeds = $this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id']);
        //echo '<pre>';
        //print_r($feeds);
        if (count($feeds->categories) == 0) {
            $this->redirection->r('redirectionController'); //Just to be sure
        }
        //var_dump($feeds);
        $popularity = $this->stories_model->getCollectivePopulation($feeds->categories);
        $rs = $this->stories_model->getStoriesPerCategory($popularity, $this->storiesCount, $feeds->categories);
        // var_dump($rs);
        if ($sortby == 'random') {
            $final = $this->stories_model->getRandomStories($rs, $feeds->feeds, $_SESSION['user'][0]['id']);
        } elseif ($sortby == 'new') {
            $final = $this->stories_model->getNewestStories($rs, $feeds->feeds);
        }
        $cats = $this->stories_model->getSuggestedCategories($feeds->categories, $_SESSION['user'][0]['id']);
        $feeds_recommended = $this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id'], $cats);
        $popularity_recommended = $this->stories_model->getCollectivePopulation($feeds_recommended->categories);
        $rs_recommended = $this->stories_model->getStoriesPerCategory($popularity_recommended, $this->recommendedStoriesCount, $feeds_recommended->categories);
        if ($sortby == 'random') {
            $final_recommended = $this->stories_model->getRandomStories($rs_recommended, $feeds_recommended->feeds, $_SESSION['user'][0]['id'], true); //We want to show the user a notice this story is a recommendation
        } elseif ($sortby == 'new') {
            $final_recommended = $this->stories_model->getNewestStories($rs_recommended, $feeds_recommended->feeds, true); //We want to show the user a notice this story is a recommendation
        }
        $toView = array_merge($final, $final_recommended);
        //If we are going with __best__ stories, it should be ordered like it!
        shuffle($toView);
        $this->loadView('stories', $toView);
    }

}