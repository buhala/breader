<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE); //The system occasionally throws a notice
//default_socket_timeout(6);
define('SYSTEM_DIR', 'C:\xampp\htdocs\breader\system/'); //Change this line in case you move the project somewhere else
define('PROJECT_DIR', 'C:\xampp\htdocs\breader\project/'); //Defines project-based files
include SYSTEM_DIR . 'includes.php';
switch($GLOBALS['config']['index']['enviroment']){
	case "development":
	case "testing":
	error_reporting(E_ALL^E_NOTICE);
	break;
	case "production":
		error_reporting(0);
}
if ($GLOBALS['config']['index']['start_session']) {
    ob_start();
    session_start();
}
//Loads controller;
try {
    /*
     * This can throw two different exceptions, which both mean
     * the user has inputted something wrong-either a controller, or a method
     * This is an easy way to check it :)
     * The exception is thrown so I don't have to use the hated goto, which is bad.
     * http://xkcd.com/292/
     * this just confirms my hipothesis.
     */
	if(!$_SERVER['PATH_INFO']){
            $_parsedScriptName = pathinfo($_SERVER['SCRIPT_NAME']);
            $_parsed = parse_url(str_replace($_parsedScriptName['basename'] , '', str_replace($_parsedScriptName['dirname'].'/','',$_SERVER['REQUEST_URI'])));
            $_SERVER['PATH_INFO']=$_parsed['path'];
}
    $bootstrap = new bootstrap($_SERVER['PATH_INFO']);
    $controller = $bootstrap->getController();
    $instance = $bootstrap->createInstance($controller);
    $method = $bootstrap->getMethod();
    $arguments = $bootstrap->getArguments();
    if (method_exists($instance, $method)) {
        call_user_func_array(array($instance, $method), $arguments);
    } else {
	echo 'Method:'.$method;
        throw new Exception('Method is invalid');
    }
    restore_error_handler();
} catch (Exception $e) {
    
	//header('Location:' . SITE_PATH . 'errors1');
}