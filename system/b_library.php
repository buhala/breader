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
        if($GLOBALS['config']['libraries'][$classname]){
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
        include PROJECT_DIR.'libs/'.$lib.'.php';
		if(!$GLOBALS['libraries'][$lib]){
        $GLOBALS['libraries'][$lib]=new $lib;
		}
    }
}