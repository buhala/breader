<?php
/**
 * Class for defining a library
 */
class b_library{
    /**
     * Gives the constants from the config to the library
     */
    public function __construct() {
        
        $classname=get_class($this);
        if(isset($GLOBALS['config']['libraries'][$classname])){
        foreach($GLOBALS['config']['libraries'][$classname] as $key=>$value){	
            $this->$key=$value;
        }
        }
    }
    /**
     * Loads another library
     * @param type $lib
     */
    public function loadLibrary($lib){
        include_once PROJECT_DIR.'libs/'.$lib.'.php';
		if(!isset($GLOBALS['libraries'][$lib])){
        $GLOBALS['libraries'][$lib]=new $lib;
		}
    }
}