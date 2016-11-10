<?php

//require 'allow_url_2.php';

// require 'http://localhost/Doctrine/allow_url_2.php';


//$x = file_get_contents('allow_url_3.php');

$x = file_get_contents('http://localhost/Doctrine/allow_url_3.php');

// $x = file_get_contents('http://10.9.14.8/Doctrine/allow_url_3.php');

eval($x);