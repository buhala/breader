<?php
//Entire project's config options
$GLOBALS['config']['autoload_libraries']=array('database','hash','redirection');
$GLOBALS['config']['autoload_controller']='login';
$GLOBALS['config']['libraries']['database']['username']='root';
$GLOBALS['config']['libraries']['database']['password']='123456';
$GLOBALS['config']['libraries']['database']['host']='localhost';
$GLOBALS['config']['libraries']['database']['db']='breader';
$GLOBALS['config']['libraries']['database']['autoconnect']=true;
$GLOBALS['config']['libraries']['hash']['salt']='f[au0snpf al;hibnvmosdlfj [0sjfm idfougm kdlmx';
$GLOBALS['config']['index']['start_session']=true;
$GLOBALS['config']['system']['update']=true;
$GLOBALS['config']['system']['redirect_logged']='profile';
define(SITE_PATH,'http://breader.localhost/');
//remember to edit the .js file at public (stories.js)