<?php
class b_controller{
    /**
    *Loads a model
    **/
    public function __construct() {
        foreach ($GLOBALS['libraries'] as $key => $value) {
            $this->$key=$value;
        }
    }
    public function loadModel($model){
        include_once PROJECT_DIR.'models/'.$model.'.php';
        if(!$this->model){
            $this->$model=new $model;
        }
        
    }
    /**
    *Loads a library
    **/
    public function loadLibrary($lib){
        include_once PROJECT_DIR.'libs/'.$lib.'.php';
		if(!$GLOBALS['libraries'][$lib]){
        $GLOBALS['libraries'][$lib]=new $lib;
        }
        $this->$lib=$GLOBALS['libraries'][$lib];
    }
    /**
    *Loads a view
    **/
    public function loadView($view,$input=array()){
        
        global $data;
        $data=$input;
        include_once PROJECT_DIR.'views/'.$GLOBALS['config']['extra']['lang'].'/'.$view.'.php';
        
    }
}