<?php

// Set Application Filepaths
define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

// Global Require Controllers
require(ROOT . "controllers/DefaultController.php");
require(ROOT . "controllers/RobotController.php");

// Require the application routes
require_once(ROOT . "routes/routes.php");

/*
* Routes
*/
route('robot', function() {

    $robot = new RobotController;
    
    return $robot->index();
});
route('place', function() {

    $placeRobot = new RobotController;
    
    return $placeRobot->place(1);
});
route('move', function() {

    $moveRobot = new RobotController;
    
    return $moveRobot->move(1);
});
route('left', function() {

    $robot = new RobotController;
    
    return $robot->left(1);
});
route('right', function() {

    $robot = new RobotController;
    
    return $robot->right(1);
});
route('report', function() {

    $reportRobot = new RobotController;
    
    return $reportRobot->report(1);
});
route('upload', function() {

    $robot = new RobotController;
    
    $robot->upload();
});


// Extraction URI
$action = $_SERVER['REQUEST_URI'];

// Dispatch route action
dispatch($action);