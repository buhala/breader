<?php

trait b_model {

    public function __construct() {
        $this->setVars();
    }

    public function setVars() {
        foreach ($GLOBALS['libraries'] as $key => $value) {
            $this->$key = $value;
        }
    }

    public function loadModel($model) {
        include_once PROJECT_DIR . 'models/' . $model . '.php';
        if (!isset($this->$model)) {
            $this->$model = new $model;
        }
        return $model;
    }

    /**
     * Loads a library
     * */
    public function loadLibrary($lib) {
        include_once PROJECT_DIR . 'libs/' . $lib . '.php';
        if (!isset($GLOBALS['libraries'][$lib])) {
            $GLOBALS['libraries'][$lib] = new $lib;
        }
    }

}