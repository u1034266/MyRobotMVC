<?php

// Global array
$routes = [];

// Route function
function route($action, $callback)
{
    // Initialize the global route var
    global $routes;

    // Trim the action url
    $action = trim($action, '/');

    // Pass the callback url to the routes array
    $routes[$action] = $callback;
}


// Route dispatcher
function dispatch($action)
{    
    // Accepted URIs array
    // Note: 
    // - Append any newly created routes to this array to prevent default redirect.
    // - Whilst this works for now, it is better to make this a database-driven array.
    $acceptedURIs = ['robot','place','move','left','right','upload','report'];

    // Initialize the global route var
    global $routes;

    // Trim the action url
    $action = trim($action, '/');

    // Note: Didn't get this to work as planned.
    // Default all routes to 'robot' for now
    if(in_array($action, $acceptedURIs)) {
        $action = $action;
    } else {
        $action = 'robot';
    }

    // Get the callback url
    $callback = $routes[$action];

    echo call_user_func($callback);
}