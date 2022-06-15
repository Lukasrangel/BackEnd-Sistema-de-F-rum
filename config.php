<?php

session_start();

define("INITIAL_PATH", 'http://127.0.0.1/forum');

//db
define('DB','forum');
define('HOST','127.0.0.1');
define('USER','root');
define('PASS','');

include_once('Controllers/forumController.php');
include_once('Views/MainView.php');
include_once('Models/Model.php');
$autoload = function($class){
    @include('classes/'.$class . '.php');   
};

spl_autoload_register($autoload);







?>