<?php

/**
 * Trait for defining a library
 */
trait b_library {

    /**
     * Gives the constants from the config to the library
     */
    public function __construct() {
        $this->setVars();
    }
    /**
     * Sets the needed variables that are from the config file.
     * It's a seperate function from __construct, because it is a trait and you may have a custom library constructor
     * 
     */
    public function setVars() {
        $classname = get_class($this);
        if (isset($GLOBALS['config']['libraries'][$classname])) {
            foreach ($GLOBALS['config']['libraries'][$classname] as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Loads another library
     * @param type $lib
     */
    public function loadLibrary($lib) {
        include_once PROJECT_DIR . 'libs/' . $lib . '.php';
        if (!isset($GLOBALS['libraries'][$lib])) {
            $GLOBALS['libraries'][$lib] = new $lib;
        }
    }

}