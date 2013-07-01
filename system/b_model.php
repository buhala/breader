<?php
class b_model{
    public function __construct() {
        foreach ($GLOBALS['libraries'] as $key => $value) {
            $this->$key=$value;
            
        }
    }
    public function loadModel($model){
        include_once PROJECT_DIR.'models/'.$model.'.php';
        if(!$this->$model){
            $this->$model=new $model;
        }
        return $model;
    }
    /**
    *Loads a library
    **/
    public function loadLibrary($lib){
        include_once PROJECT_DIR.'libs/'.$lib.'.php';
		if(!$GLOBALS['libraries'][$lib]){
			$GLOBALS['libraries'][$lib]=new $lib;
		}
	
    }
}