<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //The system occasionally throws a notice
//default_socket_timeout(6);
define('SYSTEM_DIR', 'C:\xampp\htdocs\breader\system/');//Change this line in case you move the project somewhere else
define('PROJECT_DIR','C:\xampp\htdocs\breader\project/'); //Defines project-based files
include SYSTEM_DIR.'includes.php'; 
if($GLOBALS['config']['index']['start_session']){
    ob_start();
    session_start();
}
//Loads controller;
$bootstrap=new bootstrap($_SERVER['PATH_INFO']);
$controller=$bootstrap->getController();
$instance=$bootstrap->createInstance($controller);
$method=$bootstrap->getMethod();
$arguments=$bootstrap->getArguments();
call_user_func_array(array($instance, $method), $arguments);

