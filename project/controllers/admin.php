<?php
class admin{
	use b_controller;
	/**
	*Redirects user outta here
	**/
	public function __construct(){
		$this->setVars();

		if($_SESSION['user'][0]['type']==0){

				$this->redirection->r('redirectionController');
		}
	}
	/**
	*Shows links to admins
	**/
	public function index(){
		$this->loadView('siteTop');
		$this->loadView('admin_links');
		$this->loadView('siteFooter');
	}
        /**
	*Manages categories
	**/
	public function categoriesManagement(){
		$this->loadView('siteTop');
		$this->loadModel('categories_model');
		$cats=$this->categories_model->getCategoryList();
		$this->loadView('categoriesManagement',$cats);
		$this->loadView('siteFooter');
	}
        /**
         * Manages a single category
         * @param type $id
         */
	public function manageCategory($id){
		$this->loadModel('categories_model');
		$cat=$this->categories_model->getCategory($id);
		$this->loadView('siteTop');
		$this->loadView('categoryEdit',$cat);
		$this->loadView('siteFooter');
	}
        /**
         * Updates the database data for a category
         */
	public function execManageCategory(){
		$this->loadModel('categories_model');
		if($this->categories_model->categoryExists($_POST['id'])){
			$this->categories_model->updateCategory($_POST['id'],$_POST['name'],$_POST['relatedTo']);
		}
		else{
			$this->categories_model->insertCategory($_POST['name'],$_POST['relatedTo']);
		}
		$this->redirection->redirectBack();
	}
        /**
         * Shows a view for adding a category
         */
	public function addCategory(){
		$this->loadView('siteTop');
		$this->loadView('categoryEdit');
		$this->loadView('siteFooter');
	}
        /**
         * Shows the screen for managing all the feeds
         */
	public function feedManagement(){
		$this->loadView('siteTop');
		$this->loadModel('feeds_model');
		$feeds=$this->feeds_model->getFeeds();
		$suggested=$this->feeds_model->getSuggestedFeeds();
		$this->loadView('feedsList',$feeds);
		$this->loadView('suggestedFeedsList',$suggested);
		$this->loadView('siteFooter');

	}
        /**
         * Edits a single feed
         * @param type $id
         */
	public function editFeed($id){
		$this->loadModel('feeds_model');
		$feed=$this->feeds_model->getFeed($id);
		$this->loadView('siteTop');
		$this->loadView('editFeed',$feed);
		$this->loadView('siteFooter');
	}
        /**
         * Updates the feed in the database
         */
	public function execEditFeed(){
		$this->loadModel('feeds_model');
		$this->feeds_model->editFeed($_POST['id'],$_POST['link'],$_POST['cat_id']);
		$this->redirection->redirectBack();
	}
        /**
         * Deletes a feed.
         * @param type $id
         */
	public function deleteFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->deleteFeed($id);
		$this->redirection->redirectBack();
	}
        /**
         * Approves an already suggested feed
         * @param type $id
         */
	public function approveFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->approveFeed($id);
		$this->redirection->redirectBack();
	}
        /**
         * Deletes a suggested feed
         * @param type $id
         */
	public function deleteSuggestedFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->deleteSuggestedFeed($id);
		$this->redirection->redirectBack();
	}
        /**
         * Deletes a category
         * @param type $id
         */
	public function deleteCategory($id){
		$this->loadModel('categories_model');
		$this->categories_model->deleteCategory($id);
		$this->redirection->redirectBack();
	}
}