<?php
class welcome extends b_controller{
	public function index(){
		$this->loadView('welcome');
                
	}
	public function test($arg,$arg2){
		echo $arg2;
	}
}