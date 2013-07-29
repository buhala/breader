<?php

/**
 * API class
 */
class api {

    use b_controller;

    /**
     * Since all the API returns is JSON, might as well set the header here
     */
    public function __construct() {
        $this->setVars();
        error_reporting(0); //Even when debugging this is imporant
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
    }

    //This function is commented because right now the API keys do nothing
    /**
     * 
     * @param type $username
     * @param type $password
     * Generates the key nessesary for authorized API operations
     */
    /**
      public function getKey($username,$password){
      $this->loadModel('api_model');
      $key=$this->api_model->getKey($username,$password);
      var_dump($key);
      if($key==false){
      $return['success']=false;
      $return['error']='INVALID_DATA';
      }
      else{
      $return['success']=true;
      $return['key']=$key;
      }
      $this->loadView('JsonDisplay',$return);
      } */

    /**
     * 
     * @param type $username
     * Shows the user likes
     */
    public function getUserLikes($username) {
        //Fetch the needed model
        $this->loadModel('api_model');
        //Get the likes
        $rs = $this->api_model->getUserLikes($username);
        //If it's all great, load the view, if not, change data and then load the view
        if ($rs == false) {
            $rs['success'] = false;
            $rs['error'] = 'UNEXSISTENT_USER';
        }
        $this->loadView('JsonDisplay', $rs);
    }

    /**
     * 
     * @param type $username
     * @return mixed
     * Shows a user based feed
     * This is a different function to the one in controllers/stories.
     */
    public function getUserFeed($username) {
        $this->loadModel('stories_model');
        $this->loadModel('api_model');
        $uid = $this->api_model->getUserId($username);
        //echo 'User ID:'.var_dump($uid);
        if ($uid === false) {
            $return['success'] = false;
            $return['error'] = 'INVALID_UNAME';
        } else {
            $feeds = $this->stories_model->getSubscribedFeeds($uid);
            // var_dump($feeds->categories);
            $popularity = $this->stories_model->getCollectivePopulation($feeds->categories);
            $rs = $this->stories_model->getStoriesPerCategory($popularity, $this->storiesCount, $feeds->categories);

            $final = $this->stories_model->getRandomStories($rs, $feeds->feeds);
            //print_r($final);
            $cats = $this->stories_model->getSuggestedCategories($feeds->categories, $_SESSION['user'][0]['id']);
            $feeds_recommended = $this->stories_model->getSubscribedFeeds($_SESSION['user'][0]['id'], $cats);
            $popularity_recommended = $this->stories_model->getCollectivePopulation($feeds_recommended->categories);
            $rs_recommended = $this->stories_model->getStoriesPerCategory($popularity_recommended, $this->recommendedStoriesCount, $feeds_recommended->categories);
            $final_recommended = $this->stories_model->getRandomStories($rs_recommended, $feeds_recommended->feeds, true); //We want to show the user a notice this story is a recommendation
            $toView = array_merge($final, $final_recommended);
            if (count($toView) < 1) {
                $return['success'] = false;
                $return['error'] = 'NO_FEED';
            } else {
                shuffle($toView);
                $return = $toView;
            }
        }
        $this->loadView('JsonDisplay', $return);
    }

    public function tokenLogin() {
        $token = $_POST['token'];
        $this->loadModel('api_model');
        $email = $this->api_model->getEmail($token);
        echo 'Email:' . $email;
        $hasAccount = $this->api_model->checkSocialAccount($email);
        if ($hasAccount == false) {
            $this->api_model->tokenRegister($email);
        }
        $this->api_model->tokenLogin($email, true);
        $this->redirection->r('redirectionController');
    }

}
