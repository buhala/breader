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
	public function manageCategory($id){
		$this->loadModel('categories_model');
		$cat=$this->categories_model->getCategory($id);
		$this->loadView('siteTop');
		$this->loadView('categoryEdit',$cat);
		$this->loadView('siteFooter');
	}
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
	public function addCategory(){
		$this->loadView('siteTop');
		$this->loadView('categoryEdit');
		$this->loadView('siteFooter');
	}
	public function feedManagement(){
		$this->loadView('siteTop');
		$this->loadModel('feeds_model');
		$feeds=$this->feeds_model->getFeeds();
		$suggested=$this->feeds_model->getSuggestedFeeds();
		$this->loadView('feedsList',$feeds);
		$this->loadView('suggestedFeedsList',$suggested);
		$this->loadView('siteFooter');

	}
	public function editFeed($id){
		$this->loadModel('feeds_model');
		$feed=$this->feeds_model->getFeed($id);
		$this->loadView('siteTop');
		$this->loadView('editFeed',$feed);
		$this->loadView('siteFooter');
	}
	public function execEditFeed(){
		$this->loadModel('feeds_model');
		$this->feeds_model->editFeed($_POST['id'],$_POST['link'],$_POST['cat_id']);
		$this->redirection->redirectBack();
	}
	public function deleteFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->deleteFeed($id);
		$this->redirection->redirectBack();
	}
	public function approveFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->approveFeed($id);
		$this->redirection->redirectBack();
	}
	public function deleteSuggestedFeed($id){
		$this->loadModel('feeds_model');
		$this->feeds_model->deleteSuggestedFeed($id);
		$this->redirection->redirectBack();
	}
}