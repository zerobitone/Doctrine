<?php

require_once 'inc/functions.inc.php';
require_once 'inc/helper.inc.php';

require_once 'inc/bootstrap.inc.php'; // $em

// Session needed for flash messages
session_start();

// Path to our index.php
$basePath = dirname(__FILE__);

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerNamespace = 'Controllers\\';
$controllerName = $controllerNamespace . ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    $requestController = new $controllerName($basePath, $em);
    $requestController->run($action);
} else {
    $requestController = new Controllers\IndexController($basePath, $em);
    $requestController->render404();
}


$x = '<b>Hallo</b>';
$x = '<script>alert("Hallo")</script>';
purify($x);
echo '<br>';
e($x);


// var_dump($em);

// var_dump(get_class($em));

// var_dump(get_parent_class($em));
