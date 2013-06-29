<?php
//Autoloading libs
$libraries=$GLOBALS['config']['autoload_libraries'];
foreach($libraries as $lib){
    include PROJECT_DIR.'libs/'.$lib.'.php';
    $libraries[$lib]=new $lib;
}
$GLOBALS['libraries']=$libraries;