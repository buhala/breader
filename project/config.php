<?php
//Entire project's config options
$GLOBALS['config']['autoload_libraries']=array('database','hash','redirection');
$GLOBALS['config']['autoload_controller']='redirectionController';
$GLOBALS['config']['libraries']['database']['username']='root';
$GLOBALS['config']['libraries']['database']['password']='123456';
$GLOBALS['config']['libraries']['database']['host']='localhost';
$GLOBALS['config']['libraries']['database']['db']='breader';
$GLOBALS['config']['libraries']['database']['autoconnect']=true;
$GLOBALS['config']['libraries']['hash']['salt']='f[au0snpf al;hibnvmosdlfj [0sjfm idfougm kdlmx';
$GLOBALS['config']['index']['start_session']=true;
$GLOBALS['config']['system']['update']=true;
$GLOBALS['config']['system']['redirect_logged']='profile';
$GLOBALS['config']['system']['email']='support@breader.me';
define(SITE_PATH,'http://breader.localhost/');
//remember to edit the .js file at public (stories.js), also home.js includes some of it.