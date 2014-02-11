<?php

require 'config.php';

function __autoload($class_name){
	require LIBS . $class_name .".php";
}

/* 
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';


//libraries
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';
*/

$app = new Bootstrap();