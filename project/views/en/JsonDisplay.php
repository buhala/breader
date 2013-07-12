<?php
//It's a lot easier to make it here rather then calling it every place we use a JSON file
if(isset($_GET['callback'])){
echo $_GET['callback'].'(';}
//Mostly for AJAX
echo json_encode($data);
if(isset($_GET['callback'])){
echo ')';
}