<?php
/**
Class for loading the rest of the framework
**/
class bootstrap{
    private $raw;
    private $components;
    private $arguments;
    /**
    Creates the class instance, also gets the arguments for the method
    **/
    public function __construct($raw) {
        $this->raw=substr($raw,1);
		$lastSymbol=substr($raw,-1);
		if($lastSymbol=='/' && strlen($raw)>1){
		header('Location:'.substr($raw,0,strlen($raw)-1));
		}
        $this->components=explode('/', $this->raw);
        $arguments=$this->components;
        unset($arguments[0]);
        unset($arguments[1]);
        $this->arguments=array_values($arguments);
		//print_r($arguments);
        
    }
    /**
    *Validates if the parameter is a valid classname
    **/
    private function validParam($param){
        return preg_match('/^[a-z_]\w+$/i', $param);
    }
    /**
    *Returns the controller
    **/
    public function getController(){
		if(isset($this->components[0])){
        if(strlen($this->components[0])>0){
            if($this->validParam($this->components[0])){
            return $this->components[0];
            }
            else{
                
                $this->terminate();
            }
            
        }
        else{
            return $GLOBALS['config']['autoload_controller'];
        }
		}
		else{
			return $GLOBALS['config']['autoload_controller'];
		}
    }
    /**
    *Terminates the execution because of an error
    **/
    private function terminate(){
        die('BOOTSTRAP_ERROR');
    }
    /**
    *Creates the instance of the controller that is needed
    **/
    public function createInstance($controller){ //For people modding the index file
		if(file_exists(PROJECT_DIR.'controllers/'.$controller.'.php')){
        include PROJECT_DIR.'controllers/'.$controller.'.php';
		}
		else{
		throw new Exception('File does not exist');
		}
        $return=new $controller;
        return $return;
        
    }
    /**
    *Gets the method that is suppoused to be called
    **/
    public function getMethod(){
		if(isset($this->components[1])){
        if(strlen($this->components[1])>0){
            if($this->validParam($this->components[1])){
                return $this->components[1];
            }
            else{
                
                $this->terminate();
            }
        }
        else{
            return 'index';
        }
		}
		else{
			return 'index';
		}
    }
    /**
    *Returns the arguments for the method
    **/
    public function getArguments(){
        if(is_array($this->arguments)){
            return $this->arguments;
        }
        else{
            return array();
        }
    }
    
    
}